<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AccountController extends Controller
{
    public function index(Request $request, $user_id)
    {
    	$user = User::findOrFail($user_id);
        return view('account.index', compact('user'));
    }

    public function edit(Request $request, $id)
    {

    }
}
