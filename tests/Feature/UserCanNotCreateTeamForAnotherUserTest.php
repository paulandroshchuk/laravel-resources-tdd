<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserCanNotCreateTeamForAnotherUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserCanNotCreateTeamForAnotherUser()
    {
        $user0 = factory(\App\Models\User::class)->create();
        $user1 = factory(\App\Models\User::class)->create();

        $this->be($user0);
        $teamName = str_random(5);

        $this->assertDatabaseMissing('teams', [
            'name'  =>  $teamName,
        ]);

        $response = $this->postJson(route('api.teams.store', ['user' => $user1]), [
            'name'  =>  $teamName,
        ]);

        $response->assertStatus(403);

        $this->assertDatabaseMissing('teams', [
            'name'  =>  $teamName,
        ]);
    }
}
