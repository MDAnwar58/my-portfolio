<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class IsActiveMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_allows_active_user_to_access_protected_route()
    {
        $user = User::factory()->create(['is_active' => true]);

        $response = $this->actingAs($user)
            ->get('/admin/dashboard');

        $response->assertOk(); // Status 200
    }

    /** @test */
    public function it_redirects_inactive_user_to_login()
    {
        $user = User::factory()->create(['is_active' => false]);

        $response = $this->actingAs($user)
            ->get('/admin/dashboard');

        $response->assertRedirect('/login');
        $response->assertSessionHas('error', 'Your account has been deactivated. Please contact administrator.');

        // Ensure user is logged out
        $this->assertFalse(Auth::check());
    }

    /** @test */
    public function it_allows_regular_routes_without_middleware()
    {
        $response = $this->get('/');
        $response->assertOk();
    }
}
