<?php

use Illuminate\Support\Facades\Route;

use App\Models\Staff;
use App\Models\Photo;

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

// Create some data in staff and products table, then continue this exercise

// Insert data to Polymorphic relationship
// insert photos of a staff
Route::get('/create', function () {
    $staff = Staff::find(1);

    $staff->photos()->create(['path'=>'example.jpg']);
});


// Get data from Polymorphic relationship
// get photos of a staff
Route::get('/read', function () {
    $staff = Staff::findOrFail(1);

    foreach($staff->photos as $photo){
        echo $photo->path;
    }
});


// Update data to Polymorphic relationship
// update photo of a staff
Route::get('/update', function () {
    $staff = Staff::findOrFail(1);

    $photo = $staff->photos()->whereId(1)->first();
    $photo->path = "Updated example.jpg";
    $photo->save();
});


// Delete data from Polymorphic relationship
// delete photo of a staff
Route::get('/delete', function () {
    $staff = Staff::findOrFail(1);

    // delete all photos of a staff
    // $staff->photos()->delete();

    // delete particular photo of a staff
    $staff->photos()->whereId(1)->delete();
});


// Assign data to Polymorphic relationship
// Assign a photo to a staff
Route::get('/assign', function(){
    $staff = Staff::findOrFail(1);

    $photo = Photo::findOrFail(3);
    $staff->photos()->save($photo);
});


// Unassign data to Polymorphic relationship
// Unassign a photo of a staff
Route::get('/un-assign', function () {
    $staff = Staff::findOrFail(1);

    $staff->photos()->whereId(3)->update(['imageable_id'=>0, 'imageable_type'=>'']);
});
