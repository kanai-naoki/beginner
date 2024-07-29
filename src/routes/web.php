<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RestController;

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

// ログイン認証ができている場合にのみ、打刻画面に入れる処理
Route::middleware('auth')->group(function () {
    Route::get('/', [AttendanceController::class, 'index']);
});


Route::post('/attendance/add',[AttendanceController::class, 'create']);
Route::post('/attendance/edit',[AttendanceController::class, 'update']);
Route::post('/rest/add',[RestController::class, 'create']);
Route::post('/rest/edit',[RestController::class, 'update']);