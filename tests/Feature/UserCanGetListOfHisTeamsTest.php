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
        $user = factory(\App\Models\User::class)->create();
        $team = factory(\App\Models\Team::class)->create();
        $user->teams()->attach($team, [
            'role'  =>  'owner'
        ]);

        $this->be($user);

        $response = $this->getJson(route('api.teams.index', ['user' => $user]));
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data'  =>  [
                '*' =>  [
                    'id',
                    'name'
                ]
            ]
        ]);
    }
}
