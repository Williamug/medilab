<?php

namespace Tests\Feature;

use App\Models\Patient;
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
    public function test_that_a_user_can_add_a_patients_record(): void
    {
        // $this->withoutExceptionHandling();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('patients.store'), [
            'full_name' => 'Allan Muntu',
            'phone_number' => '0700000123',
            'gender' => 'male',
            'birth_date' => '1/1/1990',
            'residence' => 'kyanja',
        ]);

        $this->assertDatabaseCount('patients', 1);
        $response->assertRedirect(route('patients.index'));
    }

    /** @test */
    public function full_name_is_required(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post(route('patients.store'), [
            'full_name' => '',
            'phone_number' => '0700000123',
            'gender' => 'male',
            'birth_date' => '1/1/1990',
            'residence' => 'kyanja',
        ]);

        $response->assertSessionHasErrors('full_name');
    }

    /** @test */
    public function gender_is_required(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post(route('patients.store'), [
            'full_name' => 'Allan Muntu',
            'phone_number' => '0700000123',
            'gender' => '',
            'birth_date' => '1/1/1990',
            'residence' => 'kyanja',
        ]);

        $response->assertSessionHasErrors('gender');
    }

    /** @test */
    public function patient_info_can_be_updated(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user)->post(route('patients.store'), [
            'full_name' => 'Allan Muntu',
            'phone_number' => '0700000123',
            'gender' => 'male',
            'birth_date' => '1/1/1990',
            'resident' => 'Kyanja',
        ]);

        $patient = Patient::first();

        $response = $this->actingAs($user)->put(route('patients.update', $patient->id), [
            'full_name' => 'Allan Muntu Junior',
            'phone_number' => '',
            'gender' => 'male',
            'birth_date' => '1/1/1990',
            'residence' => 'kasangati',
        ]);

        $this->assertEquals('Allan Muntu Junior', Patient::first()->full_name);
        $this->assertEquals('kasangati', Patient::first()->residence);
        $response->assertRedirect(route('patients.update', $patient->id));
    }

    /** @test */
    public function patient_can_be_deleted(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();

        $this->actingAs($user)->post(route('patients.store'), [
            'full_name' => 'Allan Muntu',
            'phone_number' => '0700000123',
            'gender' => 'male',
            'birth_date' => '1/1/1990',
            'resident' => 'Kyanja',
        ]);
        $patient = Patient::first();
        $response = $this->delete(route('patients.destroy', $patient->id));

        $this->assertDatabaseCount('patients', 0);
        $response->assertRedirect(route('patients.index'));
    }
}
