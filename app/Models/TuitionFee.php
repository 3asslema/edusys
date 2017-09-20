<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TuitionFee extends Model
{
    protected $table = 'tuition_fees';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'is_scolar_year_fee', 'cost', 'periodicity', 'scolar_program_id'
    ];
    /**
     * Get the scolar program.
     */
    public function program()
    {
        return $this->belongsTo(\App\Models\ScolarProgram::class,'scolar_program_id');
    }
}
