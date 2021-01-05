<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Freelancer;
use App\Models\Pricing;

class FreelanceCategory extends Model
{
	protected $table = 'freelance_categories';
    protected $fillable = ['title', 'pricing_id'];


    public function Freelancers()
    {
    	return $this->hasMany(Freelancer::class);
    }

    public function pricing()
    {
        return $this->belongsTo(Pricing::class);
    }
}
