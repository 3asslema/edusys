<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $table = 'facilities';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','address', 'phone', 'fax', 'email', 'website','organisation_id'
    ];

    /**
     * Get the organisation
     */
    public function organisation()
    {
        return $this->belongsTo(\App\Models\Organisation::class,'organisation_id');
    }

    /**
     * Get facility programs
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function scolarPrograms()
    {
        return $this->belongsToMany(ScolarProgram::class, 'facility_scolar_programs');

    }

    /**
     * Get scolar years
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function scolarYears()
    {
        return $this->hasMany(ScolarYear::class,'facility_id');

    }

    /**
     * Get tuition fees
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tuitionFees()
    {
        return $this->hasMany(TuitionFee::class,'facility_id');
    }

    /**
     * Get employees
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class,'facility_users')->withTimestamps();
    }
}

