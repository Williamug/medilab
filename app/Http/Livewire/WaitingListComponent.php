<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use App\Models\Spacemen;
use App\Models\TestResult;
use Livewire\Component;
use Illuminate\Support\Str;

class WaitingListComponent extends Component
{
    public bool $isOpenAddSpacemen = false;
    public $waiting_patients;
    public $test_result_id;
    public $spacemen_id;

    public $spacemens;
    public $spacemen;
    public $inputs = [];
    public $i = 1;

    // validation
    protected $rules = [
        'spacemen.0' => 'required',
        'spacemen.*' => 'required',
    ];

    protected $listeners = [
        'addSpacemen' => '$refresh',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

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

    public function mount(): void
    {
        $this->spacemens = Spacemen::all();
        $this->waiting_patients = Patient::latest()->get();
    }

    public function unique_random_string(): string
    {
        do {
            $text = Str::upper(Str::random(6));
        } while (TestResult::where('test_identity', '=', $text)->first());
        return $text;
    }

    public function openAddSpacemenModal(int $id): void
    {
        $this->test_result_id = $id;
        $this->openAddSpacemen();
    }

    public function openAddSpacemen(): void
    {
        $this->isOpenAddSpacemen = true;
    }

    public function closeAddSpacemen(): void
    {
        $this->isOpenAddSpacemen = false;
    }

    public function addSpacemen()
    {
        $this->validate();
        if ($this->test_result_id) {
            $test_result = TestResult::find($this->test_result_id);

            $spacemen = implode(',', $this->spacemen);
            $test_result->update([
                'result_status' => 'pending',
                'test_identity' => $this->unique_random_string(),
                'spacemen' => $spacemen
            ]);
        }
        $this->emitSelf('addSpacemen');
        $this->reset('spacemen');
        $this->closeAddSpacemen();
        session()->flash('success', 'Spacemen(s) added');
    }

    public function render()
    {
        return view('livewire.waiting-list-component');
    }
}
