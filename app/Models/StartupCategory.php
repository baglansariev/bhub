<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Startup;

class StartupCategory extends Model
{
    protected $guarded = [];

    public function startups()
    {
        return $this->hasMany(Startup::class);
    }
}
