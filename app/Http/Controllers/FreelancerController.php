<?php

namespace App\Http\Controllers;

use App\Models\FreelanceCategory;
use App\Models\Freelancer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FreelancerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category_id = false)
    {
        $data = ['title' => 'Фрилансеры'];
        $categories = FreelanceCategory::all();
        if (!$category_id) {
            $freelancers = Freelancer::where('status', 1)->get();
        } else {
            $category = FreelanceCategory::findOrFail($category_id);
            $freelancers = Freelancer::where('category_id', $category->id)->where('status', 1)->get();
            $data['title'] = $category->title;
        }
        $data['categories'] = $categories;
        $data['freelancers'] = $freelancers;


        return view('frontend.freelancer.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Создание нового фрилансера',
            'categories' => FreelanceCategory::all(),
        ];
        return view('frontend.freelancer.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $freelancer = new Freelancer();
        $data       = $request->all();


        if (isset($data['name'])) {
            $freelancer->name = $data['name'];
        }

        if (isset($data['position'])) {
            $freelancer->position = $data['position'];
        }

        if (isset($data['instagramm'])) {
            $freelancer->instagramm = $data['instagramm'];
        }

        if (isset($data['facebook'])) {
            $freelancer->facebook = $data['facebook'];
        }

        if (isset($data['phone'])) {
            $freelancer->phone = $data['phone'];
        }

        if (isset($data['category_id'])) {
            $freelancer->category_id = $data['category_id'];
        }

        if (isset($data['characteristic'])) {
            $freelancer->characteristic = $data['characteristic'];
        }

        if (isset($data['description'])) {
            $freelancer->description = $data['description'];
        }

        if (isset($data['img']) && $file = $data['img']) {

            $freelancer_dir = getUserImageDir() . Auth::user()->id . '/freelancers/';
            $file_path = $freelancer_dir . $file->getClientOriginalName();
            $file->move($freelancer_dir, $file->getClientOriginalName());

            $freelancer->img = $file_path;
        }

        $freelancer->status = 0;
        $freelancer->user_id = Auth::user()->id;

        if ($freelancer->save()) {

            if (isset($data['portfolios']) && !empty($data['portfolios'])) {

                foreach ($data['portfolios'] as $portfolio) {
                    if (isset($portfolio['title'])) {

                        $user_portfolio = $freelancer->portfolio()->create([
                            'title' => $portfolio['title']
                        ]);

                        if (isset($portfolio['url'])) {
                            $user_portfolio->url = $portfolio['url'];
                        }

                        if (isset($portfolio['img']) && $file = $portfolio['img']) {
                            $portfolio_dir = getUserImageDir() . Auth::user()->id . '/portfolios/';
                            $file_path = $portfolio_dir . $file->getClientOriginalName();
                            $file->move($portfolio_dir, $file->getClientOriginalName());

                            $user_portfolio->img = $file_path;
                        }

                        $user_portfolio->save();

                    }
                }

            }

            $request->session()->flash('msg_success', 'Данные успешно добавлены. Ожидайте подтверждения модератора');

        }
        else {
            $request->session()->flash('msg_error', 'Ошибка, попробуйте позже!');
        }

        if (isset($freelancer->freelanceCategory->pricing)) {
            return redirect()->route('front-freelancer.pricing', $freelancer->id);
        }
        return redirect()->route('front.freelancer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $freelancer = Freelancer::findOrFail($id);
        $portfolios = $freelancer->portfolio()->get();
        $data = [
            'title' => $freelancer->name,
            'freelancer' => $freelancer,
            'portfolios' => $portfolios,
        ];

        return view('frontend.freelancer.show', $data);
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

    public function pricing($id)
    {
        $freelancer = Freelancer::findOrFail($id);
        $data = [
            'freelancer' => $freelancer,
            'pricing' => $freelancer->freelanceCategory->pricing,
        ];
        return view('frontend.pricing', $data);
    }
}
