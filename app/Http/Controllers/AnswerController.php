<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    //
    public function putAnswer(Request $request, Answer $answer)
    {
       $user_id = Auth::user()->id;

       $request = json_decode($request->getContent());

       $user_answer = [
        'user_id' => $user_id,
        'question_id' => $request->question_id,
        'option_id' => $request->user_option_id,
        'is_correct' => $request->is_correct,
        'exam_id' => session('exam_id')
       ];
       
       $answer->createAnswer($user_answer);

    }
//test
    public function getAnswer(Answer $answer)
    { 
        return $answer->retrieveAnswer();
    }
}
