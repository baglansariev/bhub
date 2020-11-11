<?php

namespace App\Http\Controllers\Admin\Elements;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SidebarController extends Controller
{
    public function show()
    {
        return view('admin.elements.sidebar');
    }
}
