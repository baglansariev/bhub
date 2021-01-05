<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pricing;

class PricingPlan extends Model
{
    protected $guarded = [];

    public function pricing()
    {
        return $this->belongsTo(Pricing::class);
    }
}
