<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FakultetController;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
})->name('home');

/*
|--------------------------------------------------------------------------
| Fakulteti (samo prikaz)
|--------------------------------------------------------------------------
*/
Route::get('/fakultets', [FakultetController::class, 'index'])
    ->name('fakultets.index');

/*
|--------------------------------------------------------------------------
| Studenti – SVE rute preko resource
|--------------------------------------------------------------------------
| NEMA ručnih CRUD ruta
| NEMA duplikata imena
*/
Route::resource('students', StudentController::class);

/*
|--------------------------------------------------------------------------
| Dummy rute iz layouta
|--------------------------------------------------------------------------
*/
Route::get('/link1', fn () => redirect()->route('students.index'));
Route::get('/link2', fn () => redirect()->route('fakultets.index'));
Route::get('/link3', fn () => view('about'))->name('about.index');