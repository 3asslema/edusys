<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $table = 'users';

    protected $attachmentsData;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by_id', 'student_id', 'contact_id', 'scolar_year_id',
        'status','attachments', 'notes'
    ];

    /**
     * Settings getter
     *
     * @return mixed
     */
    public function getAttachmentsAttribute()
    {
        if ($this->attachmentsData == null) {
            $this->attachmentsData = json_decode($this->attributes['attachments'], true);
        }

        return $this->settingsData;
    }

    /**
     * Settings setter
     *
     * @param array $settings
     */
    public function setAttachmentsAttribute(array $settings)
    {
        $this->attachmentsData = null;
        $this->attributes['attachments'] = json_encode($settings);
    }

}
