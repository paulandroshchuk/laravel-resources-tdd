<?php

namespace App\Interactions\Api\Shops;

use App\Models\User;
use App\Contracts\Interactions\Api\Shops\CreateShopInteraction as Contract;

class CreateShopInteraction implements Contract
{
    /**
     * Create a \App\Models\Shop.
     *
     * @param User $user
     * @param array $data
     * @return mixed
     */
    public function interact($user, $data)
    {
        $shop = $user->shops()->create([
            'name'  =>  $data['name'],
        ]);

        return $shop;
    }
}
