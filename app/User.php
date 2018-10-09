<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    ///**
    // * Attributes
    // */
    //protected $id;
    //protected $name;
    //protected $email;
    //protected $password;
    //protected $weight;
    //protected $weight_update_times;
    //protected $age;
    //protected $gender;
    //protected $height;
    //protected $created_at;
    //protected $updated_at;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
