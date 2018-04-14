<?php

namespace App\Http\Controllers\Api\Shops;

use App\Http\Controllers\Controller;
use App\Http\Resources\Shops\ShopResource;
use App\Http\Requests\Api\Shops\CreateShopRequest;
use App\Contracts\Interactions\Api\Shops\CreateShopInteraction;

class ShopsController extends Controller
{
    /**
     * Create a new Shop.
     *
     * @param CreateShopRequest $request
     * @return ShopResource
     */
    public function store(CreateShopRequest $request)
    {
        $shop = $this->interact(CreateShopInteraction::class, [
            $request->user(),
            $request->validated(),
        ]);

        return new ShopResource($shop);
    }
}
