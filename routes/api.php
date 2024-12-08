<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;


// api.php

Route::get('/lecturer', [UserController::class, 'getLecturers']); // Fetch all lecturers
Route::post('/lecturer', [UserController::class, 'createLecturer']); // Create a new lecturer
Route::get('/lecturer/{id}', [UserController::class, 'getLecturerById']); // Fetch single lecturer by ID
Route::put('/lecturer/{id}', [UserController::class, 'updateLecturer']); // Update lecturer
Route::delete('/lecturer/{id}', [UserController::class, 'deleteLecturer']); // Delete lecturer
