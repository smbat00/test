<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

    Route::middleware(['manager'])->group(function () {
        Route::get('/addtask', [UserController::class, 'addtsak'])->name('addtsak');
        Route::post('/addtask', [UserController::class, 'addDeveloperTsak'])->name('addDeveloperTsak');
        Route::get('/mytask', [UserController::class, 'mytask'])->name('mytask');
        Route::get('/deletetask/{id}', [UserController::class, 'deletetask'])->name('deletetask');
        Route::get('/edittask/{id}', [UserController::class, 'edittask'])->name('edittask');
        Route::post('/edittask', [UserController::class, 'editDeveloperTsak'])->name('editDeveloperTsak');
    });
    Route::middleware(['developer'])->group(function () {
        Route::get('/alltask', [UserController::class, 'alltask'])->name('alltask');
        Route::get('/viewsingletask/{id}', [UserController::class, 'viewsingletask'])->name('viewsingletask');
        Route::get('/taskstatus', [UserController::class, 'taskstatus'])->name('taskstatus');
    });
    Route::get('/search', [UserController::class, 'search'])->name('search');

});
