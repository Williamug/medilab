<?php

namespace App\Http\Livewire;

use App\Models\Spacemen;
use Illuminate\Support\Facades\Auth;
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

    public $spacemen;
    public $spacemen_id;

    // validation
    protected $rules = [
        'spacemen' => 'required|string|unique:spacemens',
    ];

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

    public function resetData()
    {
        $this->reset('spacemen');
    }

    public function openCreateModal()
    {
        $this->isOpenCreate = true;
    }

    public function closeModal()
    {
        $this->resetData();
        $this->isOpenCreate = false;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();
        Spacemen::create([
            'user_id' => Auth::user()->id,
            'spacemen' => $this->spacemen,
        ]);

        $this->resetData();
        $this->closeModal();
    }

    public function openEditModal(int $id): void
    {
        $spacemen = Spacemen::where('id', $id)->first();

        $this->spacemen_id   = $id;
        $this->spacemen = $spacemen->spacemen;

        $this->openEdit();
    }

    public function openEdit(): void
    {
        $this->isOpenEdit = true;
    }

    public function closeEdit(): void
    {
        $this->resetData();
        $this->isOpenEdit = false;
    }

    public function update(): void
    {
        $this->validate([
            'spacemen' => 'required|string',
        ]);

        if ($this->spacemen_id) {
            $spacemen = Spacemen::find($this->spacemen_id);

            $spacemen->update([
                'user_id' => Auth::user()->id,
                'spacemen' => $this->spacemen,
            ]);

            $this->resetData();
            $this->closeEdit();
        }

        session()->flash('success', "{$spacemen->spacemen} has been updated.");
    }

    public function openDeleteModal(int $id): void
    {
        $this->spacemen_id = $id;
        $this->openDelete();
    }

    public function openDelete(): void
    {
        $this->isOpenDelete = true;
    }

    public function closeDelete(): void
    {
        $this->isOpenDelete = false;
    }

    public function delete(): void
    {
        Spacemen::find($this->spacemen_id)->delete();
        $this->closeDelete();
        session()->flash('success', 'Lab Service has been deleted.');
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
