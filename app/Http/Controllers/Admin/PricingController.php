<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingPlan;
use Illuminate\Http\Request;
use App\Models\Pricing;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Список тарифов',
            'pricings' => Pricing::all(),
        ];

        return view('admin.pricing.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pricing.create', ['title' => 'Создание тарифа']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $pricing = Pricing::create(['title' => $data['title']]);

        if ($pricing && isset($data['plans']) && !empty($data['plans'])) {

            foreach ($data['plans'] as $plan) {
                $planData = [
                    'title' => $plan['title'],
                    'price' => $plan['price'],
                    'on_top' => $plan['on_top'],
                ];

                if (isset($plan['limit'])) $planData['limit'] = $plan['limit'];
                if (isset($plan['sort_order'])) $planData['sort_order'] = $plan['sort_order'];

                if (isset($plan['advantages']) && !empty($plan['advantages'])) {
                    $planData['advantages'] = serialize($plan['advantages']);
                }

                $pricing->plans()->create($planData);
            }

        }

        if ($pricing) {
            $request->session()->flash('msg_success', 'Данные успешно добавлены!');
        }
        else {
            $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
        }

        return redirect()->route('pricing.index');
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
        $pricing = Pricing::findOrFail($id);

        $data = [
            'title' => 'Изменение тарифа ' . $pricing->title,
            'pricing' => $pricing,
        ];

        return view('admin.pricing.edit', $data);
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
        $data = $request->all();
        $pricing = Pricing::findOrFail($id);
        $pricing->title = $data['title'];
        $res = $pricing->save();

        if ($res && isset($data['plans']) && !empty($data['plans'])) {

            foreach ($data['plans'] as $plan) {
                $planData = [
                    'title' => $plan['title'],
                    'price' => $plan['price'],
                    'on_top' => $plan['on_top'],
                ];

                if (isset($plan['limit'])) $planData['limit'] = $plan['limit'];
                if (isset($plan['sort_order'])) $planData['sort_order'] = $plan['sort_order'];

                if (isset($plan['advantages']) && !empty($plan['advantages'])) {
                    $planData['advantages'] = serialize($plan['advantages']);
                }

                if (isset($plan['p_id'])) {
                    $pricing->plans()->find($plan['p_id'])->update($planData);
                }
                else {
                    $pricing->plans()->create($planData);
                }
            }

        }

        if (isset($data['deleted_plans']) && !empty($data['deleted_plans'])) {
            foreach ($data['deleted_plans'] as $deletedPlan) {
                if ($plan = PricingPlan::find($deletedPlan)) $plan->delete();
            }
        }

        if ($res) {
            $request->session()->flash('msg_success', 'Данные успешно изменены!');
        }
        else {
            $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
        }

        return redirect()->route('pricing.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $pricing = Pricing::findOrFail($id);
        $pricing_name = $pricing->name;

        if ($pricing->plans->count()) {
            foreach ($pricing->plans as $plan) {
                $plan->delete();
            }
        }

        if ($pricing->delete()) {
            $request->session()->flash('msg_success', 'Тариф ' . $pricing_name . 'успешно удален!');
        }
        else {
            $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
        }

        return redirect()->route('pricing.index');
    }
}
