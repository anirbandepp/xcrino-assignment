<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
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

// Route::get('/', [StudentController::class, 'index']);
// Route::get('/fetch_recod', [StudentController::class, 'fetch_recod'])->name('fetch_recod');
// Route::get('/delete_record', [StudentController::class, 'delete_record'])->name('delete_record');
// Route::get('/get_Employees', [StudentController::class, 'getEmployees'])->name('get_Employees');

// Another Try
Route::get('/', [HomeController::class, 'index']);
Route::get('/delete_record', [HomeController::class, 'delete']);
