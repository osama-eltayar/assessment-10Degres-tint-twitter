<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function userCanRegister()
    {
        $image = UploadedFile::fake()->create('image.jpg')->size(50) ;

        $payload = [
            'email' => 'user@user.com',
            'name' => 'osama' ,
            'password' => 'password',
            'password_confirmation' => 'password',
            'date_of_birth' => '16-12-1994',
            'image' => $image
        ] ;
        $response = $this->postJson('api/register',$payload) ;

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function userCantRegisterWithoutImage()
    {
        $payload = [
            'email' => 'user@user.com',
            'name' => 'osama' ,
            'password' => 'password',
            'password_confirmation' => 'password',
            'date_of_birth' => '16-12-1994'
        ] ;
        $response = $this->postJson('api/register',$payload) ;

        $response->assertStatus(422);
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function userCantRegisterWithImageBiggerThsn500()
    {
        $image = UploadedFile::fake()->create('image.jpg')->size(700) ;
        $payload = [
            'email' => 'user@user.com',
            'name' => 'osama' ,
            'password' => 'password',
            'password_confirmation' => 'password',
            'date_of_birth' => '16-12-1994',
            'image' => $image
        ] ;
        $response = $this->postJson('api/register',$payload) ;

        $response->assertStatus(422);
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function userCantRegisterWithExistsMail()
    {
        $user = User::factory()->create() ;
        $image = UploadedFile::fake()->create('image.jpg')->size(50) ;
        $payload = [
            'email' => $user->email,
            'name' => 'osama' ,
            'password' => 'password',
            'password_confirmation' => 'password',
            'date_of_birth' => '16-12-1994',
            'image' => $image
        ] ;
        $response = $this->postJson('api/register',$payload) ;

        $response->assertStatus(422);
    }
}
