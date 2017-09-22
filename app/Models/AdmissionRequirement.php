<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdmissionRequirement extends Model
{

    protected $table = 'admission_requirements';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'facility_id',
    ];
    public function facility()
    {
        return $this->belongsTo(Facility::class, 'facility_id');

    }
}
