<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\User;
use App\Models\Role;
use App\Http\Requests\Admin\UserCreateRequest;
use App\Http\Requests\Admin\UserEditRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public $user_image_dir = 'img/user/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Список пользователей',
            'users' => User::paginate(25),
        ];
        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Создание нового пользователя',
            'roles' => Role::all(),
        ];
        return view('admin.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $valid_data = $request->validated();

        $data = [
            'name' => $valid_data['name'],
            'email' => $valid_data['email'],
            'password' => Hash::make($valid_data['password']),
        ];

        if (isset($valid_data['role_id'])) {
            $data['role_id'] = $valid_data['role_id'];
        }

        $user = User::create($data);

        if (isset($valid_data['image']) && $file = $valid_data['image']) {
            $file_path = $this->user_image_dir . $user->id . '/' . $file->getClientOriginalName();
            $file->move($this->user_image_dir . $user->id . '/', $file->getClientOriginalName());

            $user->image = $file_path;
            $user->save();
        }

        if ($user) {
            $request->session()->flash('msg_success', 'Новый пользователь успешно создан!');
        }
        else {
            $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
        }

        return redirect(route('user.index'));
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
        $user = User::findOrFail($id);
        $data = [
            'title' => 'Изменение пользователя ' . $user->name,
            'user' => $user,
            'roles' => Role::all(),
        ];

        return view('admin.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $valid_data = $request->validated();

        $user->name = $valid_data['name'];
        $user->email = $valid_data['email'];

        if (isset($valid_data['role_id'])) {
            $user->role_id = $valid_data['role_id'];
        }

        if (isset($valid_data['password'])) {
            $user->password = Hash::make($valid_data['password']);
        }

        if (isset($valid_data['image']) && $file = $valid_data['image']) {
            $file_path = $this->user_image_dir . $user->id . '/' . $file->getClientOriginalName();
            $file->move($this->user_image_dir . $user->id . '/', $file->getClientOriginalName());

            $user->image = $file_path;
        }

        if ($user->save()) {
            $request->session()->flash('msg_success', 'Пользователь <b>' . $user->name . '</b> успешно изменен!');
        }
        else {
            $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
        }

        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user_name = $user->name;

        if (file_exists($this->user_image_dir . $user->id)) {
            removeDir($this->user_image_dir . $user->id);
        }

        if ($user->delete()) {
            $request->session()->flash('msg_success', 'Пользователь <b>' . $user_name . '</b> успешно удален!');
        }
        else {
            $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
        }

        return redirect(route('user.index'));
    }
}
