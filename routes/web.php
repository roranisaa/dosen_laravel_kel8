<?php

use App\Http\Controllers\LecturerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Lecturer;

// Redirect root URL to lecturers index
Route::get('/', function () {
    return redirect()->route('login');
});
// Resource routes for lecturers
Route::resource('lecturers', LecturerController::class);

Route::get('/dashboardLecturer', function () {
    $lecturers = Lecturer::all(); // Replace with your logic to fetch data
    return view('lecturers.index', compact('lecturers'));
})->middleware(['auth', 'verified'])->name('lecturers.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
