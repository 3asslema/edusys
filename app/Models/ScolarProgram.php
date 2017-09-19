<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScolarProgram extends Model
{
    protected $table = 'scolar_programs';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'parent_id'
    ];
    /**
     * Get the scolar program parent.
     */
    public function parent()
    {
        return $this->belongsTo(\App\Models\ScolarProgram::class,'parent_id');
    }
}
