<?php

namespace Tests\Feature;

use App\Models\TestService;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestServicesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_services_can_be_rendered_with_success(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('test-services.index'));
        $view = $this->view('pages.test-services.index');

        $response->assertOk();
        $view->assertSeeText('Lab Service');
        // $response->assertViewHas('test_service', function ($collection) use ($test_service) {
        //     return $collection->contains($test_service);
        // });
    }

    /** @test */
    public function a_test_service_can_be_added(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post(route('test-services.store'), [
            'test_name' => 'HIV test',
            'price' => 5000,
            'user_id' => $user->id,
            'catagory_id' => 1
        ]);

        $this->assertDatabaseCount('test_services', 1);
        $response->assertRedirect(route('test-services.index'));
    }

    /** @test */
    public function test_name_is_required(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post(route('test-services.store'), [
            'test_name' => '',
            'price' => 5000,
            'user_id' => $user->id,
            'catagory_id' => 1,
        ]);

        $response->assertSessionHasErrors('test_name');
    }

    /** @test */
    public function price_is_required(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post(route('test-services.store'), [
            'test_name' => 'HIV',
            'price' => '',
            'user_id' => $user->id,
            'catagory_id' => 1,
        ]);

        $response->assertSessionHasErrors('price');
    }

    /** @test */
    public function test_service_can_be_updated(): void
    {
        $user = User::factory()->create();
        $data = $this->actingAs($user)->post(route('test-services.store'), [
            'test_name' => 'HIV test',
            'price' => 5000,
            'user_id' => $user->id,
            'catagory_id' => 1,
        ]);

        $test_service = TestService::first();

        $response = $this->actingAs($user)->put(route('test-services.update', $test_service->id), [
            'test_name' => 'Brusella',
            'price' => 10000,
            'user_id' => $user->id,
            'catagory_id' => 1,
        ]);

        $this->assertEquals('Brusella', TestService::first()->test_name);
        $this->assertEquals(10000, TestService::first()->price);
        $response->assertRedirect(route('test-services.show', $test_service->id));
    }

    /** @test */
    public function test_service_can_be_deleted(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();

        $this->actingAs($user)->post(route('test-services.store'), [
            'test_name' => 'Brusella',
            'price' => 10000,
            'user_id' => $user->id,
            'catagory_id' => 1,
        ]);
        $test_service = TestService::first();
        $response = $this->delete(route('test-services.destroy', $test_service->id));

        $this->assertDatabaseCount('test_services', 0);
        $response->assertRedirect(route('test-services.index'));
    }
}
