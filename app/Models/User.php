<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $settingsData;
    protected $extraFieldsData;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'settings', 'extra_fields'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'search_index',
    ];

    /**
     * Contact has one address
     */
    public function address()
    {
        return $this->belongsTo(Address::class,'address_id');
    }

    /**
     * get Facilities
     */
    public function facilities()
    {
        return $this->belongsToMany(Facility::class,'facility_users');
    }

    /**
     * Get contacts
     */
    public function contacts()
    {
        return $this->belongsToMany(User::class,'user_contacts')
            ->withPivot('mobile_phone','card_id_number');
    }


    /**
     * Get user children
     */
    public function children()
    {
        return $this->belongsToMany(User::class, 'user_children','child_id');
    }

    /**
     * Get user primary role
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    /**
     * Settings getter
     *
     * @return mixed
     */
    public function getSettingsAttribute()
    {
        if ($this->settingsData == null) {
            $this->settingsData = json_decode($this->attributes['settings'], true);
        }

        return $this->settingsData;
    }

    /**
     * Settings setter
     *
     * @param array $settings
     */
    public function setSettingsAttribute(array $settings)
    {
        $this->settingsData = null;
        $this->attributes['settings'] = json_encode($settings);
    }

    /**
     * Extra fields getter
     *
     * @return mixed
     */
    public function getExtraFieldsAttribute()
    {
        if ($this->extraFieldsData == null) {
            $this->extraFieldsData = json_decode($this->attributes['extra_fields'], true);
        }

        return $this->extraFieldsData;
    }

    /**
     * Extra fields setter
     *
     * @param array $settings
     */
    public function setExtraFieldsAttribute(array $extraFields)
    {
        $this->extraFieldsData = null;
        $this->attributes['extra_fields'] = json_encode($extraFields);
    }

    /**
     * Get the search index attribute for the user.
     *
     * @return string
     */
    public function getSearchIndexAttribute()
    {

        $searchIndex = mb_strtolower($this->name . ' ' . $this->email);

        return $searchIndex;
    }
}
