<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function userCanLogin()
    {
        $user = User::factory()->create() ;
        $response = $this->postJson('api/login',[
            'email' => $user->email ,
            'password' => '12345678'
        ]);

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function userCantLoginWithWrongPassword()
    {
        $user = User::factory()->create() ;
        $response = $this->postJson('api/login',[
            'email' => $user->email ,
            'password' => '123456789'
        ]);

        $response->assertStatus(422);
    }
}
