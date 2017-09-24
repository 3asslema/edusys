<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $table = 'admissions';

    protected $attachmentsData;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by_id', 'student_id', 'contact_id', 'scolar_year_id',
        'facility_id', 'academic_year_id', 'status','attachments'
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class,'student_id');

    }

    public function contact()
    {
        return $this->belongsTo(User::class,'contact_id');

    }
    public function scolarYear()
    {
        return $this->belongsTo(ScolarYear::class,'scolar_year_id');

    }
    public function facility()
    {
        return $this->belongsTo(Facility::class,'facility_id');

    }

    /**
     * get tuition fees
     */
    public function tuitionFees()
    {
        return $this->belongsToMany(TuitionFee::class,'admission_tuition_fees');
    }
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
