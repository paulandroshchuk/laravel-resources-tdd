<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTestCase extends TestCase
{
    use RefreshDatabase;

    /**
     * @return \App\Models\User
     */
    public function createUser()
    {
        return factory(User::class)->create();
    }
}
