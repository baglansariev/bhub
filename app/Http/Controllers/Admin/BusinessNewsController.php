<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessNews;

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
            'img' => 'required'
        ]);
  
        BusinessNews::create($request->all());
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
        //dd($BusinessNews);
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
  
        $BusinessNews->update($request->all());

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
}
