<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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

    public function personalDataUpdate(Request $request, $id)
    {
    	$result = null;
    	$data = null;
    	$inputData = $request->except('_token', 'null');
    	$messages = [
    		'name' => 'required',
    		'email' => 'Email is not valid',
    		'password' => 'Password is required',
    		'password' => 'Password must be at least 6 characters'
    	];

    	$validator = Validator::make($request->all(), [
    		'name' => ['required', 'string', 'max:255'],
    		//'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    		'password' => (!is_null($request->password)) ? ['required', 'string', 'min:8', 'confirmed'] : "",
    	], $messages);

    	$image = ($request->image) ? $request->image : null;
    	if (!is_null($image)) {
    		$imageName = time() . '-' . $image->getClientOriginalName();
    		$image->move("img/user/{$id}/", $imageName);
    	}

    	if (!is_null($inputData['password']) && !is_null($inputData['password_confirmation'])) {
    		$result = User::create([
    			'name' => $inputData['name'],
    			'email' => $inputData['email'],
    			'password' => Hash::make($inputData['password']),
    		]);	
    	} else {
    		$inputData = $request->except('password', 'password_confirmation', '_token');
    		dd($inputData);
    		$result = $request->user()->update($inputData);
    	};
    	
    }
}
