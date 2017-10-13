<?php

namespace App\Contracts\Interactions\Users;

interface CreateUserInteraction
{
    /**
     * Create a \App\Models\User.
     *
     * @param array $data
     * @return mixed
     */
    public function interact(array $data);
}
