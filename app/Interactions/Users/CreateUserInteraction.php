<?php

namespace App\Interactions\Users;

use App\Models\User;
use App\Contracts\Interactions\Users\CreateUserInteraction as Contract;

class CreateUserInteraction implements Contract
{
    /**
     * Create a \App\Models\User.
     *
     * @param array $data
     * @return mixed
     */
    public function interact(array $data)
    {
        $data['password'] = bcrypt($data['password']);

        return User::create($data);
    }
}
