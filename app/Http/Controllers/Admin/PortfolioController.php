<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Freelancer;
use App\Helpers\MainHelper;

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
        // foreach ($portfolios as $key => $value) {
        //     dd($value);
        //     // echo "<pre>";
        //     //     print_r($value->freelancer);
        //     // echo "</pre>";
        // }
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
        $requestData = $request->except('_token');
        // $data = $request->validate($requestData['portfolio'][0],[
        //     "name"    => "required",
        // ]);

        // echo "<pre>";
        // print_r($requestData['portfolio'][0]['img']->getClientOriginalName());
        // echo "</pre>";
        //dd($requestData);

        foreach ($requestData['portfolio'] as $key => $item) {
            $inputData = [
                "freelancer_id" => $requestData['freelancer_id'],
                "title" => $item['title'],
                "slug" => $item['slug'],
                "url" => $item['url'],
                "img" => $item['img']->getClientOriginalName()
            ];

            $fileName = time().'-'.$item['img']->getClientOriginalName();
            $item['img']->move(public_path().'/img/portfolios/', $fileName); 

            $res = Portfolio::create($inputData);
            
            if ($res) {
            // return redirect()->route('portfolios.index')->with('msg_success', 'Данные успешно добавлены.');   
                $request->session()->flash('msg_success', 'Данные успешно добавлены.');
            } else {
            // return redirect()->route('portfolios.index')->with('msg_success', 'Данные успешно добавлены.'); 
                $request->session()->flash('msg_error', 'Ошибка, попробуйте позже!');
            }       
        }

        return redirect(route('portfolios.index'));
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
