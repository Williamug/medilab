<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SampleResultTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_that_sample_result_returns_a_success_response(): void
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('sample-results.index'));
        $view = $this->view('pages.sample-results.index');

        $response->assertOk();
        $view->assertSeeText('Results from the sample taken');
    }
}
