<?php

namespace App\Http\Controllers\Api\Teams;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Teams\CreateTeamRequest;
use App\Contracts\Interactions\Teams\CreateTeamInteraction;
use App\Http\Resources\Teams\TeamResource;

class TeamsController extends Controller
{
    /**
     * Create a \App\Models\Team.
     *
     * @param CreateTeamRequest $request
     * @return TeamResource
     */
    public function store(CreateTeamRequest $request)
    {
        $team = $this->interact(CreateTeamInteraction::class, [
            $request->user(),
            $request->validated(),
        ]);

        return new TeamResource($team);
    }
}
