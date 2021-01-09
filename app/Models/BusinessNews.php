<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;
use App\Models\Quiz;
use Laravelista\Comments\Comment;

class BusinessNews extends Model
{
	//Исрользуем библиотеку комментарий
	use Commentable;
    //Укажем произвольно имя нашей таблицы
    protected $table = 'business_news';
    protected $fillable = ['title','slug','body','img', 'video'];

    public function quiz()
    {
    	return $this->hasMany(Quiz::class);
    }

    public function comment()
    {
    	return $this->hasMany(Comment::class, 'commentable_id');
    }

}
