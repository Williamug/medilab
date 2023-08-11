<?php

namespace App\Http\Livewire;

use App\Models\Catagory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CatagoriesList extends Component
{
    use WithPagination;

    public bool $isOpenCreate = false;
    public bool $isOpenEdit = false;
    public bool $isOpenDelete = false;

    public $perPage = 15;
    public $sortField = 'catagory_name';
    public $sortAsc = true;
    public $search = '';
    // sort by class
    public $sortCategory = 'All';

    public $catagory_id;
    public $catagory_name;
    public $description;

    protected $rules = [
        'catagory_name' => 'required|string|unique:catagories|min:2',
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

    public function openCreateModal()
    {
        $this->isOpenCreate = true;
    }

    public function closeModal()
    {
        $this->reset('catagory_name', 'description');
        $this->isOpenCreate = false;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function storePatient()
    {
        $this->validate();
        Catagory::create([
            'user_id' => Auth::user()->id,
            'catagory_name' => $this->catagory_name,
            'description' => $this->description,
        ]);

        $this->closeModal();
        $this->reset('catagory_name', 'description');
    }

    public function openEditModal(int $id): void
    {
        $catagory = Catagory::where('id', $id)->first();

        $this->catagory_id   = $id;
        $this->catagory_name = $catagory->catagory_name;
        $this->description = $catagory->description;

        $this->openEdit();
    }

    public function openEdit(): void
    {
        $this->isOpenEdit = true;
    }

    public function closeEdit(): void
    {
        $this->reset('catagory_name', 'description');
        $this->isOpenEdit = false;
    }

    public function updatePatient(): void
    {
        $this->validate([
            'catagory_name' => 'sometimes|required|string|min:2',
        ]);

        if ($this->catagory_id) {
            $catagory = Catagory::find($this->catagory_id);

            $catagory->update([
                'user_id' => Auth::user()->id,
                'catagory_name' => $this->catagory_name,
                'description' => $this->description
            ]);

            $this->reset('catagory_name', 'description');
            $this->closeEdit();
        }

        session()->flash('success', "{$catagory->catagory_name} has been updated.");
    }

    public function openDeleteModal(int $id): void
    {
        $this->catagory_id = $id;
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
        Catagory::find($this->catagory_id)->delete();
        $this->closeDelete();
        session()->flash('success', 'Category deleted.');
    }

    // render view to be displayed
    public function render()
    {
        // order results about on either ascending or discending order
        $categories = Catagory::search($this->search)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return view('livewire.catagories-list', compact('categories'));
    }
}
