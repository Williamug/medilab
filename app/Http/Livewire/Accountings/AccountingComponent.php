<?php

namespace App\Http\Livewire\Accountings;

use App\Models\Patient;
use App\Models\TestOrder;
use Livewire\Component;
use Livewire\WithPagination;

class AccountingComponent extends Component
{
    use WithPagination;

    public $patients;
    public $patient;

    public function mount(): void
    {
        $this->patients = Patient::latest()->get();
        // $this->patients = Patient::query()
        //     ->join('test_orders', 'patients.id',  '=', 'test_orders.patient_id')
        //     ->orderBy('test_orders.payment_status', 'desc')
        //     ->select('patients.*')
        //     ->get();
    }

    public function render()
    {
        return view('livewire.accountings.accounting-component');
    }
}
