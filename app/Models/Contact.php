<?php

namespace App\Models;


class Contact extends User
{
    protected $table = 'discounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'settings',
        'mobile_phone'
    ];

    /**
     * Contact has one or many students.
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }

}
