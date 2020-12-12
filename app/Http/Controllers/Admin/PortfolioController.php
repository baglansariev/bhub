<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Freelancer;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::all();
        $portfolios = $portfolios->load('freelancer'); //получим связные данные
        //dd($portfolios);
        return view('admin.portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$collection = Freelancer::all();
        //$freelancers = $collection->pluck('name', 'id');
        //$freelancers = $freelancers->all();
        $freelancers = Freelancer::all();
        //dd($freelancers);
        return view('admin.portfolios.create', compact('freelancers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            //'title' => 'mimes:doc,pdf,docx,zip,txt',
            'slug' => 'required',
            'url' => 'required',
            'img' => 'required',
            'img.*' => 'mimes:png,jpg,jpeg|max:1400'
        ]);

        $inputData = $request->except('_token');
        $titles = [];

        if (is_array($inputData['title'])) {
            foreach ($inputData['title'] as $id => $title) {
                if ($title != null) {
                    $titles[] = $title;
                };    
            }
        }

        //dd(count($titles));
        
        if (count($titles) > 1) {
            $inputData['title'] = json_encode($titles);     
        } else {
            foreach ($titles as $title) {
                $inputData['title'] = $title;
            }
        }

        //dd($inputData);

        if($request->hasfile('img'))
         {
            foreach($request->file('img') as $file)
            {
                // $name = time().'.'.$file->extension();
                $name = time().'-'.$file->getClientOriginalName();
                $file->move(public_path().'/img/portfolios/', $name);  
                $data[] = $name;  
            }
         }

         $inputData['img'] = json_encode($data);
         //dd($inputData);
         $res = Portfolio::create($inputData);
         
         if ($res) {
            // return redirect()->route('portfolios.index')->with('msg_success', 'Данные успешно добавлены.');   
            $request->session()->flash('msg_success', 'Данные успешно добавлены.');
         } else {
            // return redirect()->route('portfolios.index')->with('msg_success', 'Данные успешно добавлены.'); 
            $request->session()->flash('msg_error', 'Ошибка, попробуйте позже!');
         }

         return redirect(route('portfolios.index'));
        
        // return back()->with('msg_success', 'Данные успешно добавлены.');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
