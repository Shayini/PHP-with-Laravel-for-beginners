<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $directory = "/images/";

    protected $fillable = [     // add this if you want to configure mass assignment to create data.
      'title',
      'content',
      'path'
    ];




    public static function scopeOlderFirst($query){
      return $query->orderBy('id', 'asc')->get();
    }


    public function getPathAttribute($value){
      return $this->directory . $value;
    }
}
