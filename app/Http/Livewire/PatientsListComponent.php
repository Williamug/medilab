<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class PatientsListComponent extends Component
{
    use WithPagination;

    public bool $isOpenCreate = false;
    public bool $isOpenEdit = false;
    public bool $isOpenDelete = false;

    public $perPage = 3;
    public $sortField = 'catagory_name';
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
        return view('livewire.patients-list-component');
    }
}
