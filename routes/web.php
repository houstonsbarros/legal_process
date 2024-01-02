<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LawyerController;
use App\Http\Controllers\ProcessesController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['controller' => AuthController::class], function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('authenticate');
    Route::get('/logout', 'logout')->name('logout');
});

Route::group(['controller' => ProcessesController::class], function () {
    Route::get('/processos', 'index')->name('processes.index');
    Route::get('/processos/criar', 'create')->name('processes.create');
    Route::post('/processos', 'store')->name('processes.store');
    Route::get('/processos/{process}', 'show')->name('processes.show');
    Route::get('/processos/{process}/editar', 'edit')->name('processes.edit');
    Route::put('/processos/{process}', 'update')->name('processes.update');
    Route::delete('/processos/{process}', 'destroy')->name('processes.destroy');
    Route::get('/processos/{process}/finalizar', 'finish')->name('processes.finish');
});
