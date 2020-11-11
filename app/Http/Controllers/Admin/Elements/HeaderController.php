<?php

namespace App\Http\Controllers\Admin\Elements;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function show()
    {
        return view('admin.elements.header');
    }
}
