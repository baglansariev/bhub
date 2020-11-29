<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class BusinessNews extends Model
{
	//Исрользуем библиотеку комментарий
	use Commentable;
    //Укажем произвольно имя нашей таблицы
    protected $table = 'business_news';
}
