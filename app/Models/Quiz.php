<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BusinessNews;
use App\Models\QuizAnswer;

class Quiz extends Model
{
    protected $table = 'quizs';
    protected $fillable = ['question', 'business_news_id'];

    public function business_news()
    {
    	return $this->hasMany(BusinessNews::class);
    }

    public function quiz_answers()
    {
    	return $this->hasMany(QuizAnswer::class);
    }

}
