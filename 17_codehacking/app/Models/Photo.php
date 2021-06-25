<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $uploads = '/image/';

    protected $fillable = ['file'];


    // Accessor
    public function getFileAttribute($photo){
        return asset($this->uploads . $photo);
    }
}
