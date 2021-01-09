<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Models\FreelanceCategory;
use App\Models\Freelancer;
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
        $title = 'Активные фрилансеры';
        $data = [
            'title' => $title,
            'card_title' => $title,
            'freelancers' => Freelancer::whereNotIn('status', [0, 2])->paginate(15),
        ];

        return view('account.freelancer.index', $data);
    }

    public function pending()
    {
        $title = 'Ожидающие фрилансеры';
        $data = [
            'title' => $title,
            'card_title' => $title,
            'freelancers' => Freelancer::where('status', 0)->paginate(15),
        ];

        return view('account.freelancer.pending', $data);
    }

    public function archive()
    {
        $title = 'Архивные фрилансеры';
        $data = [
            'title' => $title,
            'card_title' => $title,
            'freelancers' => Freelancer::where('status', 2)->paginate(15),
        ];

        return view('account.freelancer.archive', $data);
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
        //
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
    public function edit(Request $request, $id)
    {
        $freelancer = Freelancer::findOrFail($id);
        $title      = 'Изменение фрилансера ' . $freelancer->name;

        $data = [
            'title'         => $title,
            'card_title'    => $title,
            'freelancer'    => $freelancer,
            'categories'    => FreelanceCategory::all(),
        ];

        if (!Auth::user()->can('ownFreelancer', $freelancer)) {
            $request->session()->flash('msg_error', 'У вас нет такого стартапа!');
            return redirect(route('account.freelancer.index'));
        }

        return view('account.freelancer.edit', $data);
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

        if (isset($data['img']) && $file = $data['img']) {

            $freelancer_dir = getUserImageDir() . Auth::user()->id . '/freelancers/';
            $file_path = $freelancer_dir . $file->getClientOriginalName();
            $file->move($freelancer_dir, $file->getClientOriginalName());

            $freelancer->img = $file_path;
        }

        $freelancer->status = 0;
        if ($freelancer->save()) {
            $updates++;

            if (isset($data['portfolios']) && !empty($data['portfolios'])) {

                $updates++;

                foreach ($data['portfolios'] as $portfolio) {
                    if (isset($portfolio['p_id']) && $user_portfolio = $freelancer->portfolio()->find($portfolio['p_id'])) {
                        $portfolio_changes = 0;

                        if (isset($portfolio['title']) && $portfolio['title'] !== $user_portfolio->title) {
                            $user_portfolio->title = $portfolio['title'];
                            $portfolio_changes++;
                        }

                        if (isset($portfolio['url']) && $portfolio['url'] !== $user_portfolio->url) {
                            $user_portfolio->url = $portfolio['url'];
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

        if ($updates) {
            $request->session()->flash('msg_success', 'Данные успешно добавлены.');
        } else {
            $request->session()->flash('msg_error', 'Ошибка, попробуйте позже!');
        }

        return redirect()->route('account.freelancer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($user = Auth::user()->id) {

            $freelancer = Freelancer::findOrFail($id);
            $freelancer_name = $freelancer->name;

            if ($freelancer->portfolio->count()) {
                foreach ($freelancer->portfolio as $portfolio) {
                    if (file_exists($portfolio->img)) {
                        unlink($portfolio->img);
                    }
                    $portfolio->delete();
                }
            }

            if (file_exists($freelancer->img) && !isDefaultImage($freelancer->img)) {
                unlink($freelancer->img);
            }

            if ($freelancer->delete()) {
                $request->session()->flash('msg_success', 'Фрилансер ' . $freelancer_name . ' успешно удален.');
            } else {
                $request->session()->flash('msg_error', 'Ошибка, попробуйте позже!');
            }

        }

        return redirect()->route('account.freelancer.index');
    }
}
