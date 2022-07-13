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


Route::post('/', [ReportController::class, 'store'])->name('create_new_report'); // Обработка данных из формы
Route::get('/', [ReportController::class, 'create'])->name('show_create_report_form'); // Начальная форма

Auth::routes();

Route::get('/reports', [ReportController::class, 'index'])->name('report_index'); // Все обращения
Route::get('/report/{report_id}', [ReportController::class, 'show'])->name('show_report'); // Обращение
Route::get('/report/{report_id}/edit', [ReportController::class, 'show'])->name('edit_report'); // Редактирования обращения
Route::get('/user/{user_id}/reports', [ReportUserController::class, 'showReports'])->name('user_show_reports'); // Обращения пользователя

