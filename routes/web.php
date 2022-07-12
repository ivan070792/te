<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReportUserController;

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


Route::get('/reports', [ReportController::class, 'index'])->name('report_index');
Route::get('/report/{report_id}', [ReportController::class, 'show'])->name('show_report');
Route::get('/user/{user_id}/reports', [ReportUserController::class, 'showReports'])->name('user_show_reports');
Route::post('/', [ReportController::class, 'create'])->name('create_report');
Route::get('/', [ReportController::class, 'swow_form'])->name('swow_form');
