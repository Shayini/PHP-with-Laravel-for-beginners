<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;


    // Polymorphic Relations
    // Many to Many
    // putting tags on Video and Post
    public function posts() {
        return $this->morphedByMany('App\Models\Post', 'taggable');
    }


    // Polymorphic Relations
    // Many to Many
    // putting tags on Video and Post
    public function videos() {
        return $this->morphedByMany('App\Models\Post', 'taggable');
    }
}
