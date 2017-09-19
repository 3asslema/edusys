<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $settingsData;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'settings'
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
     * Contact has one address
     */
    public function address()
    {
        return $this->hasOne(Address::class);
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
}
