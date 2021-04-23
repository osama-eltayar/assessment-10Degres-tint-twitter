<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TweetTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function userCanTweet()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $payload = [
            'content' => 'test tweet',

        ] ;
        $response = $this->postJson('api/tweets',$payload) ;

        $response->assertJson(['data' => [
            'content' => 'test tweet'
        ]]);
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function userCantTweetWithoutContent()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $payload = [] ;
        $response = $this->postJson('api/tweets',$payload) ;

        $response->assertStatus(422);
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function userCantTweetWithMoreThan140Character()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $payload = [
            'content' => 'testdasdasdsafsafdsgdsgdfgdfghdfhfhfghfgfsdfdsfdffds
             sdfdsfdsftweetssssssssdsfdsgdfgfghsfgjgjhgjhkjhlkjlfgdfgdfsgdsgdfgfdgdfggfdgsdfgdfgdfsfdhfhfhfdghfghfghdfhfghfghfh',

        ] ;
        $response = $this->postJson('api/tweets',$payload) ;

        $response->assertStatus(422);
    }

}
