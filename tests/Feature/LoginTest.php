<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function it_visit_page_of_login()
    {
        $this->get('/login')
        ->assertStatus(200)
        ->assertSee('Login');
    }

     /** @test */
     public function authenticated_to_a_user()
     {
         $user = User::create([
             "dni" => "41306304",
             "name" => "Gustavo",
             "email" => "simondossantos18@mail.com",
             "password" => "Gustavo123",
         ]);

         $this->get('/login')->assertSee('Login');
         $credentials = [
             "dni" => "41306304",
             "password" => "Gustavo123"
         ];

         $response = $this->post('/login', $credentials);
         $response->assertRedirect('/home');
         $this->assertCredentials($credentials);
     }

    //  /** @test */
    //  public function not_authenticate_to_a_user_with_credentials_invalid()
    //  {
    //      $user = User::create('App\Models\User', [
    //          "email" => "user@mail.com"
    //      ]);
    //      $credentials = [
    //          "email" => "users@mail.com",
    //          "password" => "secret"
    //      ];

    //      $this->assertInvalidCredentials($credentials);
    //  }

    //  /** @test */
    //  public function the_email_is_required_for_authenticate()
    //  {
    //      $user = User::create('App\Models\User');
    //      $credentials = [
    //          "email" => null,
    //          "password" => "secret"
    //      ];

    //      $response = $this->from('/login')->post('/login', $credentials);
    //      $response->assertRedirect('/login')->assertSessionHasErrors([
    //          'email' => 'The email field is required.',
    //      ]);
    //  }

    //  /** @test */
    //  public function the_password_is_required_for_authenticate()
    //  {
    //      $user = User::create('App\Models\User', ['email' => 'zaratedev@gmail.com']);
    //      $credentials = [
    //          "email" => "zaratedev@gmail.com",
    //          "password" => null
    //      ];

    //      $response = $this->from('/login')->post('/login', $credentials);
    //      $response->assertRedirect('/login')
    //          ->assertSessionHasErrors([
    //              'password' => 'The password field is required.',
    //          ]);
    //  }
}
