<?php

use App\Http\Controllers\web\IndexController;
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

Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/upload-file', 'create')->name('upload-file');
});

Route::get('/phpinfo', function () {
    echo phpinfo();
});
