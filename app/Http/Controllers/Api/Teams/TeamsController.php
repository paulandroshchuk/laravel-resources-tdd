<?php

namespace App\Http\Controllers\Api\Teams;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\Teams\TeamResource;
use App\Http\Requests\Api\Teams\CreateTeamRequest;
use App\Contracts\Interactions\Teams\CreateTeamInteraction;

class TeamsController extends Controller
{
    /**
     * Show a list of User Teams;
     *
     * @param User $user
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(User $user)
    {
        $this->authorize('manage', $user);
        $teams = $user->teams();

        return TeamResource::collection($teams->get());
    }

    /**
     * Create a \App\Models\Team.
     *
     * @param User $user
     * @param CreateTeamRequest $request
     * @return TeamResource
     */
    public function store(User $user, CreateTeamRequest $request)
    {
        $team = $this->interact(CreateTeamInteraction::class, [
            $user,
            $request->validated(),
        ]);

        return new TeamResource($team);
    }
}
