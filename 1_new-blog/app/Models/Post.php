<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];      // add timestamp for softdelete

    // protected $table = 'posts';     // add this if you want to change the table name differ from this file name
                                    // normaly if the file name is 'Post.php' then table name is 'posts'.

    // protected $primaryKey = 'post_id';  // default primaryKey is 'id'. use this if you want the change the primary key column name.

    protected $fillable = ['title', 'content'];     // add this if you want to configure mass assignment to create data.





    //Inverse relationship (get User->user using Post->(user_id))
    public function user(){
        // return $this->hasOne(User::class);
        return $this->belongsTo('App\Models\User');
    }


    // Polymorphic Relations (here photos relations acts as child to both user and post relations)
    // parent
    // One to Many
    public function photos() {
        return $this->morphMany('App\Models\Photo', 'imageable');
    }


    // Polymorphic Relations
    // Many to Many
    // putting tags on Video and Post
    public function tags() {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
}
