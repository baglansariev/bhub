<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Models\BusinessNews;

use Laravelista\Comments\Commenter;
use Laravelista\Comments\Comment;
use App\Models\Like;
use App\Likable;
use App\Models\FreelanceCategory;
use App\Models\Freelancer;
use App\Models\StartupCategory;
use App\Models\Quiz;
use App\Models\QuizAnswer;
use App\Models\QuizUserAnswer;

class FrontController extends Controller
{
    //
	public function index ()
	{
		$data = [
		    'title' => 'Главная',
            'latest_post' => BusinessNews::orderBy('id', 'DESC')->first(),
            'partners' => Partner::orderBy('created_at')->take(4)->get(),
        ];

		return view("frontend.index", $data);
	}

	public function businessNews ()
	{

		$news = BusinessNews::paginate(15);
		$latestPosts = BusinessNews::orderBy('id', 'DESC')->limit(4)->get();

        $data = [
            'title' => "Бизнес новости",
            'latestPosts' => $latestPosts,
            'news' => $news
        ];

		return view("frontend.business-news", $data);
	}

	public function newsDetail ( $slug = "" )
	{

		$post = BusinessNews::whereSlug($slug)->first();
		$quiz = $post->quiz()->first();

		if (!is_null($quiz)) {
			$quiz_answer = $quiz->load('quiz_answers');
			$quiz_user_answers = $quiz_answer->load('quiz_user_answers');
			$data = ["title" => $post->title, "post" => $post, "quiz" => $quiz_user_answers];
		} else {
			$data = ["title" => $post->title, "post" => $post];	
		}
		// $data = ["title" => $post->title, "post" => $post, "quiz" => $quiz_answer];

		return view("frontend.news-on-click", $data);
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

    public function ajaxPortfolio(Request $request)
    {
    	//$html = "<input type='text' name='title[{$request->count}]['title']'>123</input>";
    	$html = "<div class='form-row'>
                    <div class='col-xs-12 col-sm-6 col-md-6'>
                        <div class='form-group'>
                            <label>Наименование:</label>
                            <div class='input-group hdtuto control-group lst increment-title' >
                                <input type='text' name='portfolio[{$request->index}][title]' class='myfrm form-control' placeholder='Наименование' required>
                                <div class='input-group-btn'> 
                                    <button class='btn btn-success btn-add-title' type='button'><i class='fas fa-plus'></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-xs-12 col-sm-6 col-md-6'>
                        <div class='form-group'>
                            <label>slug:</label>
                            <input type='text' name='portfolio[{$request->index}][slug]' class='form-control' placeholder='slug' value='' required>
                        </div>
                    </div>
                    <div class='col-xs-12 col-sm-6 col-md-6'>
                        <div class='form-group'>
                            <label>Ссылка:</label>
                            <input type='text' name='portfolio[{$request->index}][url]' class='form-control' placeholder='Ссылка' value='' required>
                        </div>
                    </div>
                    <div class='col-xs-12 col-sm-6 col-md-6'>
                        <div class='form-group'>
                            <label>Фото портфолио:</label>
                            <div class='input-group hdtuto control-group lst increment-img'>
                                <input type='file' name='portfolio[{$request->index}][img]' class='myfrm form-control' required>
                                <div class='input-group-btn'> 
                                    <button class='btn btn-success btn-success-img' type='button'><i class='fas fa-plus'></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
    	return $html;
    }

    public function ajaxQuizUserAnswer(Request $request)
    {
    	$inputData = $request->except('_token');
    	$validated = $request->validate([
    		'user_id' => 'required',
    		'quiz_id' => 'required',
    		'quiz_answers_id' => 'required'
    	]);
    	$quiz_user_answer = QuizUserAnswer::create($validated);

    	if ($quiz_user_answer->save()) {
    		$request->session()->flash('msg_success', 'Ответ принят.');
    	} else {
    		$request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
    	}

    	return redirect()->back();
    }

}
