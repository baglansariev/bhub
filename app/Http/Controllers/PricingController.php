<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Startup;
use App\Models\Freelancer;
use App\Models\PricingPlan;

class PricingController extends Controller
{
    public function freelancer(Request $request)
    {
        if ($request->has(['freelancer_id', 'pricing_plan_id'])) {
            $freelancer = Freelancer::findOrFail($request->post('freelancer_id'));

            $freelancer->paid = 1;
            $freelancer->pricing_plan_id = $request->post('pricing_plan_id');

            if ($freelancer->save()) {
                $request->session()->flash('msg_success', 'Данные успешно добавлены. Ожидайте подтверждения модератора');
            }
        }
        else {
            $request->session()->flash('msg_error', 'Ошибка, попробуйте позже!');
        }

        return redirect()->route('front.freelancer.index');
    }

    public function startup(Request $request)
    {
        if ($request->has(['startup_id', 'pricing_plan_id'])) {
        $startup = Startup::findOrFail($request->post('startup_id'));

        $startup->paid = 1;
        $startup->pricing_plan_id = $request->post('pricing_plan_id');

        if ($startup->save()) {
            $request->session()->flash('msg_success', 'Данные успешно добавлены. Ожидайте подтверждения модератора');
        }
    }
    else {
        $request->session()->flash('msg_error', 'Ошибка, попробуйте позже!');
    }

        return redirect()->route('front-startup.index');
    }
}
