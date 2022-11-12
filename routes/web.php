<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\UserController;
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

Route::get('/', [FrontendController::class, 'home'])->name('home');
//Dashboard controller

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


//Department Controller

Route::resource('admin/department', DepartmentController::class);

//Journal Controller

Route::resource('admin/journal', JournalController::class);
Route::get('admin/journal/assign/{journal_id}', [JournalController::class, 'assign'])->name('journal.assign');
Route::post('admin/journal/assign/add', [JournalController::class, 'add'])->name('journal.add');
Route::post('admin/journal/assign/delete/{id}', [JournalController::class, 'delete'])->name('journal.delete');

//User Controller

Route::resource('admin/user', UserController::class);
Route::post('admin/user/makeadmin/{user_id}', [UserController::class, 'makeadmin'])->name('user.admin');
Route::post('admin/user/maketecher/{user_id}', [UserController::class, 'maketeacher'])->name('user.teacher');
Route::post('admin/user/makestudent/{user_id}', [UserController::class, 'makestudent'])->name('user.student');


