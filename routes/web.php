<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CompanyController;
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

Route::get('/editor', function () {
    return view('editor.index');
})->name('editor');


/* Account */

Route::get('/account', [AccountController::class, "index"])->name('account');

Route::post('/account/update/{user}', [AccountController::class, "update"])->name('account.update');

Route::post('/account/store/', [AccountController::class, "storeCompany"])->name('account.storeCompany');

Route::post('/account/deactivate/{user}', [AccountController::class, "deactivate"])->name('account.deactivate');

/* Admin */

Route::get('/admin', [AdminController::class, "index"])->name('admin');

Route::resource('/admin/user', UsersController::class);

Route::resource('/admin/company', CompaniesController::class);

Route::resource('/admin/project', ProjectsController::class);

Route::patch('/admin/user/restore/{user}', [UsersController::class, "restore"])->name('user.restore');

Route::patch('/admin/company/restore/{company}', [CompaniesController::class, "restore"])->name('company.restore');

Route::patch('/admin/project/restore/{project}', [ProjectsController::class, "restore"])->name('project.restore');


/* Auth */

Route::post('/register', [AuthController::class, "register"]);

Route::post('/login', [AuthController::class, "login"]);

Route::get('/logout', [AuthController::class, "logout"])->name('logout');

/* Company */

Route::post('/company/{company}' , [CompanyController::class, "index"])->name('company');
