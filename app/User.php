<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'salutation', 'first_name', 'last_name', 'street', 'city', 'zipcode', 'title', 'email', 'password', 'companyname', 'cperson', 'address', 'phone', 'phone', 'state', 'country', 'year_of_establishment', 'requirement', 'employee_id', 'designation', 'location', 'pass_token', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
