<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landingPage');
});

Route::get('/user/login', function () {
    return view('login');
});

Route::get('/user/signup', function () {
    return view('signup');
});

Route::get('/about-us', function () {
    return view('aboutus');
});

Route::get('/dish/{dish_id}', function ($dish_id) {
    return view('dish', array(
        'dish_id'=>$dish_id
    ));
})->where(array('dish_id'=>'[0-9]+'));

Route::get('/user/{user_id}', function ($user_id) {
    return view('user', array(
        'user_id'=>$user_id
    ));
})->where(array('user_id'=>'[0-9]+'));

