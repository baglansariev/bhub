<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StartupCategoryCreateRequest;
use App\Http\Requests\Admin\StartupCategoryEditRequest;
use App\Models\StartupCategory;
use Illuminate\Http\Request;
use App\Models\Pricing;

class StartupCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Все категорий стартапов',
            'categories' => StartupCategory::paginate(25),
        ];
        return view('admin.startup-category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Создание новой категории',
            'pricings' => Pricing::all(),
        ];

        return view('admin.startup-category.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StartupCategoryCreateRequest $request)
    {
        $data = $request->validated();

        if (StartupCategory::create($data)) {
            $request->session()->flash('msg_success', 'Категория успешно создана!');
        }
        else {
            $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
        }

        return redirect(route('startup-category.index'));
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
        $category = StartupCategory::findOrFail($id);
        $data = [
            'title' => 'Изменение категории стартапа',
            'category' => $category,
            'pricings' => Pricing::all(),
        ];

        return view('admin.startup-category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StartupCategoryEditRequest $request, $id)
    {
        $category = StartupCategory::findOrFail($id);
        $data = $request->validated();

        if ($category->update($data)) {
            $request->session()->flash('msg_success', 'Категория успешно изменена!');
        }
        else {
            $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
        }

        return redirect(route('startup-category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $category = StartupCategory::findOrFail($id);

        if ($category->startups->count()) {
            $request->session()->flash('msg_error', 'В данной категории еще есть стартапы!');
        }
        else if ($category->delete()) {
            $request->session()->flash('msg_success', 'Категория успешно удалена!');
        }
        else {
            $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
        }

        return redirect(route('startup-category.index'));
    }
}
