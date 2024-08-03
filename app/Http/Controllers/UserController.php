<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Question;
use App\Models\Answer;


class UserController extends Controller
{
    //
   
    public function signUp(Request $request, User $user)
    {
         $credentials = $request->validate([
            'email'=> ['required', 'email'],
            'name' => ['required', 'string'],
            'password' =>['required', 'confirmed'],
            'password_confirmation' => ['required']
         ]);

            return $user->userSingup($credentials);
        
    }

    public function signin(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email'=> ['required', 'email'],
            'password' =>['required'],
            
         ]);
        
        $remember = $request->has('remember');

         if(Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();

            //the session below is to persist user chosen answer
            session(['exam_id'=> Str::random(40)]);

            return redirect()->intended('/');
         }

         return back()->withErrors([
            'error' => 'email or password is not correct'
         ]);
    }

    public function index()
   {
      $questions = Question::with('options')->paginate(1);
      $answers = new Answer();
      $answer = $answers->retrieveAnswer();
      return view('dashboard', ['questions' => $questions, 'answer' => $answer]);
   }
   
   public function showNextQuestion()
   {
      $questions = Question::with('options')->paginate(1);

    $answers = new Answer();
    $answer = $answers->retrieveAnswer();
    return view('dashboard', ['questions' => $questions, 'answer' => $answer]); 
   }

   public function submitQuestion(Answer $answer)
   {
      $question = Question::all()->count();
      $answers = $answer->retrieveAnswer()->count();
      return view('final', ['answers' => $answers, 'question' => $question]);
   
   }

   public function showScore(Answer $answer)
   {  
      $question = Question::all()->count();
      $answer = $answer->getScore();
      $answer_in_percent = 100 / $question * $answer ;
      request()->session()->put(['exam_id'=>Str::random(40)]);
      
      return view('score', ['score'=>$answer_in_percent]);
   }

   public function profileIndex(User $user)
   {
       $profile = $user->profile();
       
       return view('profile', ['profiles' => $profile]);
   }
}
