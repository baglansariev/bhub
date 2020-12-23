<?php

namespace App\Http\Controllers\Partials;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StartupCategory;

class HeaderController extends Controller
{
    public function show($data = [])
    {
        $data['startup_categories'] = StartupCategory::all();

        return view('frontend.partials._header', $data);
    }
}
