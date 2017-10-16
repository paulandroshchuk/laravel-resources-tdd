<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserCanGetListOfHisTeamsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserCanGetListOfHisTeams()
    {
        $this->assertTrue(true);
    }
}
