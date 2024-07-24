<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SampleBookController;
use App\Http\Controllers\BankbookController;
use App\Http\Controllers\ContentBankController;
use App\Http\Controllers\AssignmentBankStudentController;
use App\Http\Controllers\AssignmentBankTeachersController;

// Ruta para el recurso "books"
Route::resource('books', BookController::class);
// Ruta para el recurso "samplebooks"
Route::apiResource('samplebooks', SampleBookController::class);
// Ruta para el recurso "bankbooks"
Route::apiResource('bankbooks', BankbookController::class);
// Ruta para el recurso "contbank"
Route::apiResource('contentbank', ContentBankController::class);
// Ruta para el recurso "assignmentbankstudent"
Route::apiResource('assignmentbankstudent', AssignmentBankStudentController::class);
// Ruta para el recurso "assignmentbankteachers"
Route::apiResource('assignmentbankteachers', AssignmentBankTeachersController::class);
