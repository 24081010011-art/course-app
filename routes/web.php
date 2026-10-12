<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    $courses = \App\Models\Course::latest()->get();

    return view('dashboard', compact('courses'));
})
    ->middleware('auth')
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| Course - dapat diakses Admin dan User
|--------------------------------------------------------------------------
*/

Route::get('/courses', [CourseController::class, 'index'])
    ->middleware('auth')
    ->name('courses.index');


/*
|--------------------------------------------------------------------------
| Course - khusus Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/courses/create', [CourseController::class, 'create'])
        ->name('courses.create');

    Route::post('/courses', [CourseController::class, 'store'])
        ->name('courses.store');

    Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])
        ->name('courses.edit');

    Route::put('/courses/{course}', [CourseController::class, 'update'])
        ->name('courses.update');

    Route::patch('/courses/{course}', [CourseController::class, 'update']);

    Route::delete('/courses/{course}', [CourseController::class, 'destroy'])
        ->name('courses.destroy');
});


/*
|--------------------------------------------------------------------------
| Course Detail - Admin dan User
|--------------------------------------------------------------------------
*/

Route::get('/courses/{course}', [CourseController::class, 'show'])
    ->middleware('auth')
    ->name('courses.show');