<?php

namespace App\Interactions\Teams;

use App\Contracts\Interactions\Teams\CreateTeamInteraction as Contract;
use App\Models\Team;
use App\Models\User;

class CreateTeamInteraction implements Contract
{
    /**
     * Create a \App\Models\Team.
     *
     * @param User $user
     * @param array $data
     * @return mixed
     */
    public function interact($user, $data)
    {
        app('db')->beginTransaction();

        $team = Team::create($data);
        $user->teams()->attach($team, [
            'role'  =>  'owner',
        ]);

        app('db')->commit();

        return $team;
    }
}
