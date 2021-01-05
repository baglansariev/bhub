<?php

namespace App\Policies\Admin;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function see(User $user)
    {
        $see_users = $user->role->permissions()->where('code', 'see_users')->get();
        return $see_users->count();
    }

    public function manage(User $user)
    {
        $smanage_users = $user->role->permissions()->where('code', 'manage_users')->get();
        return $smanage_users->count();
    }
}
