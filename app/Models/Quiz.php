<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BusinessNews;
use App\Models\QuizAnswer;

class Quiz extends Model
{
    protected $table = 'quizs';
    protected $fillable = ['question', 'post_id'];

    public function BusinessNews()
    {
    	return $this->hasMany(BusinessNews::class);
    }

    public function quiz_answers()
    {
    	return $this->hasMany(QuizAnswer::class);
    }

}
