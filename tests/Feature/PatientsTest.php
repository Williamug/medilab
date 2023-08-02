<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PatientsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_that_patient_returns_a_successfull_response(): void
    {
        $this->actingAs(User::factory()->create());

        $response = $this->get(route('patients.index'));
        $view = $this->view('pages.patients.index');

        $response->assertOk();
        $view->assertSeeText('Patients');
    }

    /** @test */
    public function test_that_create_page_returns_a_success_response(): void
    {
        // 
    }
}
