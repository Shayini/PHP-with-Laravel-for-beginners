<?php

use Illuminate\Support\Facades\Route;


use App\Models\User;
use App\Models\Post;

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


// Create some data in users table, then continue this exercise

// Insert data to One to Many relationship
// add posts to a user (insert posts in Post using user in User)
Route::get('/create', function(){
    $user = User::find(1);

    $post = new Post(['title'=>'My first post 2', 'body'=>'I love Laravel 2']);

    $user->posts()->save($post);
});


// Get data from One to Many relationship
// get the posts of a user
Route::get('/read', function(){
    $user = User::findOrFail(1);

    foreach($user->posts as $post) {
        echo $post->title . '<br>';
    }
});


// Update data in One to Many relationship
// update a post of a user
Route::get('/update', function(){
    $user = User::find(1);

    // get the post where postId = 1 and update it
    // $user->posts()->whereId(1)->update(['title'=>'I love laravel', 'body'=>'This is awesome']);
    $user->posts()->where('id', '=', 2)->update(['title'=>'I love laravel 2', 'body'=>'This is awesome 2']);
});


// Delete data in One to Many relationship
// delete a post of a user
Route::get('/delete', function(){
    $user = User::find(1);

    // get the post where postId = 1 and delete it
    // $user->posts()->whereId(1)->delete();

    //delete all posts of user with userId = 1
    $user->posts()->delete();
});
