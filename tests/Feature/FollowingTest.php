<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FollowingTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function userCanFollowAnother()
    {
        $user = User::factory()->create();
        $followingUser = User::factory()->create();
        $this->actingAs($user);

        $response = $this->postJson("api/users/$followingUser->id/followers") ;

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function userCantFollowHimself()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->postJson("api/users/$user->id/followers") ;

        $response->assertStatus(422);
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function userCantFollowNotExistsUser()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->postJson("api/users/5/followers") ;

        $response->assertStatus(404);
    }
}
