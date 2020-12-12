<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FreelanceCategory;

class Freelancer extends Model
{
    protected $table = 'freelancer';
    protected $fillable = ['user_id','category_id','name','position','img', 'status', 'characteristic', 'description'];

    public function freelanceCategory()
    {
    	return $this->belongsTo(FreelanceCategory::class);
    }
}
