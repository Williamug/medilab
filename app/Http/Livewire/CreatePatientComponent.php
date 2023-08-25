<?php

namespace App\Http\Livewire;

use App\Models\LabService;
use App\Models\LabServices;
use App\Models\NextOfKin;
use App\Models\Patient;
use App\Models\TestResult;
use App\Models\VisitInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreatePatientComponent extends Component
{
    // patient
    public $full_name;
    public $gender;
    public $birth_date = 'dob';
    public $age;
    public $dob;
    public $phone_number;
    public $email;
    public $residence;
    public $temperature;
    public $weight;
    public $height;

    // next of kin
    public $kin_full_name;
    public $kin_gender;
    public $patient_relation;
    public $kin_phone_number;
    public $kin_email;
    public $kin_residence;

    public $lab_services;
    public $lab_service_id;

    public $inputs = [];
    public $i = 1;





    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }





    

    public function render()
    {
        return view('livewire.create-patient-component');
    }
}
