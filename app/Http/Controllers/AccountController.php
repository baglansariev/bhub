<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
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
    	$data = [
    		'title' => "BHub пользователь - " . $user->name,
    		'user' => $user
    	];
    	return view('account.personal-data.index', $data);	
    }

    public function personalDataEdit(Request $request, $user_id)
    {
    		$user = User::findOrFail($user_id);
    		$title = "Изменение личных данных - {$user->name}";
    		$data = [
    			'title' => $title,
    			'user' => $user
    		];
    		return view('account.personal-data.edit', $data);
    }

    public function personalDataUpdate(Request $request, $id)
    {
    	$messages = [
    		'name' => 'required',
    		'email' => 'Email is not valid',
    		'password' => 'Password is required',
    		'password' => 'Password must be at least 6 characters'
    	];

    	$validator = Validator::make($request->all(), [
    		// 'name'     => 'required|string|max:255',
    		'name'     => ['required','string','max:255'],
    		'phone'    => (!is_null($request->phone)) ? 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10' : '',
    		'email'    => 'required|string|email|max:255',
    		//'image'    => 'image|mime:png,jpg,jpeg|max:2048',
    		'image' => ['mimes:jpg,jpeg,png,bmp'],
    		'password' => (!is_null($request->password)) ? 'required|string|confirmed|min:8|max:255' : "",
    	], $messages);

    	$result = null;
    	$data = null;

    	if ($validator->validated()) {
    		$input = $request->except('_token', 'null');
    	}

    	$user = User::findOrFail($id);

    	if (isset($input['name'])) {
    		$user->name = $input['name'];
    	};

    	if (isset($input['phone'])) {
    		$user->phone = $input['phone'];
    	};

    	if (isset($input['email'])) {
    		$user->email = $input['email'];
    	};

    	if (isset($input['image']) && $file = $input['image']) {
    		$userDir = getUserImageDir() . $id . '/';
    		$imageName = time() . '-' . $file->getClientOriginalName();
    		$filePath = $userDir . $imageName;
    		$file->move($userDir, $imageName);
    		$user->image = $filePath;
    	};

    	if (isset($input['password'])) {
    		$user->password = Hash::make($input['password']);
    	};

    	if ($user->save()) {
    		$request->session()->flash('msg_success', 'Данные успешно обновлены.');
    	} else {
    		$request->session()->flash('msg_error', 'Ошибка, попробуйте позже!');
    	}

    	return redirect()->route('account.personalData', ['user_id' => $user->id, 'user_name' => $user->name]);
    }
}
