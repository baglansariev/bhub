<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuizAnswer;
use App\Models\Quiz;

class QuizAnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quiz = Quiz::all();
        $quiz = $quiz->load('quiz_answers');
        return view('admin.quiz-answers.index', compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quizs = Quiz::pluck("question", "id");
        return view('admin.quiz-answers.create', compact('quizs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedInput = $request->validate([
            'answer' => 'required',
            'quiz_id' => 'required'
        ]);

        $quizAnswer = QuizAnswer::create($validatedInput);

        if ($quizAnswer->save()) {
            $request->session()->flash('msg_success', 'Ответ добавлен!');
        } else {
            $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
        }

        return redirect(route('quiz-answers.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quizAnswer = QuizAnswer::findOrFail($id);
        return view('admin.quiz-answers.edit', compact('quizAnswer'));
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
        $validatedDate = $request->validate([
            'answer' => 'required'
        ]);

        $quizAnswer = QuizAnswer::findOrFail($id);
        $data = $request->except('_token');

        if ($quizAnswer->update($data)) {
            $request->session()->flash('msg_success', 'Вопрос успешно изменен!');
        }
        else {
            $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
        }

        return redirect(route('quiz-answers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $quizAnswer = QuizAnswer::findOrFail($id);

        if ($quizAnswer->delete()) {
            $request->session()->flash('msg_success', 'Ответ <b>' . $quizAnswer->answer . '</b> успешно удален.');
        } else {
            $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
        }

        return redirect(route('quiz-answers.index'));
    }
}
