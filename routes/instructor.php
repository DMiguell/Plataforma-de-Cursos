<?php

use App\Http\Controllers\Instructor\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Instructor\CoursesCurriculum;


Route::redirect('', 'instructor/courses');


Route::resource('courses', CourseController::class)->names('instructor.courses');

Route::get('courses/{course}/curriculum', CoursesCurriculum::class)->name('instructor.courses.curriculum');
