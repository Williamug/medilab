<?php

namespace App\Http\Livewire\Patients;

use App\Models\LabService;
use App\Models\Patient;
use App\Models\PatientVisit;
use App\Models\TestOrder;
use App\Rules\LabServiceRule;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Arr;

class CreatePatientComponent extends Component
{
    public Collection $lab_services;

    // patient
    public $full_name;

    public $gender;
    public $weeks;
    public $months;
    public $years;

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

    public $selectedBirthDate = NULL;
    public $selectedPeriod = NULL;

    public $lab_service_id;

    // collection
    public $birth_dates;
    public $periods;

    public $inputs = [];
    public $i      = 1;


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
        $this->birth_dates =  collect(['Date of birth', 'Age']);

        $this->periods = collect(['weeks', 'months', 'years']);

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
        // dd($this->lab_service_id);
        // dd(in_array(2, $this->lab_service_id));
        $this->validate([
            // patient
            // 'lab_service_id' =>
            // [
            //     function ($attribute, $value, $fail) {
            //         if (!in_array($value, $this->lab_service_id)) {
            //             $fail('Lab service must be unique.');
            //         }
            //     },
            // ],
            'selectedBirthDate' => 'required',
            'full_name'         => 'required|min:3|string',
            'gender'            => 'required|min:3|string',
            'date_of_birth'     => 'sometimes|nullable|date',
            'phone_number'      => 'numeric|min:10',
            'email'             => 'sometimes|nullable|email',
            'residence'         => 'string|max:255',

            // patient visit
            'temperature'      => 'sometimes|nullable|numeric',
            'weight'           => 'sometimes|nullable|numeric',
            'height'           => 'sometimes|nullable|numeric',
            'kin_full_name'    => 'sometimes|nullable|min:3|string',
            'kin_gender'       => 'sometimes|nullable|min:3|string',
            'kin_phone_number' => 'sometimes|nullable|numeric|min:10',
            'kin_residence'    => 'sometimes|nullable|string|max:255',
        ], ['selectedBirthDate.required' => 'This field can not be empty. Select date of birth or age']);

        DB::transaction(function () {

            $patient = Patient::create([
                'user_id'        => auth()->id(),
                'patient_number' => $this->patient_number(),
                'full_name'      => $this->full_name,
                'gender'         => $this->gender,
                'phone_number'   => $this->phone_number,
                'email'          => $this->email,
                'residence'      => $this->residence,
            ]);

            $patient_visit = PatientVisit::create([
                'user_id'          => auth()->id(),
                'patient_id'       => $patient->id,
                // 'patient_age'      => $this->age,
                'temperature'      => $this->temperature,
                'weight'           => $this->weight,
                'height'           => $this->height,
                'kin_full_name'    => $this->kin_full_name,
                'kin_gender'       => $this->kin_gender,
                'kin_phone_number' => $this->kin_phone_number,
                'patient_relation' => $this->patient_relation,
                'kin_residence'    => $this->kin_residence,
            ]);

            foreach ($this->lab_service_id as $key => $value) {
                TestOrder::create([
                    'user_id'        => auth()->id(),
                    'patient_id'     => $patient->id,
                    'lab_service_id' => $this->lab_service_id[$key],
                    'order_number'   => $this->order_number()
                ]);

                // if ($this->date_of_birth !== null && $this->age === null) {
                //     $patient->update([
                //         'date_of_birth' => $this->date_of_birth,
                //     ]);
                // } elseif ($this->date_of_birth === null && $this->age !== null) {
                //     $patient_visit->update([
                //         'patient_age' => $this->age,
                //     ]);
                // }
            }
        });
        return redirect()->to(route('patients.index'));
    }

    public function render()
    {
        return view('livewire.patients.create-patient-component');
    }
}
