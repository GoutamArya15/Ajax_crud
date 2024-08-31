<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('students', [StudentController::class, 'index']);
Route::post('students', [StudentController::class, 'store']);
Route::get('/fetch_students', [StudentController::class, 'fetch_students']);
Route::get('/edit_student/{id}', [StudentController::class, 'edit_student']);
Route::put('/update-student/{id}', [StudentController::class, 'update_student']);
Route::delete('/delete-student/{id}', [StudentController::class, 'delete_student']);
