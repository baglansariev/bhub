<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AccountController extends Controller
{
    public function index()
    {
    	return view('account.index');
    }

    public function pesonalData(Request $request, $user_id)
    {
    	$user = User::findOrFail($user_id);
    	return view('account.personal-data.index', $user);	
    }

    public function personalDataEdit(Request $request, $user_id)
    {
    		$user = User::findOrFail($user_id);
    		$title = "Изменение личных данных " . "<strong>" . $user->name . "</strong>";
    		$data = [
    			'title' => $title,
    			'user' => $user
    		];
    		return view('account.personal-data.edit', $data);
    }
}
