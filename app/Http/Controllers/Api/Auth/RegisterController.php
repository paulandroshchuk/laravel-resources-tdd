<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\Users\UserResource;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Contracts\Interactions\Users\CreateUserInteraction;

class RegisterController extends Controller
{
    /**
     * Create a \App\Models\User.
     *
     * @param RegisterRequest $request
     * @return UserResource
     */
    public function store(RegisterRequest $request)
    {
        $user = $this->interact(CreateUserInteraction::class, $request->validated());

        return new UserResource($user);
    }
}
