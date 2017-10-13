<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserCanCreateTeamTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserCanCreateTeam()
    {
        $user = factory(\App\Models\User::class)->create();

        $this->be($user);
        $teamName = str_random(5);

        $this->assertDatabaseMissing('teams', [
            'name'  =>  $teamName,
        ]);

        $response = $this->postJson("/api/users/$user/teams", [
            'name'  => $teamName,
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'data'  =>  [
                'name'
            ]
        ]);

        $this->assertDatabaseHas('teams', [
            'name'  =>  $teamName,
        ]);

        $this->assertDatabaseHas('team_users', [
            'user_id'  =>  $user->getKey(),
            'team_id'  =>  array_get(json_decode($response->getContent(), true), 'data.id'),
        ]);
    }
}
