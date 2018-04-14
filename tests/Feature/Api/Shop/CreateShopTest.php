<?php

namespace Tests\Feature\Api\Shop;

use App\Models\Shop;
use Tests\Feature\Api\ApiTestCase;

class CreateShopTest extends ApiTestCase
{
    /**
     * @var \App\Models\User
     */
    protected $user;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    function setUp()
    {
        parent::setUp();

        $this->user = $this->createUser();
        $this->actingAs($this->user, 'api');
    }

    /** @test */
    function user_can_own_a_shop()
    {
        $shop = Shop::where('name', 'Plantain');

        $this->assertNull($shop->first());

        $this->post(route('api.shops.store'), [
            'name'  =>  'Plantain',
        ])
        ->assertSuccessful();

        $this->assertNotNull($shop->first());
    }
}
