<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\JournalController;
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
Route::get('journal/assain/{journal_id}', [JournalController::class, 'assain'])->name('journal.assain');
Route::get('journal/assain/search', [JournalController::class, 'add'])->name('journal.add');


