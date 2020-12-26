<?php

namespace App\Http\Controllers\Partials;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Models\StartupCategory;
use App\Models\FreelanceCategory;

class HeaderController extends Controller
{
    public function show($data = [])
    {
        $data['startup_categories'] = StartupCategory::all();
        $data['freelance_categories'] = FreelanceCategory::all();
        $data['investors_count'] = User::where('role_id', 5)->get()->count();

        return view('frontend.partials._header', $data);
    }
}
