<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Freelancer;
use App\Models\FreelanceCategory;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Auth;

class FreelancerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!canDo('see_freelancers')) return redirect(url('/admin'));
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
        if (!canDo('add_freelancers')) return redirect(url('/admin'));
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

        if (isset($data['slug'])) {
            $freelancer->slug = $data['slug'];
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

        if (isset($data['status'])) {
            $freelancer->status = $data['status'];
        }

        if (isset($data['img']) && $file = $data['img']) {

            $freelancer_dir = getUserImageDir() . Auth::user()->id . '/freelancers/';
            $file_path = $freelancer_dir . $file->getClientOriginalName();
            $file->move($freelancer_dir, $file->getClientOriginalName());

            $freelancer->img = $file_path;
        }

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

        return redirect()->route('freelancers.index');
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
        if (!canDo('edit_freelancers')) return redirect(url('/admin'));

        $freelancer = Freelancer::findOrFail($id);
        $data = [
            'title' => 'Изменение фоилансера ' . $freelancer->name,
            'categories' => FreelanceCategory::all(),
            'freelancer' => $freelancer
        ];
        return view('admin.freelancer.edit', $data);
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

        $freelancer = Freelancer::findOrFail($id);
        $data       = $request->all();
        $updates    = 0;

        if (isset($data['name']) && $data['name'] !== $freelancer->name) {
            $freelancer->name = $data['name'];
        }

        if (isset($data['position']) && $data['position'] !== $freelancer->position) {
            $freelancer->position = $data['position'];
        }

        if (isset($data['instagramm']) && $data['instagramm'] !== $freelancer->instagramm) {
            $freelancer->instagramm = $data['instagramm'];
        }

        if (isset($data['facebook']) && $data['facebook'] !== $freelancer->facebook) {
            $freelancer->facebook = $data['facebook'];
        }

        if (isset($data['phone']) && $data['phone'] !== $freelancer->phone) {
            $freelancer->phone = $data['phone'];
        }

        if (isset($data['category_id']) && $data['category_id'] !== $freelancer->category_id) {
            $freelancer->category_id = $data['category_id'];
        }

        if (isset($data['characteristic']) && $data['characteristic'] !== $freelancer->characteristic) {
            $freelancer->characteristic = $data['characteristic'];
        }

        if (isset($data['description']) && $data['description'] !== $freelancer->description) {
            $freelancer->description = $data['description'];
        }

        if (isset($data['status']) && $data['status'] !== $freelancer->status) {
            $freelancer->status = $data['status'];
        }

        if (isset($data['img']) && $file = $data['img']) {

            $freelancer_dir = getUserImageDir() . Auth::user()->id . '/freelancers/';
            $file_path = $freelancer_dir . $file->getClientOriginalName();
            $file->move($freelancer_dir, $file->getClientOriginalName());

            $freelancer->img = $file_path;
        }

        if ($freelancer->save()) {
            $updates++;

            if (isset($data['portfolios']) && !empty($data['portfolios'])) {

                $updates++;

                foreach ($data['portfolios'] as $portfolio) {
                    if (isset($portfolio['p_id']) && $user_portfolio = Portfolio::find($portfolio['p_id'])) {
                        $portfolio_changes = 0;

                        if (isset($portfolio['title']) && $portfolio['title'] !== $user_portfolio->title) {
                            $user_portfolio->title = $portfolio['title'];
                            $portfolio_changes++;
                        }

                        if (isset($portfolio['url']) && $portfolio['url'] !== $user_portfolio->url) {
                            $user_portfolio->url = $portfolio['url'];
                            $portfolio_changes++;
                        }

                        if (isset($portfolio['slug']) && $portfolio['slug'] !== $user_portfolio->slug) {
                            $user_portfolio->slug = $portfolio['slug'];
                            $portfolio_changes++;
                        }

                        if (isset($portfolio['img']) && $file = $portfolio['img']) {
                            $portfolio_dir = getUserImageDir() . Auth::user()->id . '/portfolios/';
                            $file_path = $portfolio_dir . $file->getClientOriginalName();
                            $file->move($portfolio_dir, $file->getClientOriginalName());

                            $user_portfolio->img = $file_path;
                            $portfolio_changes++;
                        }

                        if ($portfolio_changes > 0) {
                            $user_portfolio->save();
                        }

                    }
                    else {

                        if (isset($portfolio['title'])) {

                            $user_portfolio = $freelancer->portfolio()->create([
                                'title' => $portfolio['title']
                            ]);

                            if (isset($portfolio['url'])) {
                                $user_portfolio->url = $portfolio['url'];
                            }

                            if (isset($portfolio['slug'])) {
                                $user_portfolio->slug = $portfolio['slug'];
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

            }

            if (isset($data['deleted_portfolios']) && !empty($data['deleted_portfolios'])) {
                foreach ($data['deleted_portfolios'] as $delPortfolioId) {
                    if ($deletedPortfolio = $freelancer->portfolio()->find($delPortfolioId)) {
                        if (file_exists($deletedPortfolio->img)) {
                            unlink($deletedPortfolio->img);
                        }
                        $deletedPortfolio->delete();
                    }
                }
            }

        }

        if ($updates > 0) {
            $request->session()->flash('msg_success', 'Данные успешно изменены.');
        } else {
            $request->session()->flash('msg_error', 'Ошибка, попробуйте позже!');
        }

        return redirect()->route('freelancers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!canDo('delete_freelancers')) return redirect(url('/admin'));
        $freelancer = Freelancer::findOrFail($id);
        $freelancer->delete();
  
        return redirect()->route('freelancers.index')
                        ->with('success','Данные успешно удалены');
    }
}
