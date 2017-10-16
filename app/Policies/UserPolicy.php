<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Check if a User can manage route's User.
     *
     * @param User $authenticatedUser
     * @param User $routeUser
     * @return bool
     */
    public function manage(User $authenticatedUser, User $routeUser)
    {
        return $authenticatedUser->getKey() == $routeUser->getKey();
    }
}
