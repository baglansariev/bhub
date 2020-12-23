<?php

namespace App\Policies;

use App\User;
use App\Models\Startup;
use Illuminate\Auth\Access\HandlesAuthorization;

class StartupPolicy
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

    public function ownStartup(User $user, Startup $startup)
    {
        return $user->id === $startup->user_id;
//            ? Response::allow()
//            : Response::deny('У вас нет прав для изменения этого стартапа');
    }
}
