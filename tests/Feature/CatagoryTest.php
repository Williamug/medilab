<?php

namespace Tests\Feature;

use App\Models\Catagory;
use App\Models\User;
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

        $response->assertStatus(200);
        $view->assertSeeText('Catagories');
    }

    /** @test */
    public function a_user_can_add_catagories(): void
    {
        $this->actingAs(User::factory()->create());
        $response = $this->post(route('catagories.store'), [
            'catagory_name' => 'Typhoid Test',
            'description' => 'lorem ipsum dor sit',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseCount('catagories', 1);
        $response->assertRedirect(route('catagories.index'));
    }

    /** @test */
    public function catagory_name_is_required(): void
    {
        $this->actingAs(User::factory()->create());
        $response = $this->post(route('catagories.store'), [
            'catagory_name' => '',
            'description' => 'lorem ipsum',
        ]);

        $response->assertSessionHasErrors('catagory_name');
    }

    /** @test */
    public function a_user_can_delete_record(): void
    {
        $this->withoutExceptionHandling();
        $this->actingAs(User::factory()->create());
        $this->post(route('catagories.store'), [
            'catagory_name' => 'Typhoid',
            'description' => 'lorem ipsum',
        ]);

        $category = Catagory::first();
        $response = $this->delete(route('catagories.destroy', $category->id));

        $this->assertDatabaseCount('catagories', 0);
        $response->assertStatus(302);
        $response->assertRedirect(route('catagories.index'));
    }
}
