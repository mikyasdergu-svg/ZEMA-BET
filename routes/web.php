<?php

use App\Http\Controllers\ProfileController;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LiveClass;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'approved'])->group(function () {
    Route::get('/', fn () => view('student.page', ['courses' => Course::all()]))->name('student.home');
    Route::get('/courses', fn () => view('courses.index', ['courses' => Course::all()]))->name('courses.index');
    Route::get('/courses/{course}', fn (Course $course) => view('courses.show', ['course' => $course]))->name('courses.show');
    Route::get('/lessons/{lesson}', fn (Lesson $lesson) => view('lessons.show', ['lesson' => $lesson]))->name('lessons.show');
    Route::get('/live', fn () => view('live.index', ['upcomingClasses' => LiveClass::all()]))->name('live.index');
    Route::get('/dashboard', fn () => view('dashboard'))->middleware('verified')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
