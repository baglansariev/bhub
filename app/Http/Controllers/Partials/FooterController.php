<?php

namespace App\Http\Controllers\Partials;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon; 
use App\Models\Contact;

class FooterController extends Controller
{
    public function show($data = [])
    {
    		// $data['contacts'] = ["phone1" => "87017777777", "phone2" => "87017777778", "email" => "example@gmail.com", "addres1" => "first address", "address2" => "second address"];

    	$data['contacts'] = Contact::all();
    	$carbon = new Carbon();
    	$carbon = $carbon->format("Y");
    	$data['date'] = $carbon;
      return view('frontend.partials._footer', $data);
    }
}
