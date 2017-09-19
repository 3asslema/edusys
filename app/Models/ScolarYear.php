<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScolarYear extends Model
{
    protected $table = 'scolar_years';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'scolar_program_id','tuition_fee_id'
    ];

    /**
     * Get the scolar program relation.
     */
    public function program()
    {
        return $this->belongsTo(\App\Models\ScolarProgram::class,'scolar_program_id');
    }

    /**
     * Get the scolar program relation.
     */
    public function cost()
    {
        return $this->belongsTo(\App\Models\TuitionFee::class,'tuition_fee_id');
    }
}
