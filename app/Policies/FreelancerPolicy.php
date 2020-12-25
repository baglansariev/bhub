<?php

namespace App\Policies;

use App\User;
use App\Models\Freelancer;
use Illuminate\Auth\Access\HandlesAuthorization;

class FreelancerPolicy
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

    public function ownFreelancer(User $user, Freelancer $freelancer)
    {
        return $user->id === $freelancer->user_id;
    }
}
