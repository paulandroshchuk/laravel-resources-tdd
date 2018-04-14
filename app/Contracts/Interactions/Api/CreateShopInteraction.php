<?php

namespace App\Contracts\Interactions\Api\Shops;

use App\Models\User;

interface CreateShopInteraction
{
    /**
     * Create a \App\Models\Shop.
     *
     * @param User $user
     * @param array $data
     * @return mixed
     */
    public function interact($user, $data);
}
