<?php

use Illuminate\Support\Facades\Route;


use App\Models\User;
use App\Models\Address;

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

// Insert data to a One to One relationship
// add address to address table using user table(insert address for a user)
Route::get('/insert', function(){
    $user = User::findOrFail(1);

    $address = new Address(['name'=>'234 Kandy SriLanka']);

    $user->address()->save($address);
});



// Update data to a Ono to One relationship
// update the address of a user
Route::get('/update', function(){
    $address = Address::whereUserId(1)->first();

    $address->name = "5647 Jaffna";
    $address->save();
});


// Get data from a One to One relationship
Route::get('/read', function(){
    $user = User::findOrFail(1);

    echo $user->address->name;
});


// Delete data from a One to One relationship
Route::get('/delete', function () {
    $user = User::findOrFail(1);

    $user->address()->delete();
    return "done";
});
