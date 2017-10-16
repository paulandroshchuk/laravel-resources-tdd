<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamPolicy
{
    use HandlesAuthorization;

    /**
     * Check if a User is able to create a Team.
     *
     * @param User $authenticatedUser
     * @param User $routeUser
     * @return bool
     */
    public function create(User $authenticatedUser, $teamModel, User $routeUser)
    {
        dd($authenticatedUser, $routeUser);
        return $authenticatedUser->getKey() == $routeUser->getKey();
    }
}
