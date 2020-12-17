<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BusinessNews;

class Quiz extends Model
{
    protected $table = 'quizs';
    protected $fillable = ['question', 'post_id'];

    public function BusinessNews()
    {
    	return $this->hasMany(BusinessNews::class);
    }

}
