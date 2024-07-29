<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Answer extends Model
{
    use HasFactory;

    protected $guarded = [];
    /**
     * Summary of user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Summary of question
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
    /**
     * Summary of option
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function option(): BelongsTo
    {
        return $this->belongsTo(option::class);
    }
    /**
     * Summary of createAnswer
     * @param array<user> $user_answer
     * @return void
     */
    public function createAnswer (array $user_answer):void
    {
        Answer::updateOrCreate(
        [  
           'question_id' => $user_answer['question_id'],
           
        ],
        [
            'user_id'  =>$user_answer['user_id'],
            'question_id' => $user_answer['question_id'],
            'option_id' => $user_answer['option_id'],
            'is_correct' =>$user_answer['is_correct']
         ]
    );
    }

    public function retrieveAnswer()
    {
        $user_id = Auth::user()->id;
      return  Answer::where('user_id', $user_id)->get();

    }
}
