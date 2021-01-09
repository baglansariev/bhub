<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Список партнеров',
            'partners' => Partner::all(),
        ];

        return view('admin.partners.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Создание нового партнера',
        ];

        return view('admin.partners.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has(['title', 'link'])) {

            $partner = Partner::create([
                'title' => $request->title,
                'link' => $request->link,
                'image' => 'img/defaults/our-partner.png',
            ]);

            if ($partner && $file = $request->image) {
                $img_dir = 'img/partners/';
                $file_path = $img_dir . $file->getClientOriginalName();
                $file->move($img_dir, $file->getClientOriginalName());
                $partner->image = $file_path;
                $partner->save();
            }

            if ($partner) {
                $request->session()->flash('msg_success', 'Новый партнер успешно создан!');
            }
            else {
                $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
            }

        }

        return redirect()->route('partner.index');
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
        $partner = Partner::findOrFail($id);
        $data = [
            'title' => 'Изменение партнера ' . $partner->title,
            'partner' => $partner
        ];
        return view('admin.partners.edit', $data);
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
        if ($request->has(['title', 'link'])) {
            $partner = Partner::findOrFail($id);

            $partner->update([
                'title' => $request->title,
                'link' => $request->link,
            ]);

            if ($partner && $file = $request->image) {
                if (file_exists($partner->image) && !isDefaultImage($partner->image)) unlink($partner->image);

                $img_dir = 'img/partners/';
                $file_path = $img_dir . time() . $file->getClientOriginalName();
                $file->move($img_dir, time() . $file->getClientOriginalName());
                $partner->image = $file_path;
            }

            if ($partner->save()) {
                $request->session()->flash('msg_success', 'Партнер успешно изменен!');
            }
            else {
                $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
            }

        }

        return redirect()->route('partner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $partner = Partner::findOrFail($id);
        if (file_exists($partner->image) && !isDefaultImage($partner->image)) unlink($partner->image);

        if ($partner->delete()) {
            $request->session()->flash('msg_success', 'Партнер успешно удален!');
        }
        else {
            $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
        }

        return redirect()->route('partner.index');

    }
}
