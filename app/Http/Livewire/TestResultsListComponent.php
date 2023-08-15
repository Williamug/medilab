<?php

namespace App\Http\Livewire;

use App\Models\TestRequst;
use App\Models\TestResult;
use Livewire\Component;
use Livewire\WithPagination;

class TestResultsListComponent extends Component
{
    use WithPagination;

    public bool $isOpenCreate = false;
    public bool $isOpenEdit = false;
    public bool $isOpenDelete = false;

    public $perPage = 15;
    public $sortField = 'patient_id';
    public $sortAsc = true;
    public $search = '';
    // sort by class
    public $sortCategory = 'All';

    public $test_results;

    // sort results based on either ascend or discend
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function mount(): void
    {
        $this->test_results = TestResult::all();
    }

    // render view to be displayed
    public function render()
    {
        return view('livewire.test-results-list-component');
    }
}
