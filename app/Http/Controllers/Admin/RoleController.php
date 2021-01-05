<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\RoleCreateRequest;
use App\Http\Requests\Admin\RoleEditRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->can('see', new User())) {
            return redirect(url('/admin'));
        }

        $data = [
            'title'         => 'Группы',
            'roles'         => Role::all(),
        ];

        return view('admin.role.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('manage', new User())) {
            return redirect(url('/admin'));
        }
        $data = [
            'title' => 'Создание группы',
            'permissions'   => Permission::all(),
        ];
        return view('admin.role.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleCreateRequest $request)
    {
        $data = $request->validated();

        $role = Role::create([
            'name' => $data['name'],
            'code' => $data['code']
        ]);

        if (isset($data['permissions']) && !empty($data['permissions'])) {
            foreach ($data['permissions'] as $permission_id) {
                $permission = Permission::find($permission_id);

                $role->permissions()->attach($permission);
            }
        }

        if ($role) {
            $request->session()->flash('msg_success', 'Группа <b>' . $role->name . '</b> успешно создана!');
        }
        else {
            $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
        }

        return redirect(route('role.index'));
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
    public function edit(Request $request, $id)
    {
        if (!Auth::user()->can('manage', new User())) {
            return redirect(url('/admin'));
        }

        $role = Role::findOrFail($id);

        if ($role->isAdmin()) {
            $request->session()->flash('msg_error', 'Ошибка! Вы не можете изменять СУПЕР АДМИНА!');
            return redirect(route('role.index'));
        }

        $data = [
            'title' => 'Изменение группы',
            'role' => $role,
            'permissions' => Permission::all(),
        ];

        return view('admin.role.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleEditRequest $request, $id)
    {
        $data = $request->validated();
        $role = Role::findOrFail($id);

        $role->update([
            'name' => $data['name'],
            'code' => $data['code']
        ]);

        $role->permissions()->detach();

        if (isset($data['permissions']) && !empty($data['permissions'])) {
            foreach ($data['permissions'] as $permission_id) {
                $permission = Permission::find($permission_id);

                $role->permissions()->attach($permission);
            }
        }

        if ($role) {
            $request->session()->flash('msg_success', 'Группа <b>' . $role->name . '</b> успешно изменена!');
        }
        else {
            $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
        }

        return redirect(route('role.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (!Auth::user()->can('manage', new User())) {
            return redirect(url('/admin'));
        }

        $role = Role::findOrFail($id);

        if ($role->isSystemRole()) {
            $request->session()->flash('msg_error', 'Ошибка! Вы не можете удалить системную роль!');
            return redirect(route('role.index'));
        }

        $role->permissions()->detach();
        $role_name = $role->name;

        if ($role->delete()) {
            $request->session()->flash('msg_success', 'Группа <b>' . $role_name . '</b> успешно удалена!');
        }
        else {
            $request->session()->flash('msg_error', 'Ошибка попробуйте позже!');
        }

        return redirect(route('role.index'));
    }
}
