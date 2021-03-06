<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Startup;
use App\Models\Pricing;

class StartupCategory extends Model
{
    protected $guarded = [];

    public function startups()
    {
        return $this->hasMany(Startup::class);
    }

    public function pricing()
    {
        return $this->belongsTo(Pricing::class);
    }
}
