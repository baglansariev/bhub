<?php

namespace App\Http\Controllers\Partials;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StartupCategory;
use App\Models\FreelanceCategory;

class HeaderController extends Controller
{
    public function show($data = [])
    {
        $data['startup_categories'] = StartupCategory::all();
        $data['freelance_categories'] = FreelanceCategory::all();

        return view('frontend.partials._header', $data);
    }
}
