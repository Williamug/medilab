<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminSignUpTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_signup_page_can_render_with_a_success_response(): void
    {
        $reponse = $this->get(route('admin-signup.create'));
    }
}
