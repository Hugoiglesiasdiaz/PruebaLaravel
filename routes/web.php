<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
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
App::setLocale('es');

Route::view('/', 'home') ->name('home');
Route::view('/about', 'about') ->name('about');


Route::get('/portfolio', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/portfolio/{id}',[ProjectController::class, 'show'])->name('projects.show');

Route::view('/contact', 'contact') ->name('contact');

Route::post('contact',[MessageController::class,'store'])->name('messages.store');

//Route::get('/', function () {
//    $nombre = "Hugo";
//    return view('home')->with('nombre', $nombre);
//})->name('home');


