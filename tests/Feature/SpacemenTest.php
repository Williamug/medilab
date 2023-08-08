<?php

namespace Tests\Feature;

use App\Models\Spacemen;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SpacemenTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_spacemen_page_can_be_rendered_with_success(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('spacemens.index'));
        $view = $this->view('pages.spacemens.index');

        $response->assertOk();
        $view->assertSeeText('Spacemens');
    }

    /** @test */
    public function a_spacemen_can_be_added(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post(route('spacemens.store'), [
            'spacemen' => 'blood',
            'user_id' => $user->id,
        ]);

        $this->assertDatabaseCount('spacemens', 1);
        $response->assertRedirect(route('spacemens.index'));
    }

    /** @test */
    public function spacemen_is_required(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post(route('spacemens.store'), [
            'spacemen' => '',
            'user_id' => $user->id,
        ]);

        $response->assertSessionHasErrors('spacemen');
    }

    /** @test */
    public function spacemen_can_be_updated(): void
    {
        $user = User::factory()->create();
        $data = $this->actingAs($user)->post(route('spacemens.store'), [
            'spacemen' => 'blood',
            'user_id' => $user->id,
        ]);

        $spacemen = Spacemen::first();

        $response = $this->actingAs($user)->put(route('spacemens.update', $spacemen->id), [
            'spacemen' => 'urine',
            'user_id' => $user->id,
        ]);

        $this->assertEquals('urine', Spacemen::first()->spacemen);
        $response->assertRedirect(route('spacemens.show', $spacemen->id));
    }

    /** @test */
    public function test_spacemen_can_be_deleted(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();

        $this->actingAs($user)->post(route('spacemens.store'), [
            'spacemen' => 'blood',
            'user_id' => $user->id,
        ]);
        $spacemen = Spacemen::first();
        $response = $this->delete(route('spacemens.destroy', $spacemen->id));

        $this->assertDatabaseCount('spacemens', 0);
        $response->assertRedirect(route('spacemens.index'));
    }
}
