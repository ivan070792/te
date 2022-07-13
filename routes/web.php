<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReportUserController;
use Illuminate\Http\Request;

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

Auth::routes(['register' => false]); // Роуты авторизации


Route::get('/reports', [ReportController::class, 'index'])->name('report_index')->middleware('auth'); // Все обращения
Route::get('/success', function(Request $request){
    if($request->session()->get('report_id')){
        return view('page.success'); 
    }else{
        return redirect()->route('create_new_report');
    }
    
})->name('report_success');
Route::get('/report/{report_id}', [ReportController::class, 'show'])->name('show_report')->middleware('auth'); // Обращение
//Route::get('/report/{report_id}/edit', [ReportController::class, 'show'])->name('edit_report')->middleware('auth'); // Редактирования обращения
Route::get('/user/{user_id}/reports', [ReportUserController::class, 'showReports'])->name('user_show_reports')->middleware('auth'); // Обращения пользователя
