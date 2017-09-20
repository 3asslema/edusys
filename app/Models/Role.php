<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = ['name'];


    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
    ];
}
