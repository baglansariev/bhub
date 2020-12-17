<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Freelancer;

class Portfolio extends Model
{

	protected $fillable = ['freelancer_id','title','slug','url','img'];

    public function Freelancer()
    {
    	return $this->belongsTo(Freelancer::class);
    }
}
