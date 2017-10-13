<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserCanRegister()
    {
        $user = factory(\App\Models\User::class)->make();
        $compressedUser = array_only($user->makeVisible('password')->toArray(), ['name', 'email', 'password']);

        $this->assertDatabaseMissing($user->getTable(), $compressedUser);

        $response = $this->postJson('/api/auth/register', $compressedUser);
        $response->assertJsonStructure([
            'data'  =>  [
                'id',
                'name',
                'email',
            ]
        ]);
        $response->assertStatus(201);

        $this->assertDatabaseHas($user->getTable(), array_except($compressedUser, ['password']));
    }
}
