<?php

namespace App\Contracts\Interactions\Teams;

use App\Models\User;

interface CreateTeamInteraction
{
    /**
     * Create a \App\Models\Team.
     *
     * @param User $user
     * @param array $data
     * @return mixed
     */
    public function interact($user, $data);
}
