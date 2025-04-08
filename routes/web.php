<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

//TODO:Ezt majd át kell később

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/download', function () {
    return view('download.index');
})->name('download');

Route::get('/forgotpsw', function () {
    return view('auth.forgotpsw');
})->name('forgotpsw');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/account', function () {
    return view('account.index');
})->name('account');

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin');

Route::get('/company', function () {
    return view('company.index');
})->name('company');

Route::get('/user', function () {
    return view('user.index');
})->name('user');

Route::post('/register', [AuthController::class, "register"]);

Route::post('/login', [AuthController::class, "login"]);

Route::get('/logout', [AuthController::class, "logout"])->name('logout');
