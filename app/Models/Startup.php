<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StartupCategory;

class Startup extends Model
{
    protected $guarded = [];

    public $top_limit = 12;

    public function category()
    {
        return $this->belongsTo(StartupCategory::class, 'startup_category_id');
    }
}
