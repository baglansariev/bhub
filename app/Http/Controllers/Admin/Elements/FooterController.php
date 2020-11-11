<?php

namespace App\Http\Controllers\Admin\Elements;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function show()
    {
        return view('admin.elements.footer');
    }
}
