<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Quiz;
use App\Models\QuizAnswer;

class QuizUserAnswer extends Model
{

	protected $fillable = ['user_id', 'quiz_id', 'quiz_answers_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function quiz()
    {
    	return $this->belongsTo(Quiz::class);
    }

    public function quiz_answers()
    {
    	return $this->hasMany(QuizAnswer::class);
    }

    public static function getAnswerCount($quiz_answers_id)
    {
    	$answerCount = self::all()->where("quiz_answers_id", $quiz_answers_id)->count();
    	return $answerCount;
    }
}
