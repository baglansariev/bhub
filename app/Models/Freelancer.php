<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FreelanceCategory;

class Freelancer extends Model
{
    protected $table = 'freelancer';
    protected $fillable = ['category_id','name','position','img'];

    public function freelanceCategory()
    {
    	return $this->belongsTo(FreelanceCategory::class);
    }
}
