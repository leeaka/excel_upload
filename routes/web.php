<?php

use Illuminate\Support\Facades\Route;



Route::get('/',[\App\Http\Controllers\StudentController::class,'listOfUsers']);

// excel upload route
Route::post('/student_upload',[\App\Http\Controllers\StudentController::class,'upload'])->name('student.excel_upload');

//list of users
