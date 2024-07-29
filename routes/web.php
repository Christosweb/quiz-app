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


Route::get('/', function () {
    $questions = Question::with('options')->paginate(1);
    $answers = new Answer();
    $answer = $answers->retrieveAnswer();
    return view('dashboard', ['questions' => $questions, 'answer' => $answer]);
})->middleware('auth');

Route::post('/', function (Request $request) {
    // $page = $request->query('page');
    $questions = Question::with('options')->paginate(1);

    $answers = new Answer();
    $answer = $answers->retrieveAnswer();
    return view('dashboard', ['questions' => $questions, 'answer' => $answer]); 
});
Route::put('/', [AnswerController::class, 'putAnswer'] );



Route::get('/signin', function () {
    return view('signin');
})->name('login');

Route::post('/signin', [UserController::class, 'signin'])->name('login.signin');


Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::post('/signup',[UserController::class, 'signup'] )->name('register.signup');

Route::get('/final', function(Answer $answer){
    $question = Question::all()->count();
    $answers = $answer->retrieveAnswer()->count();
    return view('final', ['answers' => $answers, 'question' => $question]);
});


