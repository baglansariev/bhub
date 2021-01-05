<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FreelanceCategory;
use Illuminate\Http\Request;
use App\Models\Pricing;

class FreelanceCategories extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!canDo('see_freelancer_categories')) return redirect(url('/admin'));
        $data = [
            'title' => 'Все категории',
            'categories' => FreelanceCategory::all(),
            'pricings' => Pricing::all(),
        ];

        return view('admin.freelance-categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!canDo('add_freelancer_categories')) return redirect(url('/admin'));
        $request->validate([
            'title' => 'required',
            'pricing_id' => 'integer'
        ]);
        //dd($request->all());
        FreelanceCategory::create($request->all());
        //dd($request->all());
        //dd(BusinessNews::create($request->all()););
        return back();
   
        // return redirect()->route('freelance-categories.index')
        //                 ->with('success','Данные успешно добавлены.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Freelance  $freelance
     * @return \Illuminate\Http\Response
     */
    public function show(FreelanceCategory $FreelanceCategory)
    {
        // $categories = self::index()->categories;
        // return view('admin.freelance-categories.index', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Freelance  $freelance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!canDo('edit_freelancer_categories')) return redirect(url('/admin'));
        $category = FreelanceCategory::findOrFail($id);
        $data = [
            'title' => 'Изменение категории ' . $category->title,
            'category' => $category,
            'pricings' => Pricing::all(),
        ];
        return view('admin.freelance-categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Freelance  $freelance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FreelanceCategory $FreelanceCategory)
    {
        $request->validate([
            'title' => 'required',
            'pricing_id' => 'integer',
        ]);
  
        $FreelanceCategory->update($request->all());

        //dd($BusinessNews->update($request->all()));
  
        return redirect()->route('freelance-categories.index')
                        ->with('success','Данные успешно обновлены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Freelance  $freelance
     * @return \Illuminate\Http\Response
     */
    public function destroy(FreelanceCategory $FreelanceCategory)
    {
        if (!canDo('delete_freelancer_categories')) return redirect(url('/admin'));
        $FreelanceCategory->delete();
  
        return redirect()->route('freelance-categories.index')
                        ->with('success','Данные успешно удалены');
    }
}
