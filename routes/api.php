<?php

use Illuminate\Support\Facades\Route;
use App\Student;
use App\Teacher;
use App\Course;
Route::get('/students', function () {
    return Student::with('user')->get();
});
Route::get('/teachers', function () {
    return Teacher::with('user')->get();
});
Route::get('/teachers/{id}/courses', function ($id) {
    $teacher = Teacher::findOrFail($id);

    return $teacher->courses;
});
Route::get('/courses/{id}/students', function ($id) {
    $course = Course::findOrFail($id);

    return $course->students()->with('user')->get();
});
Route::post('/teachers/{id}/courses', function ($id) {
    $teacher = Teacher::findOrFail($id);

    $teacher->courses()->createMany([
        ['name' => 'PHP'],
        ['name' => 'Laravel'],
        ['name' => 'MySQL'],
    ]);

    return $teacher->load('courses');
});
Route::post('/courses/{id}/students', function ($id) {
    $course = Course::findOrFail($id);

    $course->students()->sync([1, 2, 3]);

    return $course->load('students.user');
});
