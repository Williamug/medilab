<?php

namespace App\Http\Livewire;

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

    protected $rules = [
        'full_name' => 'required|min:3|string',
        'gender' => 'required|min:3|string',
        'age' => 'sometimes|nullable|numeric',
        'dob' => 'sometimes|nullable|date',
        'phone_number' => 'numeric|min:10',
        'email' => 'email',
        'residence' => 'string|max:255',
        'kin_full_name' => 'sometimes|nullable|min:3|string',
        'kin_gender' => 'sometimes|nullable|min:3|string',
        'kin_phone_number' => 'sometimes|nullable|numeric|min:10',
        'kin_email' => 'sometimes|nullable|email',
        'kin_residence' => 'sometimes|nullable|string|max:255',
    ];

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->lab_services = LabServices::all();
    }

    public function unique_registration_number(): int
    {
        do {
            $number = random_int(100000, 999999);
        } while (Patient::where('registration_number', '=', $number)->first());
        return $number;
    }

    public function storePatient()
    {
        $this->validate();
        if (!is_null($this->kin_full_name)) {
            $next_of_kin = NextOfKin::create([
                'user_id' => Auth::user()->id,
                'name' => $this->kin_full_name,
                'gender' => $this->kin_gender,
                'phone_number' => $this->kin_phone_number,
                'email' => $this->kin_email,
                'residence' => $this->kin_residence,
                'relationship_to_patient' => $this->patient_relation,
            ]);

            $patient = Patient::create([
                'user_id' => Auth::user()->id,
                'next_of_kin_id' => $next_of_kin->id,
                'registration_number' => $this->unique_registration_number(),
                'full_name' => $this->full_name,
                'gender' => $this->gender,
                'date_of_birth' => $this->dob,
                'age' => $this->age,
                'phone_number' => $this->phone_number,
                'email' => $this->email,
                'residence' => $this->residence,
            ]);

            VisitInfo::create([
                'user_id' => Auth::user()->id,
                'patient_id' => $patient->id,
                'temperature' => $this->temperature,
                'weight' => $this->weight,
                'height' => $this->height,
            ]);

            foreach ($this->lab_service_id as $key => $value) {
                TestResult::create([
                    'user_id' => Auth::user()->id,
                    'patient_id' => $patient->id,
                    'lab_service_id' => $this->lab_service_id[$key]
                ]);
            }
        } else {
            $patient = Patient::create([
                'user_id' => Auth::user()->id,
                'registration_number' => $this->unique_registration_number(),
                'full_name' => $this->full_name,
                'gender' => $this->gender,
                'date_of_birth' => $this->dob,
                'age' => $this->age,
                'phone_number' => $this->phone_number,
                'email' => $this->email,
                'residence' => $this->residence,
            ]);

            VisitInfo::create([
                'user_id' => Auth::user()->id,
                'patient_id' => $patient->id,
                'temperature' => $this->temperature,
                'weight' => $this->weight,
                'height' => $this->height,
            ]);

            foreach ($this->lab_service_id as $key => $value) {
                TestResult::create([
                    'user_id' => Auth::user()->id,
                    'patient_id' => $patient->id,
                    'lab_service_id' => $this->lab_service_id[$key]
                ]);
            }
        }

        return redirect()->to(route('patients.index'));
    }

    public function render()
    {
        return view('livewire.create-patient-component');
    }
}
