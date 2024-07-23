<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
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


Route::view('/', 'home') ->name('home');
Route::view('/about', 'about') ->name('about');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::view('/contact', 'contact') ->name('contact');



//Route::get('/', function () {
//    $nombre = "Hugo";
//    return view('home')->with('nombre', $nombre);
//})->name('home');


