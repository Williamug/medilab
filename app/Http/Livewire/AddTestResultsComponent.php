<?php

namespace App\Http\Livewire;

use App\Models\ResultOption;
use App\Models\User;
use Livewire\Component;

class AddTestResultsComponent extends Component
{






    protected $listeners = [
        'addTestResult' => '$refresh',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function mount(): void
    {
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
        return view('livewire.add-test-results-component');
    }
}
