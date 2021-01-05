<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PricingPlan;

class Pricing extends Model
{
    protected $guarded = [];

    public function plans()
    {
        return $this->hasMany(PricingPlan::class);
    }
}
