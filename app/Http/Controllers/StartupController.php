<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Startup;
use App\Models\StartupCategory;
use App\Http\Requests\StartupCreateRequest;
use Illuminate\Support\Facades\Auth;

class StartupController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Стартапы',
            'startups' => Startup::where('status', '!=', 0)->paginate(16),
            'top_startups' => Startup::where('top', '!=', 0)->where('status', '!=', 0)->get(),
        ];

        return view('frontend.startup.index', $data);
    }

    public function show($id)
    {
        $startup = Startup::findOrFail($id);

        $data = [
            'title' => $startup->title,
            'startup' => $startup,
        ];

        return view('frontend.startup.show', $data);
    }

    public function category($category)
    {
        $category = StartupCategory::where('code', $category)->first();

        if ($category) {
            $data = [
                'title' => $category->name,
                'startups' => $category->startups()->paginate(12),
            ];

            return view('frontend.startup.index', $data);
        }

        return redirect('/');


    }

    public function create()
    {
        $data = [
            'title' => 'Добавление нового стартапа',
            'categories' => StartupCategory::all(),
        ];

        return view('frontend.startup.create', $data);
    }

    public function store(StartupCreateRequest $request)
    {
        $user = Auth::user();
        $data = $request->validated();

        $startup = $user->startups()->create([
            'title'                 => $data['title'],
            'phone'                 => $data['phone'],
            'price'                 => $data['price'],
            'short_desc'            => $data['short_desc'],
            'full_desc'             => $data['full_desc'],
            'startup_category_id'   => $data['startup_category_id'],
        ]);

        if (isset($data['video'])) {
            $startup->video = $data['video'];
        }

        if ($file = $request->file('image')) {
            $startup_dir = getUserImageDir() . Auth::user()->id . '/startups/';
            $file_path = $startup_dir . $file->getClientOriginalName();
            $file->move($startup_dir, $file->getClientOriginalName());

            $startup->image = $file_path;
        }


        if ($startup->save()) {
            $request->session()->flash('msg_success', 'Ваш стартап отправлен на модерацию. Ожидайте пока его подтвердят');
        }
        else {
            $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
        }

        return redirect(route('front-startup.index'));

    }
}
