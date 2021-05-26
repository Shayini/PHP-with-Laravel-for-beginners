<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;




    // Polymorphic Relations (here photos relations acts as child to both user and post relations)
    // child
    // One to One | One to Many
    public function imageable() {
        return $this->morphTo();
    }
}
