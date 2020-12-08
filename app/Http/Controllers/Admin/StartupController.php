<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Startup;
use App\Models\StartupCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StartupController extends Controller
{

    public $user_image_dir = 'img/user/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Все стартапы',
            'startups' => Startup::paginate(25),
        ];

        return view('admin.startup.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Создать новый стартап',
            'categories' => StartupCategory::all(),
        ];

        return view('admin.startup.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $startup = Startup::create($data);


        if ($file = $request->file('image')) {
            $file_path = $this->user_image_dir . Auth::user()->id . '/' . $file->getClientOriginalName();
            $file->move($this->user_image_dir . Auth::user()->id . '/', $file->getClientOriginalName());

            $startup->image = $file_path;
        }
        $startup->user_id = Auth::user()->id;

        if ($startup->save()) {
            $request->session()->flash('msg_success', 'Новый стартап успешно создан!');
        }
        else {
            $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
        }

        return redirect(route('startup.index'));
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
        $startup = Startup::findOrFail($id);

        $data = [
            'title' => 'Изменение стартапа',
            'startup' => $startup,
            'categories' => StartupCategory::all(),
        ];

        return view('admin.startup.edit', $data);
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
        $startup = Startup::findOrFail($id);
        $data = $request->all();

        $startup->update($data);

        if ($file = $request->file('image')) {
            $file_path = $this->user_image_dir . Auth::user()->id . '/' . $file->getClientOriginalName();
            $file->move($this->user_image_dir . Auth::user()->id . '/', $file->getClientOriginalName());

            $startup->image = $file_path;
        }

        if ($startup->save()) {
            $request->session()->flash('msg_success', 'Стартап успешно изменен!');
        }
        else {
            $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
        }

        return redirect(route('startup.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $startup = Startup::findOrFail($id);
        $startup_name = $startup->name;
        $user = Auth::user();

        if (file_exists($this->user_image_dir . $user->id)) {
            removeDir($this->user_image_dir . $user->id);
        }

        if ($startup->delete()) {
            $request->session()->flash('msg_success', 'Стартап <b>' . $startup_name . '</b> успешно удален!');
        }
        else {
            $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
        }

        return redirect(route('startup.index'));
    }
}
