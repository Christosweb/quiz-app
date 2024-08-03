<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::get('/signin', function () {
    return view('signin');
})->name('login');

Route::get('/logout', function(){
    Auth::logout();
    session()->forget('exam_id');
    return to_route('login');
})->name('logout');

Route::controller(UserController::class)->group(function(){
    Route::get('/', [UserController::class, 'index'])->middleware('auth');
    Route::post('/', [UserController::class, 'showNextQuestion']);
    Route::post('/signin', [UserController::class, 'signin'])->name('login.signin');
    Route::post('/signup',[UserController::class, 'signup'] )->name('register.signup');
    Route::get('/final',[UserController::class, 'submitQuestion'] );
    Route::get('/score',[UserController::class, 'showScore'] )->name('score.showScore');
    Route::get('/profile',[UserController::class, 'profileIndex'] )->name('profile.profileIndex');

});

Route::controller(SocialiteController::class)->group(function(){
    Route::get('login/google', [SocialiteController::class, 'redirectToGoogle'])->name('redirectToGoogle');
    Route::get('login/google/callback', [SocialiteController::class, 'handleGoogleCallback']);
});

Route::put('/', [AnswerController::class, 'putAnswer'] );




