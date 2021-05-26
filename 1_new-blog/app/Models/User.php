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



    //One to One relationship (get Post->post using User->user_id)
    public function post() {
        // return $this->hasOne(Post::class);
        return $this->hasOne('App\Models\Post');
    }

    //One to Many relationship (get Post->posts using User->user_id)
    public function posts(){
        return $this->hasMany('App\Models\Post');
    }

    //Many to Many relationship (find the roles of a user)
    public function roles(){
        // return $this->belongsToMany('App\Models\Role');
        return $this->belongsToMany('App\Models\Role')->withPivot('created_at');

        //to customize table names and columns follow the format below
        // return $this->belongsToMany('App\Models\Role', 'user_roles', 'user_id', 'role_id');
    }



    // Polymorphic Relations (here photos relations acts as child to both user and post relations)
    // parent
    // One to Many
    public function photos() {
        return $this->morphMany('App\Models\Photo', 'imageable');       //'imageable' - method in Photos model
    }

}
