<?php

namespace App\Http\Livewire;

use App\Models\Spacemen;
use Livewire\Component;
use Livewire\WithPagination;

class SpacemenListComponent extends Component
{
    use WithPagination;

    public bool $isOpenCreate = false;
    public bool $isOpenEdit = false;
    public bool $isOpenDelete = false;

    public $perPage = 15;
    public $sortField = 'spacemen';
    public $sortAsc = true;
    public $search = '';
    // sort by class
    public $sortCategory = 'All';

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

    // render view to be displayed
    public function render()
    {
        // order results about on either ascending or discending order
        $spacemens = Spacemen::search($this->search)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return view('livewire.spacemen-list-component', compact('spacemens'));
    }
}
