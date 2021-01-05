<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\BusinessNews;
use App\Models\Freelancer;
use App\Models\Permission;
use App\Models\Startup;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

	public function __construct()
	{
		$this->middleware(['auth','verified']);
	}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'users_count' => User::all()->count(),
            'business_news_count' => BusinessNews::all()->count(),
            'freelancers_count' => Freelancer::all()->count(),
            'startups_count' => Startup::all()->count(),
        ];
        return view('admin.home', $data);
    }

}
