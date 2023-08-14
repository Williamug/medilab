<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use App\Models\TestResult;
use Livewire\Component;

class WaitingListComponent extends Component
{
    public bool $isOpenReceive = false;
    public $waiting_patients;
    public $patient_id;

    public function mount(): void
    {
        $this->waiting_patients = Patient::all();
    }

    public function openReceiveModal(int $id): void
    {
        $this->patient_id = $id;
        $this->openReceive();
    }

    public function openReceive(): void
    {
        $this->isOpenReceive = true;
    }

    public function closeReceive(): void
    {
        $this->isOpenReceive = false;
    }

    public function receivePatient(): void
    {
        if ($this->patient_id) {
            $test_result = TestResult::find($this->patient_id);
            $test_result->update([
                'result_status' => 'invite',
            ]);
            $this->closeReceive();
        }
        session()->flash('success', 'Patient invited');
    }

    public function render()
    {
        return view('livewire.waiting-list-component');
    }
}
