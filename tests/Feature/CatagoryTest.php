<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CatagoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_that_catagory_returns_a_successfull_response(): void
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get(route('catagories.index'));
        $view = $this->view('pages.catagories.index');

        $response->assertOk();
        $view->assertSeeText('Catagories');
    }

    /** @test */
    public function a_user_can_add_catagories(): void
    {
        $response = $this->post(route('catagories.store'), [
            'catagory_name' => 'Typhoid Test',
            'description' => 'lorem ipsum dor sit',
        ]);

        $this->assertDatabaseCount('catagories', 1);
    }

    /** @test */
    public function catagory_name_is_required(): void
    {
        $response = $this->post(route('catagories.store'), [
            'catagory_name' => '',
            'description' => 'lorem ipsum',
        ]);

        $response->assertSessionHasErrors('catagory_name');
    }
}
