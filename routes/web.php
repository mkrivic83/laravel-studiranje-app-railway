<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FakultetController;

Route::get('/', function () {
    return view('home');
})->name('home');

// fakultets (samo prikaz svih)
Route::get('/fakultets', [FakultetController::class, 'index'])->name('fakultets.index');

// Student CRUD
// Middleware blokira show/edit/update/destroy za studente s mjesto = null
Route::resource('students', StudentController::class)->except(['show']);
Route::get('students/{student}', [StudentController::class, 'show'])
    ->name('students.show')
    ->middleware('student.mjesto');

// Dodaj middleware i na edit/update/destroy:
Route::middleware('student.mjesto')->group(function () {
    Route::get('students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('students/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
});

// Link1/Link2/Link3 iz layouta da ne pucaju:
Route::get('/link1', fn() => redirect()->route('students.index'));
Route::get('/link2', fn() => redirect()->route('fakultets.index'));
Route::get('/link3', fn() => view('about'))->name('about.index');
