<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessNews;

use Laravelista\Comments\Commenter;
use Laravelista\Comments\Comment;
use App\Models\Like;
use App\Likable;

class FrontController extends Controller
{
    //
	public function index ()
	{
		$data = ["title" => "Главная"];

		return view("frontend.index", compact('data'));
	}

	public function businessNews ()
	{
		
		$news = BusinessNews::take(3)->get();
		$latestPost = BusinessNews::orderBy('id', 'DESC')->first();
		$data = ['title' => "Бизнес новости"];
		//dd($latestPost);

		return view("frontend.business-news", compact("data", "news", "latestPost"));
	}

	public function newsDetail ( $slug = "" )
	{
		//$like = Like::find(5);
		// //$likable = Like::all();
		// $liked = 1;
		// $test = $like->where('user_id', auth()->id())->where('comment_id', $like->comment_id);
		// $test = $test->updateOrCreate(
		// 	[
		// 		'user_id' => auth()->id(),        
		// 	], 

		// 	[
		// 		'liked' => $liked    
		// 	]
		// );
		//dd($test);
		// $comment = Like::find(1);
		// //$like = $comment->where('user_id', 1)->first();
		// dd($comment);
		// $like->liked = 1;
		// $like->save();

		// $data = [
		// 	'user_id' => auth()->id(),
		// 	'comment_id' => 17,
		// 	'liked' => true		
		// ];

		// $result = Like::create($data);
		// dd($result);

		$data = [
			'user_id' => auth()->id(),
			'comment_id' => 17,	
		];

		//$result = Like::where('user_id', auth()->id())->where('comment_id', 17)->delete();
		//dd($result);

		$post = BusinessNews::whereSlug($slug)->first();
		$data = ["title" => $post->title, "post" => $post];
		//dd($data["post"]->title);

		return view("frontend.news-on-click", compact("data"));
	}

	public function startups ()
	{
		$data = ["title" => "Стартапы"];

		return view("frontend.startups", compact('data'));
	}

	public function startup ()
	{
		$data = ["title" => "Стартап"];

		return view("frontend.startup", compact('data'));
	}

	public function freelancers ()
	{
		$data = ["title" => "Фрилансеры"];

		return view("frontend.freelancers", compact('data'));
	}

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

        // $post = Comment::find($request->id);
        // $response = auth()->user()->toggleLike($post);
        $response = "";
        $status = false;

        if (auth()->user()){
			// $post = Comment::find($request->id);
			// $like = Like::where('user_id', $request->user_id)->where('comment_id', $request->id)->first();
			// $like = Like::where('comment_id', $request->id)->first();
        	$like = Like::where('comment_id', $request->id)->where('user_id', $request->user_id)->first();
					// return response()->json(['success'=>$request->id]);
        	if ($like) {
				// Проверим если у юсера установлен лайк на данный коммент то удалим запись
        		if ($like->user_id == $request->user_id && $like->comment_id == $request->id && $like->liked == true) {
        			$response = Like::where('user_id', $request->user_id)->where('comment_id', $request->id)->delete();
        			$status = false;

        			//return response()->json(["success" => $response]);	

        		}
        	} else {
        		$data = [
        			'user_id' => $request->user_id,
        			'comment_id' => $request->id,
        			'liked' => true		
        		];

        		$response = Like::create($data);
        		$status = $data['liked'];
        		//return response()->json(["success" => $response]);
        	}


					// $like = $comment->where('user_id', 1)->first();
					// $like->liked = 1;
					// $like->save();
					// $test = auth()->user();		
        } else {
        	$message = "Авторизуйтесь.";
        	return response()->json(['success'=>auth()->user(), "message" => $message]);
        }

        $response = [
        	'status' => $status,
        	'count' => Like::where('comment_id', $request->id)->get()->count(),
        ];
        //$response = auth()->user()->toggleLike($post);


        return response()->json(['success' => $response]);
    }

}
