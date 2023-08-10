<?php

namespace App\Http\Livewire;

use App\Models\Result;
use Livewire\Component;
use Livewire\WithPagination;

class ResultsListComponent extends Component
{
    use WithPagination;

    public bool $isOpenCreate = false;
    public bool $isOpenEdit = false;
    public bool $isOpenDelete = false;

    public $perPage = 15;
    public $sortField = 'result';
    public $sortAsc = true;
    public $search = '';
    // sort by class
    public $sortPatient = 'All';

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

    public function render()
    {
        $results = Result::search($this->search)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
        return view('livewire.results-list-component', compact('results'));
    }
}
