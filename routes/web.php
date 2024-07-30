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

Route::resource('portafolio',ProjectController::class)->names('projects')->parameters(['portafolio' => 'project']);

//Route::get('/portfolio', [ProjectController::class, 'index'])->name('projects.index');
//Route::get('/portfolio/crear',[ProjectController::class, 'create'])->name('projects.create');
//Route::post('/portfolio', [ProjectController::class, 'store'])->name('projects.store');
//Route::get('/portfolio/{project}',[ProjectController::class, 'show'])->name('projects.show');
//Route::patch('/portfolio/{project}',[ProjectController::class, 'update'])->name('projects.update');
//Route::get('/portfolio/{project}/editar',[ProjectController::class, 'edit'])->name('projects.edit');
//Route::delete('/portfolio/{project}',[ProjectController::class, 'destroy'])->name('projects.destroy');

Route::view('/contact', 'contact') ->name('contact');

Route::post('contact',[MessageController::class,'store'])->name('messages.store');

//Route::get('/', function () {
//    $nombre = "Hugo";
//    return view('home')->with('nombre', $nombre);
//})->name('home');



Auth::routes(['register' => false]);


