<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FreelanceCategory;
use Illuminate\Http\Request;

class FreelanceCategories extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = FreelanceCategory::all();
        //dd($categories);
        return view('admin.freelance-categories.index', compact('categories'));
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
        $request->validate([
            'title' => 'required'
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
    public function edit(FreelanceCategory $FreelanceCategory)
    {
        //dd($FreelanceCategory);
        return view('admin.freelance-categories.edit', compact('FreelanceCategory'));
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
        $FreelanceCategory->delete();
  
        return redirect()->route('freelance-categories.index')
                        ->with('success','Данные успешно удалены');
    }
}
