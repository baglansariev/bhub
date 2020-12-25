<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FreelanceCategory;
use App\Models\Portfolio;

class Freelancer extends Model
{
    protected $table = 'freelancer';
    protected $fillable = ['user_id','category_id','name','position','img', 'status', 'characteristic', 'description', 'facebook', 'instagramm'];

    public function freelanceCategory()
    {
    	return $this->belongsTo(FreelanceCategory::class, 'category_id');
    }

    public function portfolio()
    {
    	return $this->hasMany(Portfolio::class);
    }
}
