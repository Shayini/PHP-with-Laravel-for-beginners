<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable - ['file'];


    public function role(){
        return $this->belongsTo('App\Models\Role');
    }

    public function photo(){
        return $this->belongsTo('App\Models\Photo');
    }
}
