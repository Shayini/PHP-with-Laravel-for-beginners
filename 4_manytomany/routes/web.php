<?php

use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Models\Role;

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

// Insert data to a Many to Many relationship
// insert roles for users
Route::get('/create', function(){
    $user = User::find(1);

    $role = new Role(['name'=>'Administrator']);
    $user->roles()->save($role);
});


// Get data from a Many to Many relationship
// get the roles of a user
Route::get('/read', function(){
    $user = User::findOrFail(1);

    // dd($user->roles);

    foreach($user->roles as $role){
        // dd($role);
        echo $role->name;
    }
});


// Update data to a Many to Many relationship
// update the Administrator role to subscriber for a user
Route::get('/update', function(){
    $user = User::findOrFail(1);

    if($user->has('roles')){
        foreach($user->roles as $role){
            if($role->name == 'Administrator'){
                $role->name = 'subscriber';
                $role->save();
            }
        }
    }
});


// Delete data from a Many to Many relationship
// delete role of a user
Route::get('/delete', function(){
    $user = User::findOrFail(1);

    // delete all roles of a user
    // $user->roles()->delete();

    // delete particular role of a user
    foreach($user->roles as $role){
        $role->whereId(6)->delete();
    }
});


// Attach roles
// attach a role to a user
Route::get('/attach', function(){
    $user = User::findOrFail(1);

    // even the role is already attached, when we run again it will create another record
    $user->roles()->attach(7);
});


// Detach roles
// remove role from a user
Route::get('/detach', function(){
    $user = User::findOrFail(1);

    // detach particular role from a user
    $user->roles()->detach(7);

    // detach all the role from a user
    $user->roles()->detach();
});


// Sync
// attach the given roles to the user and detach other roles
Route::get('/sync', function(){
    $user = User::findOrFail(1);

    // attach role 5 to user 1 and detach other roles from the user.
    // $user->roles()->sync([5]);

    // attach role 5,7,6 to user 1 and detach other roles from the user.
    // even there is no role id 6 given in this array it will attach it, and will not give any error.
    $user->roles()->sync([5, 7, 6]);
});
