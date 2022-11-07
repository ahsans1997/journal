<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
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

Route::get('/', function () {
    return view('welcome');
});
//Dashboard controller

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


//Department Controller

Route::resource('department', DepartmentController::class);

//Journal Controller

Route::resource('journal', JournalController::class);
Route::get('journal/assign/{journal_id}', [JournalController::class, 'assign'])->name('journal.assign');
Route::post('journal/assign/add', [JournalController::class, 'add'])->name('journal.add');
Route::post('journal/assign/delete/{id}', [JournalController::class, 'delete'])->name('journal.delete');

//User Controller

Route::resource('user', UserController::class);
Route::post('user/makeadmin/{user_id}', [UserController::class, 'makeadmin'])->name('user.admin');
Route::post('user/maketecher/{user_id}', [UserController::class, 'maketeacher'])->name('user.teacher');
Route::post('user/makestudent/{user_id}', [UserController::class, 'makestudent'])->name('user.student');


