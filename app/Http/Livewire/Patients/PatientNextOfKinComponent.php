<?php

namespace App\Http\Livewire\Patients;

use App\Models\TestOrder;
use Livewire\Component;
use Livewire\WithPagination;

class PatientNextOfKinComponent extends Component
{
    use WithPagination;

    public bool $isOpenCreate = false;

    public $lab_services;
    public $lab_service_id;
    public $patient;

    protected $listeners = [
        'store' => '$refresh',
    ];

    public function openCreateModal()
    {
        $this->isOpenCreate = true;
    }

    public function closeModal()
    {
        $this->isOpenCreate = false;
    }

    public function store(): void
    {
        $this->validate([
            'lab_service_id' => 'required',
        ], ['lab_service_id.required' => 'Lab service is required']);

        TestOrder::create([
            'user_id'        => auth()->id(),
            'patient_id'     => $this->patient->id,
            'lab_service_id' => $this->lab_service_id,
            'order_number'   => $this->order_number()
        ]);

        $this->emitSelf('store');
        $this->reset('lab_service_id');
        $this->closeModal();
    }

    public function render()
    {
        $test_orders = TestOrder::where('patient_id', $this->patient->id)->latest()->paginate(4);
        return view('livewire.patients.patient-next-of-kin-component', compact('test_orders'));
    }
}
