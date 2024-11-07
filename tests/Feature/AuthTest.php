<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function login_page_displays_correctly()
    {
        // Test if the login page is accessible
        $response = $this->get(route('login'));

        // Assert that the page loads successfully
        $response->assertStatus(200);

        // Check if the page contains the form elements
        $response->assertSee('Login')
                 ->assertSee('Your email')
                 ->assertSee('Password')
                 ->assertSee('name@company.com')
                 ->assertSee('••••••••');
    }

    /** @test */
    public function user_can_login_with_valid_credentials()
    {
        // Create a role for the test user
        $role = Role::create([
            'permission_array' => json_encode(['view_dashboard']),
        ]);

        // Create a test user with the created role
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'), // Ensure password is hashed
            'role_id' => $role->id,
        ]);

        // Submit the login form with correct credentials
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        // Assert that the user was redirected to the intended page
        $response->assertRedirect('/dashboard'); // Adjust route as necessary
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function login_fails_with_invalid_credentials()
    {
        // Create a role for the test user
        $role = Role::create([
            'permission_array' => json_encode(['view_dashboard']),
        ]);

        // Create a test user with the created role
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'), // Ensure password is hashed
            'role_id' => $role->id,
        ]);

        // Attempt login with an incorrect password
        $response = $this->from(route('login'))->post('/login', [
            'email' => 'test@example.com',
            'password' => 'wrongpassword',
        ]);

        // Assert redirection back to login page with error message
        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors();

        // Verify the user is not authenticated
        $this->assertGuest();
    }
}