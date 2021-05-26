<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;




    //Has Many Through relationship - Link 3 tables - (get the post of a user from this country)
    public function posts(){
        return $this->hasManyThrough('App\Models\Post', 'App\Models\User');

        //or
        // return $this->hasManyThrough('App\Models\Post', 'App\Models\User', 'country_id', 'user_id');
    }
}
