<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Apply middleware to this route
// Add following lines to the handle function in RoleMiddleware.php
// {
// redirect the request to the user
// return redirect('/');
// }
// Route::get('/admin/user/roles', ['middleware'=>['role', 'auth'], function(){         // can pass multiple middleware
Route::get('/admin/user/roles', ['middleware'=>'role', function(){
    return "Middleware role";
}]);



Route::get('/', function(){
    $user = Auth::user();

    // isAdmin() function is in the User Module
    if($user->isAdmin()){
        echo "This user is administrator";
    }
});


// Apply middleware to this route
// Add following lines to the handle function in RoleMiddleware.php
// {
    // $user = Auth::user();
    //
    // isAdmin() function is in the User Module
    // if(!$user->isAdmin()){
    //     return redirect('/');
    // }
    // return $next($request);
// }
// Add __construct function in AdminController
Route::get('/admin', [AdminController::class, 'index']);
