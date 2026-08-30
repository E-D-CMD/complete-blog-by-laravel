<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PostController::class, 'list']);

Route::get('/posts/{post}', [PostController::class, 'show']);


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth');


/*
|--------------------------------------------------------------------------
| Authenticated Posts
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/create', [PostController::class, 'create']);

    Route::post('/create', [PostController::class, 'store']);

    Route::get('/posts/{post}/edit', [PostController::class, 'edit']);

    Route::put('/posts/{post}', [PostController::class, 'update']);

    Route::delete('/posts/{post}', [PostController::class, 'destroy']);

});


/*
|--------------------------------------------------------------------------
| Email Verification
|--------------------------------------------------------------------------
*/

Route::get('/email/verify', function () {

    return view('auth.verify-email');

})->middleware('auth')
  ->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (
    EmailVerificationRequest $request
) {

    $request->fulfill();

    return redirect('/');

})->middleware([
    'auth',
    'signed'
])->name('verification.verify');


Route::post('/email/verification-notification', function (
    Request $request
) {

    $request->user()->sendEmailVerificationNotification();

    return back()->with(
        'message',
        'Verification link sent!'
    );

})->middleware([
    'auth',
    'throttle:6,1'
])->name('verification.send');