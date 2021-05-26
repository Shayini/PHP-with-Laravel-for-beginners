<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Mail;

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
    $data = [
        'title' => 'Hi student I hope you like the course',
        'content' => 'This laravel course was created with a lot of love and dedication for you'
    ];

    Mail::send('emails.test', $data, function($message){        // emails.test - view
        $message->to('tsuhumar8@gmail.com')->subject('Hello student how are you?');
    });


    // return view('welcome');
});
