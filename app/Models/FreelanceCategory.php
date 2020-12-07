<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Freelancer;

class FreelanceCategory extends Model
{
	protected $table = 'freelance_categories';
    protected $fillable = ['title'];


    public function Freelancers()
    {
    	return $this->hasMany(Freelancer::class);
    }
}
