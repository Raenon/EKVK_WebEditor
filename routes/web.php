<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Middleware\Admin;
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

Route::get('/editor', function () {
    return view('editor.index');
})->name('editor');


/* Admin */

Route::get('/admin', [AdminController::class, "index"])->name('admin');

Route::resource('/admin/user', UsersController::class);

Route::resource('/admin/company', CompaniesController::class);

Route::patch('/admin/user/restore/{user}', [UsersController::class, "restore"])->name('user.restore');

Route::patch('/admin/company/restore/{user}', [CompaniesController::class, "restore"])->name('company.restore');

/* Auth */

Route::post('/register', [AuthController::class, "register"]);

Route::post('/login', [AuthController::class, "login"]);

Route::get('/logout', [AuthController::class, "logout"])->name('logout');
