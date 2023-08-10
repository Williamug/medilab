<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreatePatientComponent extends Component
{
    public $patient_type;
    // adult
    public $adult_full_name;
    public $adult_gender;
    public $adult_birth_date;
    public $adult_age;
    public $adult_dob;
    public $adult_phone_number;
    public $adult_email;
    public $adult_residence;
    public $adult_temperature;
    public $adult_weight;
    public $adult_height;
    // child
    public $child_full_name;
    public $child_gender;
    public $child_birth_date;
    public $child_age;
    public $child_dob;
    public $child_phone_number;
    public $child_email;
    public $child_residence;
    public $child_temperature;
    public $child_weight;
    public $child_height;
    // guardian/next of kin
    public $guardian_full_name;
    public $guardian_gender;
    public $guardian_birth_date;
    public $guardian_age;
    public $guardian_dob;
    public $guardian_phone_number;
    public $guardian_email;
    public $guardian_residence;

    protected $rules = [
        'adult_full_name' => 'required|min:3|string',
        'adult_gender' => 'required|min:3|string',
        'adult_age' => 'numeric',
        'adult_dob' => 'date',
        'adult_phone_number' => 'numeric|min:10',
        'adult_email' => 'email',
        'adult_residence' => 'string|max:255',
        'child_full_name' => 'required|min:3|string',
        'child_gender' => 'required|min:3|string',
        'child_age' => 'numeric',
        'child_dob' => 'date',
        'guardian_full_name' => 'required|min:3|string',
        'guardian_gender' => 'required|min:3|string',
        'guardian_phone_number' => 'numeric|min:10',
        'guardian_email' => 'email',
        'guardian_residence' => 'string|max:255',

    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function storeAdultPatient()
    {
        $this->validate();
    }

    public function storeChildPatient()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.create-patient-component');
    }
}
