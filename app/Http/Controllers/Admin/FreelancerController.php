<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Freelancer;
use App\Models\FreelanceCategory;
use App\Models\Portfolio;

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
            'image' => 'image|mime:png,jpg,jpeg|max:2048',
            'facebook' => 'url',
            'instagramm' => 'url',
            //'img' => 'mimes:jpeg,jpg,png,gif,svg|max:2048',
            // 'img' => 'required|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);
        
        //dd($validatedData);
        
        $user_id = $request->user_id;
        $img = $request->img;
        if ($img) {
            $imgName = time().'-'.$img->getClientOriginalName();
            $img->move('img/freelancers/', $imgName);
            $validatedData['img'] = "img/freelancers/" . $imgName;
        } else {
            $validatedData['img'] = "img/defaults/no-image.png";
        }

        if ($user_id) {
            $validatedData['user_id'] = $user_id;
        }

        //dd($validatedData);

        $freelancer = Freelancer::create($validatedData);
        if ($request->type == 'freelancer-profile') {
            $inputDataPortfolio = $request->except('_token', 'img');
            $freelancer = Freelancer::where('id', $freelancer->id)->first();
            //dd($freelancer);
            foreach ($inputDataPortfolio['portfolio'] as $portfolio) {
                if (!is_null($portfolio['title']) && !is_null($portfolio['url']) && !is_null($portfolio['img'])) {

                    $fileName = time().'-'.$portfolio['img']->getClientOriginalName();
                    $arrPortfolio = [
                        "freelancer_id" => $freelancer->id,
                        "title" => $portfolio['title'],
                        "url" => $portfolio['url'],
                        "img" => $fileName
                    ];
                    //dd($fileName);
                    $portfolio['img']->move(public_path().'/img/portfolios/', $fileName);

                    $res = Portfolio::create($arrPortfolio);
                    if ($res) {
                        $request->session()->flash('msg_success', 'Данные успешно добавлены.');
                    } else {
                        $request->session()->flash('msg_error', 'Ошибка, попробуйте позже!');
                    }        
                }
            }
            return redirect()->route('freelancers')
                        ->with('msg_success','Данные успешно добавлены.');        
        } else {
            return redirect()->route('freelancers.index')
                        ->with('msg_success','Данные успешно добавлены.');
        }
        // if ($request->type == 'freelancer-profile') {
        //     return redirect()->route('freelancers')
        //                 ->with('msg_success','Данные успешно добавлены.');        
        // } else {
        //     return redirect()->route('freelancers.index')
        //                 ->with('msg_success','Данные успешно добавлены.');
        // }
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
