<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\BusinessNews;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quiz = Quiz::all();
        //dd($quiz);
        return view('admin.quiz.index', compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = BusinessNews::pluck('title', 'id');

        return view('admin.quiz.create', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_date = $request->validate([
            'question' => 'required',
            'business_news_id' => 'required',
        ]);
  
        $quiz = Quiz::create($validated_date);

        if ($quiz->save()) {
            $request->session()->flash('msg_success', 'Опрос добавлен!');
        }
        else {
            $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
        }

        return redirect(route('quiz.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz = Quiz::find($id);
        $quiz_post = BusinessNews::where('id', $quiz->business_news_id)->first();
        return view('admin.quiz.show', compact('quiz', 'quiz_post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz_post = BusinessNews::where('id', $quiz->business_news_id)->first();
        $posts = BusinessNews::all();
        $data = [
            'title' => 'Изменение опроса'
        ];
        //dd($posts);
        return view('admin.quiz.edit', compact('data', 'quiz_post', 'quiz', 'posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'question' => 'required',
        //     'business_news_id' => 'required'
        // ]);
        $quiz = Quiz::findOrFail($id);
        $data = $request->except('_token');
        if (!is_null($data["select_business_news_id"])) {
            $data['business_news_id'] = $data["select_business_news_id"];
        };
        //dd($data);
        if ($quiz->update($data)) {
            $request->session()->flash('msg_success', 'Опрос успешно изменен!');
        }
        else {
            $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
        }

        return redirect(route('quiz.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $quiz = Quiz::findOrFail($id);

        if ($quiz->delete()) {
            $request->session()->flash('msg_success', 'Опрос <b>' . $quiz->question . '</b> успешно удален!');
        }
        else {
            $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
        }

        return redirect(route('quiz.index'));
    }
}
