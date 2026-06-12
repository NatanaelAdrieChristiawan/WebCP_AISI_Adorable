<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminLoginTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Seed the database to ensure we have the seeded admin user
        $this->seed();
    }

    public function test_admin_can_access_login_page(): void
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
        $response->assertSee('Sign in');
    }

    public function test_admin_can_login_with_seeded_credentials(): void
    {
        // Try logging in using Livewire login action or form submission
        // Since Filament v3/v5 uses Livewire, we can test hitting the login page,
        // or we can test using standard Laravel auth authentication.
        
        $this->assertDatabaseHas('users', [
            'email' => 'admin@aisi-aiken.com',
        ]);

        $response = $this->post('/admin/login', [
            'email' => 'admin@aisi-aiken.com',
            'password' => 'password',
        ]);

        // If it's standard login redirect or Livewire request, let's see.
        // Usually, Filament uses Livewire for login. We can test raw authentication first.
        $this->assertTrue(auth()->attempt([
            'email' => 'admin@aisi-aiken.com',
            'password' => 'password',
        ]));
    }

    public function test_authenticated_admin_can_access_dashboard(): void
    {
        $admin = User::where('email', 'admin@aisi-aiken.com')->first();
        
        $response = $this->actingAs($admin)->get('/admin');
        
        // Filament might redirect or allow access. Let's see if it's 200 OK.
        $response->assertStatus(200);
    }
}
