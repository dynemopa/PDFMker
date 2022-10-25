<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/a', [App\Http\Controllers\Admin\DashboardController::class, 'welcome'])->name('/a');
Route::get('/home2', [App\Http\Controllers\HomeController::class, 'index'])->name('home2');

Route::get('/generate', [App\Http\Controllers\GenerateController::class, 'index'])->name('genrate');
Route::post('/make', [App\Http\Controllers\GenerateController ::class, 'make'])->name('make');
Route::get('/pdf_view', [App\Http\Controllers\Pdf_viewController::class, 'index'])->name('pdf_view');
Route::get('/showpdf/{id}', [App\Http\Controllers\Pdf_viewController ::class, 'showpdf'])->name('showpdf');
Route::get('/download/{id}', [App\Http\Controllers\Pdf_viewController ::class, 'download'])->name('download');

Route::get('/editpdf/{id}', [App\Http\Controllers\Pdf_viewController ::class, 'editpdf'])->name('editpdf');
Route::post('/updatepdf/{id}', [App\Http\Controllers\Pdf_viewController ::class, 'updatepdf'])->name('updatepdf');
Route::get('/deletepdf/{id}', [App\Http\Controllers\Pdf_viewController ::class, 'deletepdf'])->name('deletepdf');

Route::get('/save_pdf', [App\Http\Controllers\Pdf_saveController ::class, 'index'])->name('save_pdf');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout-user', [App\Http\Controllers\Admin\DashboardController::class, 'logoutuser'])->name('logout-user');
Route::namespace('Admin')->middleware(['admin'])->group(function ()
{
    Route::get('/home', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('home');
    Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users');
    Route::get('/delete/{id}', [App\Http\Controllers\UsersController::class, 'delete'])->name('delete');
    Route::get('/useredit/{id}', [App\Http\Controllers\UsersController::class, 'edit'])->name('useredit');
    Route::get('/edituser/{id}', [App\Http\Controllers\UsersController::class, 'edituser'])->name('edituser');
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

    Route::get('/seepdf/{id}', [App\Http\Controllers\ProfileController::class, 'seepdf'])->name('seepdf');
    Route::post('/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('update');
    Route::get('/changepassword',[App\Http\Controllers\ChangePasswordController::class, 'changepassword'])->name('changepassword');
    Route::post('/changePasswordPost',[App\Http\Controllers\ChangePasswordController::class, 'changePasswordPost'])->name('changePasswordPost');
    Route::get('/logout-admin', [App\Http\Controllers\Admin\DashboardController::class, 'logout'])->name('logout-admin');
});



