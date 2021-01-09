<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessNews;
use Illuminate\Support\Facades\Config;
use Laravelista\Comments\Commenter;
use Laravelista\Comments\Comment;
use App\User;

class BusinessNewsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!canDo('see_news')) return redirect(url('/admin'));

        $news = BusinessNews::latest()->paginate(3);
        //dd(count($news));
        return view('admin.business-news.index', compact('news'))->with('i', (request()->input('page', 1) - 1) * 3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!canDo('add_news')) return redirect(url('/admin'));
        return view('admin.business-news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'image|mime:png,jpg,jpeg|max:2048',
            //'img' => 'required'
        ]);

        $data = $request->all();

        if (isset($data['img']) && $file = $data['img']) {
            $post_dir = 'img/business-news/';
            $file_name = time() . '-' . $file->getClientOriginalName();
            $file->move($post_dir, $file_name);

            $data['img'] = $file_name;
        }

        BusinessNews::create($data);
        //dd($request->all());
        //dd(BusinessNews::create($request->all()););
   
        return redirect()->route('business-news.index')
                        ->with('success','Данные успешно добавлены.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessNews $BusinessNews)
    {
        $BusinessNews = BusinessNews::findOrFail($BusinessNews->id)->load('comment');
        //dd($model);
        //$model = $request->commentable_type::findOrFail($request->commentable_id);
        // $commentClass = Config::get('comments.model');
        // $comment = new $commentClass;
        // $comment->commentable()->associate($model);
        //$comments = Comment::where('commentable_id', $model->id)->get();
        foreach ($BusinessNews->comment as $key => $value) {
            $BusinessNews->comment[$key]['user_data'] = $value->commenter_type::where('id', $value->commenter_id)->first();
        }

        if (!canDo('see_news')) return redirect(url('/admin'));
        return view('admin.business-news.show',compact('BusinessNews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessNews $BusinessNews)
    {
        if (!canDo('edit_news')) return redirect(url('/admin'));
        $BusinessNews = BusinessNews::findOrFail($BusinessNews->id)->load('comment');

        return view('admin.business-news.edit',compact('BusinessNews'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessNews $BusinessNews)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $update = [
            'title' => $request->title, 
            'slug' => $request->slug,
            'video' => $request->video,
            'body' => $request->body
        ];

        if ($files = $request->file('img')) {
            $destinationPath = 'img/business-news/'; // upload path
            $profileImage = date('YmdHis') . "-" . $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage);
            $update['img'] = $profileImage;
        }
        $BusinessNews->update($update);

        //dd($BusinessNews->update($request->all()));
  
        return redirect()->route('business-news.index')
                        ->with('success','Данные успешно обновлены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessNews $BusinessNews)
    {
        if (!canDo('delete_news')) return redirect(url('/admin'));
        $BusinessNews->delete();
  
        return redirect()->route('business-news.index')
                        ->with('success','Данные успешно удалены');
    }

    public function mainNews()
    {
        $data = [
            'title' => 'Главные новости',
        ];
        return view('admin.business-news.main-news', $data);
    }

    public function postComment(Request $request, $id)
    {
        $comment = $request->message;
        //dd($comment['message']);
        Comment::where('id', $id)->update(['comment' => $comment]);
        return redirect()->route('business-news.index')->with('success', 'Комментарий успешно обновлен');
    }

    public function postCommentDelete(Request $request, $id, Comment $comment)
    {
        $comment->find($id)->delete();
        return redirect()->route('business-news.index')->with('success', 'Комментарий успешно удален');
    }
}
