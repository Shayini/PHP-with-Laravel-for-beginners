<?php

use Illuminate\Support\Facades\Route;

use App\Models\Post;
use App\Models\Video;
use App\Models\Tag;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Create some data into tags table, then continue the exercise

// Insert data
// create a post and assign tag 1 to it, create a video and assign tag 2 to it
Route::get('/create', function(){
    $post = Post::create(['name'=>'My first post']);
    $tag = Tag::find(1);
    $post->tags()->save($tag);
    
    $video = Video::create(['name'=>'video.mov']);
    $tag2 = Tag::find(2);
    $video->tags()->save($tag2);
});


// Read data
Route::get('/read', function(){
    // get the parent
    $post = Post::findOrFail(1);

    foreach($post->tags as $tag){
        echo $tag;
    }
});


// Read data
// get the post data with taggable detail
Route::get('/read', function(){
    // get the parent
    $post = Post::findOrFail(1);

    foreach($post->tags as $tag){
        echo $tag;
    }
});


// Update data
// update the tag name of a post
Route::get('/update', function(){
    // get the parent
    $post = Post::findOrFail(1);

    foreach($post->tags as $tag){
        // $tag->whereName('PHP')->update(['name'=>'Updated PHP']);
        return $tag->whereName('PHP')->update(['name'=>'Updated PHP']);
        // return '1' for successful update & return '0' for unsuccessful update
    }
});


// Attach data
// attach tags to post(it will not remove other tags already assigned to that post)
Route::get('/attach', function(){
    $post = Post::findOrFail(1);
    $tag = Tag::find(2);

    // $post->tags()->save($tag);
    $post->tags()->attach($tag);
});


// Sync data
// sync tag to post(it will remove other tags already assigned to that post)
Route::get('/sync', function(){
    $post = Post::findOrFail(1);

    $post->tags()->sync([3, 4]);    //[3, 4] - tag_id
});


// Delete data
// delete tag of a post
Route::get('/delete', function(){
    $post = Post::findOrFail(1);

    foreach($post->tags as $tag){
        $tag->whereId(3)->delete();
    }
});
