<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessNews;

use Laravelista\Comments\Commenter;
use Laravelista\Comments\Comment;
use App\Models\Like;
use App\Likable;
use App\Models\FreelanceCategory;
use App\Models\Freelancer;
use App\Models\StartupCategory;

class FrontController extends Controller
{
    //
	public function index ()
	{
		$data = [
		    'title' => 'Главная',
            'startup_categories' => StartupCategory::all(),
        ];

		return view("frontend.index", $data);
	}

	public function businessNews ()
	{

		$news = BusinessNews::take(3)->get();
		$latestPost = BusinessNews::orderBy('id', 'DESC')->first();
		$data = [
            'title' => "Бизнес новости",
            'latestPost' => $latestPost,
            'news' => $news
        ];
		//dd($latestPost);

		return view("frontend.business-news", $data);
	}

	public function newsDetail ( $slug = "" )
	{

		$post = BusinessNews::whereSlug($slug)->first();
		$data = ["title" => $post->title, "post" => $post];
		//dd($data["post"]->title);

		return view("frontend.news-on-click", $data);
	}

	public function freelancers ($category_id = false)
	{

		$categories = FreelanceCategory::all();
		if (!$category_id) {
			$freelancers = Freelancer::where('status', 1)->get();
		} else {
			$freelancers = Freelancer::where('category_id', $category_id)->where('status', 1)->get();
		}
        $data = [
            "title" => "Фрилансеры",
            'categories' => $categories,
            'freelancers' => $freelancers,
        ];

		return view("frontend.freelancers", $data);
	}

	// public function freelancerFilter($id)
	// {
	// 	$data = ["title" => "Фрилансеры"];
	// 	$categories = FreelanceCategory::all();
	// 	$freelancers = Freelancer::where('category_id', $id)->get();
	// 	//dd($freelancers);
	// 	return redirect()->route("freelancers");
	// 	// return view("frontend.freelancers", compact('data', 'categories', 'freelancers'));
	// }

	public function employee ()
	{
		$data = ["title" => "Работник"];

		return view("frontend.employee", compact("data"));
	}

	public function findAnInvestor ()
	{
		$data = ["title" => "Найти инвестора"];

		return view("frontend.find-an-investor", compact("data"));
	}

	public function findAnEmployer ()
	{
		$data = ["title" => "Найти работадателя"];

		return view("frontend.find-an-employer", compact("data"));
	}

	public function ajaxRequest(Request $request){

        $response = "";
        $status = false;

        if (auth()->user()){

        	$like = Like::where('comment_id', $request->id)->where('user_id', $request->user_id)->first();

        	if ($like) {
				// Если пришел лайк от юсера, проверим если у юсера установлен лайк на данный коммент то удалим запись
        		if ($like->user_id == $request->user_id && $like->comment_id == $request->id && $like->liked == true) {
        			$response = Like::where('user_id', $request->user_id)->where('comment_id', $request->id)->delete();
        			$status = false;
        		}
        	} else {
        		$data = [
        			'user_id' => $request->user_id,
        			'comment_id' => $request->id,
        			'liked' => true
        		];

        		$response = Like::create($data);
        		$status = $data['liked'];
        	}

        } else {
        	$message = "Авторизуйтесь.";
        	return response()->json(['success'=>auth()->user(), "message" => $message]);
        }

        $response = [
        	'status' => $status,
        	'count' => Like::where('comment_id', $request->id)->get()->count(),
        ];

        return response()->json(['success' => $response]);
    }

}
