<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CompanyPageController;
use App\Http\Controllers\ProjectPageController;
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

Route::post('/account/invite/{invite}', [AccountController::class, "inviteHandler"])->name('account.invite');

Route::post('/account/update/{user}', [AccountController::class, "update"])->name('account.update');

Route::post('/account/store/', [AccountController::class, "storeCompany"])->name('account.storeCompany');

Route::post('/account/deactivate/{user}', [AccountController::class, "deactivate"])->name('account.deactivate');

/* Admin */

Route::get('/admin', [AdminController::class, "index"])->name('admin');

Route::resource('/admin/user', UsersController::class);

Route::resource('/admin/company', controller: CompaniesController::class);

Route::resource('/admin/project', ProjectsController::class);

Route::patch('/admin/user/restore/{user}', [UsersController::class, "restore"])->name('user.restore');

Route::patch('/admin/company/restore/{company}', [CompaniesController::class, "restore"])->name('company.restore');

Route::patch('/admin/project/restore/{project}', [ProjectsController::class, "restore"])->name('project.restore');


/* Auth */

Route::post('/register', [AuthController::class, "register"]);

Route::post('/login', [AuthController::class, "login"]);

Route::get('/logout', [AuthController::class, "logout"])->name('logout');

/* Company */

Route::get('/companypage/{company}' , [CompanyPageController::class, "index"])->name('companyPage.index');

Route::post('/companypage/{company}/invite' , [CompanyPageController::class, "invite"])->name('companyPage.invite');

Route::get('/companypage/{company}/edit' , [CompanyPageController::class, "edit"])->name('companyPage.edit');

Route::post('/companypage/{company}/update' , [CompanyPageController::class, "update"])->name('companyPage.update');

Route::post('/companypage/promote/{user}/{company}' , [CompanyPageController::class, "promote"])->name('companyPage.promote');

Route::post('/companypage/demote/{user}/{company}' , [CompanyPageController::class, "demote"])->name('companyPage.demote');

Route::post('/companypage/kick/{user}/{company}' , [CompanyPageController::class, "kick"])->name('companyPage.kick');


/* Project */


Route::get('/projectpage' , [ProjectPageController::class, "index"])->name('projectPage.index');

Route::get('/projectpage/create' , [ProjectPageController::class, "create"])->name('projectPage.create');

Route::post('/projectpage/store', [ProjectPageController::class, "store"])->name('projectPage.store');

/* Editor */

Route::post('/editor/{project}' , [EditorController::class, "index"])->name('editor.index');
