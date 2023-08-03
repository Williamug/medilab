<?php

namespace App\Http\Livewire;

use App\Models\TestService;
use Livewire\Component;
use Livewire\WithPagination;

class TestServiceListComponent extends Component
{
    use WithPagination;

    public bool $isOpenCreate = false;
    public bool $isOpenEdit = false;
    public bool $isOpenDelete = false;

    public $perPage = 3;
    public $sortField = 'test_name';
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
        $test_services = TestService::search($this->search)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return view('livewire.test-service-list-component', compact('test_services'));
    }
}