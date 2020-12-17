<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;

class QuizAnswer extends Model
{

	protected $fillable = ['answer', 'quiz_id'];
    
    public function quiz()
    {
    	return $this->belongsTo(Quiz::class);
    }
}
