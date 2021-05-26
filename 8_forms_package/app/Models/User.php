<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




    public function posts(){
        return $this->hasMany('App\Models\Post');
    }

    // Accessor - get data(no need to call this function - automatically calls this function when the data is get from the database)
    public function getNameAttribute($value){
      // return ucfirst($value);   // convert first letter to upper case
      return strtoupper($value);   // convert whole string to upper case
    }


    // Mutator - set data(no need to call this function - automatically calls this function when the data is inserted to the database)
    public function setNameAttribute($value){
      $this->attributes['name'] = strtoupper($value);   // convert the string to upper case and then add to the database
    }
}
