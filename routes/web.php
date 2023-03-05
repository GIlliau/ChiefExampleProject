<?php

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
    return redirect('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth']], function() {
    Route::get('/buy-cow', [\App\Http\Controllers\Page\CowController::class, 'index'])->name('cow');
    Route::get('/buy-cow-thanks', [\App\Http\Controllers\Page\CowController::class, 'thanksIndex'])->name('cow.thanks');
    Route::post('/buy-cow', [\App\Http\Controllers\Page\CowController::class, 'buyCow'])->name('buy.cow');
    Route::get('/download-file', [App\Http\Controllers\Page\FileController::class, 'index'])->name('file');
    Route::post('/download-file', [App\Http\Controllers\Page\FileController::class, 'download'])->name('download.file');
});
