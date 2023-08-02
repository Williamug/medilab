<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class CatagoriesList extends Component
{
    use WithPagination;

    public bool $isOpenCreate = false;
    public bool $isOpenEdit = false;
    public bool $isOpenDelete = false;

    public $perPage = 3;
    public $sortField = 'title';
    public $sortAsc = true;
    public $search = '';
    // sort by class
    public $sortClass = 'All';

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function openCreateModal(): void
    {
        $this->openCreate();
    }

    public function openCreate(): void
    {
        $this->isOpenCreate = true;
    }

    public function closeCreate(): void
    {
        $this->isOpenCreate = false;
    }

    public function clearForm(): void
    {
        // $this->reset('exam_name', 'duration', 'exam_code', 'staff_id', 'class_room_id');
    }
    public function render()
    {
        return view('livewire.catagories-list');
    }
}
