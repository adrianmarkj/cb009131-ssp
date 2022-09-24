<?php

namespace Tests\Unit;

use Tests\TestCase;

class RouteTest extends TestCase
{
    public function test_system_displays_login_form()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_system_displays_register_form()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    public function test_system_displays_home_page()
    {
        $response = $this->get('/home');
        $response->assertStatus(200);
    }

    public function test_system_displays_archive_page()
    {
        $response = $this->get('/archive');
        $response->assertStatus(200);
    }

    public function test_system_prevents_user_from_accessing_nonexistent_page()
    {
        $response = $this->get('/yellow');
        $response->assertStatus(404);
    }

    public function test_system_prevents_user_from_accessing_admin_page()
    {
        $response = $this->get('/admin/users');
        $response->assertStatus(302);
    }
}
