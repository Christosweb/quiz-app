<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

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

Route::controller(UserController::class)->group(function(){
    Route::get('/', [UserController::class, 'index'])->middleware('auth');
    Route::post('/', [UserController::class, 'showNextQuestion']);
    Route::post('/signin', [UserController::class, 'signin'])->name('login.signin');
    Route::post('/signup',[UserController::class, 'signup'] )->name('register.signup');
    Route::get('/final',[UserController::class, 'submitQuestion'] );

});


Route::put('/', [AnswerController::class, 'putAnswer'] );




