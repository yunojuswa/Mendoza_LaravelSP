<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});

Route::get("/home", function () {
    return view('home');
});


//display all routes
Route::get('/students', [StudentsController::class, 'index'])->name('students.index');

//route to display the form to create a student
Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');

//Store a student in the students table
Route::post('/students', [StudentsController::class, 'store'])->name('students.store');

//Show details of a specific student by ID
Route::get('/students/{student}', [StudentsController::class, 'show'])->name('students.show');

//Edit an existing student
Route::get('/students/{student}/edit', [StudentsController::class, 'edit'])->name('students.edit');

//Update an existing student
Route::put('/students/{student}', [StudentsController::class, 'update'])->name('students.update');

//Delete a student
Route::delete('/students/{student}', [StudentsController::class, 'destroy'])->name('students.destroy');