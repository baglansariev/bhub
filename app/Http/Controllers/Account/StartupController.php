<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Startup;
use Illuminate\Support\Facades\Auth;
use App\Models\StartupCategory;

class StartupController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $data = [
            'title' => 'Активные стартапы',
            'startups' => $user->startups()->where('status', '!=', 0)->paginate(15),
        ];

        return view('account.startup.index', $data);
    }

    public function pending()
    {
        $user = Auth::user();

        $data = [
            'title' => 'Ожидающие стартапы',
            'startups' => $user->startups()->where('status', 0)->paginate(15),
        ];

        return view('account.startup.pending', $data);
    }

    public function archive()
    {
        $user = Auth::user();

        $data = [
            'title' => 'Архивные стартапы',
            'startups' => $user->startups()->where('status', 2)->paginate(15),
        ];

        return view('account.startup.archive', $data);
    }

    public function edit(Request $request, $id)
    {
        $startup = Startup::findOrFail($id);
        if (!Auth::user()->can('ownStartup', $startup)) {
            $request->session()->flash('msg_error', 'У вас нет такого стартапа!');
            return redirect(route('account.startup.index'));
        }

        $data = [
            'title' => 'Изменение стартапа ' . $startup->title,
            'card_title' => 'Изменение стартапа ' . $startup->title,
            'startup' => $startup,
            'categories' => StartupCategory::all(),
        ];

        return view('account.startup.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $startup = Startup::findOrFail($id);

        if (!Auth::user()->can('ownStartup', $startup)) {
            $request->session()->flash('msg_error', 'У вас нет такого стартапа!');
            return redirect(route('account.startup.index'));
        }

        $data = $request->all();

        $startup->update($data);

        if ($file = $request->file('image')) {
            $startup_dir = getUserImageDir() . Auth::user()->id . '/startups/';
            $file_path = $startup_dir . $file->getClientOriginalName();
            $file->move($startup_dir, $file->getClientOriginalName());

            $startup->image = $file_path;
        }

        $startup->status = 0;

        if ($startup->save()) {
            $request->session()->flash('msg_success', 'Ваш стартап находится на модерации. Скоро ваши изменения появятся на сайте');
        }
        else {
            $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
        }

        return redirect(route('account.startup.index'));

    }

    public function destroy(Request $request, $id)
    {
        $startup = Startup::findOrFail($id);

        if (!Auth::user()->can('ownStartup', $startup)) {
            $request->session()->flash('msg_error', 'У вас нет такого стартапа!');
            return redirect(route('account.startup.index'));
        }

        $startup_name = $startup->name;

        if (file_exists($startup->image) && !isDefaultImage($startup->image)) unlink($startup->image);

        if ($startup->delete()) {
            $request->session()->flash('msg_success', 'Стартап <b>' . $startup_name . '</b> успешно удален!');
        }
        else {
            $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
        }

        return redirect(route('account.startup.index'));
    }
}
