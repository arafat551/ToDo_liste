<?php

use App\Http\Controllers\ArchiveCardController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\TacheController;
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
    return view('auth.register');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/home',TacheController::class);
Route::put('/home/{{id}}',[TacheController::class, 'update']);

Route::resource('/utilisateur',UtilisateurController::class);
Route::resource('/archive',ArchiveController::class);
Route::get('/pdf',[ArchiveCardController::class,'index']);

