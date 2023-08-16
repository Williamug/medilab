<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use App\Models\ResultOption;
use App\Models\Spacemen;
use App\Models\TestResult;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class WaitingListComponent extends Component
{
    public bool $isOpenAddSpacemen = false;
    public bool $isOpenAddTestResult = false;

    public $waiting_patients;
    public $test_result_id;
    public $spacemen_id;
    public $result_option_id;
    public $lab_technician_id;
    public $comment;
    public $spacemens;
    public $spacemen;
    public $result_options;
    public $users;
    public $role;

    public $inputs = [];
    public $i = 1;

    // validation
    protected $rules = [
        'spacemen.0' => 'required',
        'spacemen.*' => 'required',
    ];

    protected $listeners = [
        'addSpacemen' => '$refresh',
        'addTestResult' => '$refresh',
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
        $this->result_options = ResultOption::all();
        $this->users = User::all();
        $this->role = Role::where('name', 'Lab Attendant ')->first();
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

    public function addTestResultModal($id): void
    {
        $this->test_result_id = $id;
        $this->openAddTestResult();
    }

    public function openAddTestResult(): void
    {
        $this->isOpenAddTestResult = true;
    }

    public function openCloseTestResult(): void
    {
        $this->isOpenAddTestResult = false;
    }

    public function addTestResult()
    {
        $this->validate([
            'result_option_id' => 'required',
            'lab_technician_id' => 'required',
        ], [
            'result_option_id.required' => 'Result option is required.',
            'lab_technician_id.required' => 'Lab technician is required.'
        ]);

        if ($this->test_result_id) {
            $test_result = TestResult::find($this->test_result_id);

            $test_result->update([
                'result_option_id' => $this->result_option_id,
                'lab_technician_id' => $this->lab_technician_id,
                'comment' => $this->comment
            ]);
        }
        $this->emitSelf('addTestResult');
        $this->reset('result_option_id', 'lab_technician_id', 'comment');
        $this->openCloseTestResult();
        session()->flash('success', 'Results have been added.');
    }

    public function render()
    {
        return view('livewire.waiting-list-component');
    }
}
