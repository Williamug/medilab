<?php

namespace App\Http\Livewire\Patients;

use App\Models\LabService;
use App\Models\Patient;
use App\Models\PatientVisit;
use App\Models\TestOrder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CreatePatientComponent extends Component
{
    public Collection $lab_services;

    // patient
    public $full_name;
    public $gender;
    public $birth_date = 'dob';
    public $age;
    public $date_of_birth;
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
    // public $kin_email;
    public $kin_residence;

    public $lab_service_id;

    public $inputs = [];
    public $i      = 1;

    protected $rules = [
        // patient
        'full_name'     => 'required|min:3|string',
        'gender'        => 'required|min:3|string',
        'date_of_birth' => 'sometimes|nullable|date',
        'phone_number'  => 'numeric|min:10',
        'email'         => 'sometimes|nullable|email',
        'residence'     => 'string|max:255',

        // patient visit
        'age'              => 'sometimes|nullable|numeric',
        'temperature'      => 'sometimes|nullable|numeric',
        'weight'           => 'sometimes|nullable|numeric',
        'height'           => 'sometimes|nullable|numeric',
        'kin_full_name'    => 'sometimes|nullable|min:3|string',
        'kin_gender'       => 'sometimes|nullable|min:3|string',
        'kin_phone_number' => 'sometimes|nullable|numeric|min:10',
        'kin_residence'    => 'sometimes|nullable|string|max:255',
        // 'kin_email' => 'sometimes|nullable|email',
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

    public function mount()
    {
        $this->lab_services = LabService::all();
    }

    public function patient_number(): int
    {
        do {
            $number = random_int(100000, 999999);
        } while (Patient::where('patient_number', '=', $number)->first());
        return $number;
    }

    public function order_number(): int
    {
        do {
            $number = random_int(100000, 999999);
        } while (TestOrder::where('order_number', '=', $number)->first());
        return $number;
    }

    public function storePatient()
    {
        $this->validate();

        $patient = Patient::create([
            'user_id'        => auth()->id(),
            'patient_number' => $this->patient_number(),
            'full_name'      => $this->full_name,
            'gender'         => $this->gender,
            'date_of_birth'  => $this->date_of_birth,
            'age'            => $this->age,
            'phone_number'   => $this->phone_number,
            'email'          => $this->email,
            'residence'      => $this->residence,
        ]);

        PatientVisit::create([
            'user_id'          => auth()->id(),
            'patient_id'       => $patient->id,
            'patient_age'      => $this->age,
            'temperature'      => $this->temperature,
            'weight'           => $this->weight,
            'height'           => $this->height,
            'kin_full_name'    => $this->kin_full_name,
            'kin_gender'       => $this->kin_gender,
            'kin_phone_number' => $this->kin_phone_number,
            'kin_residence'    => $this->kin_residence,
        ]);

        foreach ($this->lab_service_id as $key => $value) {
            TestOrder::create([
                'user_id'        => auth()->id(),
                'patient_id'     => $patient->id,
                'lab_service_id' => $this->lab_service_id[$key],
                'order_number'   => $this->order_number()
            ]);
        }

        return redirect()->to(route('patients.index'));
    }

    public function render()
    {
        return view('livewire.patients.create-patient-component');
    }
}
