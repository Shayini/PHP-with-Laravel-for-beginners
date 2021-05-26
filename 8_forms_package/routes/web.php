<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostsController;

use Carbon\Carbon;
use App\Models\User;

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




/*
|--------------------------------------------------------------------------
| CRUD Application
|--------------------------------------------------------------------------
*/



Route::group(['middleware'=>'web'], function(){   // web - available to everyone
  Route::resource('/posts', PostsController::class);
  // run 'php artisan route:list'


  Route::get('/dates', function(){
    $date = new DateTime('+1 week');    // get the date 1 week from todays' date
    echo $date->format('m-d-Y');        // print in mm-dd-yyyy format

    echo '<br>';
    // print the current date and time
    echo Carbon::now();     // Add 'use Carbon\Carbon;' at the beginning of this file
    echo '<br>';
    echo Carbon::now()->diffForHumans();  // current time in human readable way
    echo '<br>';
    echo Carbon::now()->addDays(10)->diffForHumans();  // how long that 10 days from current time in human readable way(add - add 10 more days to current time)
    echo '<br>';
    echo Carbon::now()->subMonths(5)->diffForHumans();  // how long that 5 months from current time in human readable way(sub - subtract 5 months from current time)
    echo '<br>';
    echo Carbon::now()->yesterday()->diffForHumans();  // how long that yesterday from current time in human readable way
  });


  Route::get('/getname', function(){
    $user = User::find(1);              // Add 'use App\Models\User;' at the beginning of this file
    echo $user->name;
  });



  Route::get('/setname', function(){
    $user = User::find(1);              // Add 'use App\Models\User;' at the beginning of this file
    $user->name = "william";
    $user->save();
  });
});
