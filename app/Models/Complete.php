<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * remember to destroy this class if session logic works
 */
 
 
class Complete extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function saveAnswer()
    {
        $answer = new Answer();
        $completes = $answer->retrieveAnswer();
        
        // $completes = $answersData->map(function($answersData){
        //     return[
        //         'user_id'  =>$answersData->user_id,
        //         'question_id' => $answersData->question_id,
        //         'option_id' => $answersData->option_id,
        //         'is_correct' =>$answersData->is_correct
        //     ];
            
        // })->toArray();

        

        
        foreach ($completes as $complete) {
            Complete::updateOrCreate([
                    [ 'question_id' => $complete['question_id']],
                    [
                     'user_id'  =>$complete->user_id,
                     'question_id' => $complete->question_id,
                     'option_id' => $complete->option_id,
                     'is_correct' =>$complete->is_correct
                    ]
            ]);
            
        }
    }
}
