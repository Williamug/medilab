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
        $this->patients = Patient::all();
    }
    public function render()
    {
        return view('livewire.accountings.accounting-component');
    }
}
