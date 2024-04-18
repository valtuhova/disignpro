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


Route::get('/page/registration',[\App\Http\Controllers\PageController::class, 'page_registration'])->name('page_registration');
Route::post('/page/registration/save',[\App\Http\Controllers\UserController::class, 'save_new_user'])->name('save_new_user');

Route::get('/', [\App\Http\Controllers\PageController::class, 'welcome'])->name('welcome');

Route::get('/page/auth', [\App\Http\Controllers\PageController::class, 'page_auth'])->name('page_auth');
Route::post('/auth/user', [\App\Http\Controllers\UserController::class, 'auth_user'])->name('auth_user');

Route::get('/page/exit', [\App\Http\Controllers\UserController::class, 'page_exit'])->name('page_exit');


Route::put('/page/category_update/{category}',[\App\Http\Controllers\CategoryController::class,'category_update'])->name('category_update');
Route::get('/page/category_delete/{category}',[\App\Http\Controllers\CategoryController::class,'delete'])->name('delete');

Route::get('/page/application/delete/{application}',[\App\Http\Controllers\ApplicationController::class,'delete_application'])->name('delete_application');

Route::put('/page/application/edit/{application}',[\App\Http\Controllers\ApplicationController::class,'edit'])->name('edit');

Route::post('/categories', [\App\Http\Controllers\CategoryController::class, 'store'])->name('CategoriesStore');
Route::get('/page/categories', [\App\Http\Controllers\PageController::class, 'ShowCategoriesAdminPage'])->name('ShowCategoriesAdminPage');

Route::get('/page/applicatoins', [\App\Http\Controllers\PageController::class, 'ShowApplicationsAdminPage'])->name('ShowApplicationsAdminPage');
Route::post('/applicatoins', [\App\Http\Controllers\ApplicationController::class, 'store'])->name('ApplicationsStore');

Route::get('/page/profile', [\App\Http\Controllers\PageController::class, 'profile'])->name('profile');

