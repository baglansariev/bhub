<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Freelancer;
use App\Models\FreelanceCategory;

class FreelancerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $freelancers = Freelancer::all();
        //dd($freelancers);
        return view('admin.freelancer.index', compact('freelancers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = FreelanceCategory::pluck('title', 'id');
        //dd($categories);
        return view('admin.freelancer.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'status' => 'required',
            'position' => 'required',
            'characteristic' => 'required',
            'description' => 'required',
            'image' => 'image|mime:png,jpg,jpeg|max:2048'
            //'img' => 'mimes:jpeg,jpg,png,gif,svg|max:2048',
            // 'img' => 'required|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);
        
        //dd($validatedData );
        
        $img = $request->img;
        if ($img) {
            //dd($img);
            $imgName = $img->getClientOriginalName();
            $img->move('img/freelancers/', $imgName);
            $validatedData['img'] = "img/" . $imgName;    
        } else {
            $validatedData['img'] = "defaults/no-image.png";
        }

        Freelancer::create($validatedData);
        if ($request->type == 'freelancer-profile') {
            return redirect()->route('freelancers')
                        ->with('msg_success','Данные успешно добавлены.');        
        } else {
            return redirect()->route('freelancers.index')
                        ->with('msg_success','Данные успешно добавлены.');
        }
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
    public function edit(Freelancer $Freelancer)
    {
        //dd($Freelancer->freelanceCategory()->where('id', $Freelancer->category_id));
        $category = FreelanceCategory::where('id', $Freelancer->category_id)->first();
        return view('admin.freelancer.edit',compact('Freelancer', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Freelancer $Freelancer)
    {

        $Freelancer->update($request->all());

        //dd($BusinessNews->update($request->all()));

        return redirect()->route('freelancers.index')
        ->with('success','Данные успешно обновлены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Freelancer $Freelancer)
    {
        $Freelancer->delete();
  
        return redirect()->route('freelancers.index')
                        ->with('success','Данные успешно удалены');
    }
}
