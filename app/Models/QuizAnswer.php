<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;
use App\Models\QuizUserAnswer;

class QuizAnswer extends Model
{

	protected $fillable = ['answer', 'quiz_id'];
    
    public function quiz()
    {
    	return $this->belongsTo(Quiz::class);
    }

    public function quiz_user_answers()
    {
    	return $this->belongsTo(QuizUserAnswer::class);
    }
}
