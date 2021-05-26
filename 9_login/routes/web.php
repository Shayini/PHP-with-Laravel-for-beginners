<?php

use Illuminate\Support\Facades\Route;

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
    // if(Auth::check()){          // check whether the user is logged in
    //     return "the user is logged in";
    // } else {
    //     return "the user is not logged in";
    // }


    // Manually authenticating user
    // $username = 'ssfieof';
    // $password = 'saflj';
    // if (Auth::attempt(['username'=>$username, 'password'=>$password])){
    //     return redirect()->intended('/admin');
    // }


    // Auth::logout();      // to logout
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
