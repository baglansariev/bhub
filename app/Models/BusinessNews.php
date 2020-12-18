<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;
use App\Models\Quiz;

class BusinessNews extends Model
{
	//Исрользуем библиотеку комментарий
	use Commentable;
    //Укажем произвольно имя нашей таблицы
    protected $table = 'business_news';
    protected $fillable = ['title','slug','body','img'];

    public function quiz()
    {
    	return $this->hasMany(Quiz::class);
    }

}
