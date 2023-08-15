<?php

namespace App\Http\Livewire;

use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ServiceCategoryListComponent extends Component
{
    use WithPagination;

    public bool $isOpenCreate = false;
    public bool $isOpenEdit = false;
    public bool $isOpenDelete = false;

    public $perPage = 15;
    public $sortField = 'category_name';
    public $sortAsc = true;
    public $search = '';
    // sort by class
    public $sortCategory = 'All';

    public $service_category_id;
    public $category_name;
    public $description;

    protected $rules = [
        'category_name' => 'required|string|unique:service_categories|min:2',
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
        $this->reset('category_name', 'description');
        $this->isOpenCreate = false;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();
        ServiceCategory::create([
            'user_id' => Auth::user()->id,
            'category_name' => $this->category_name,
            'description' => $this->description,
        ]);

        $this->closeModal();
        $this->reset('category_name', 'description');
    }

    public function openEditModal(int $id): void
    {
        $service_category = ServiceCategory::where('id', $id)->first();

        $this->service_category_id   = $id;
        $this->category_name = $service_category->category_name;
        $this->description = $service_category->description;

        $this->openEdit();
    }

    public function openEdit(): void
    {
        $this->isOpenEdit = true;
    }

    public function closeEdit(): void
    {
        $this->reset('category_name', 'description');
        $this->isOpenEdit = false;
    }

    public function updatePatient(): void
    {
        $this->validate([
            'category_name' => 'sometimes|required|string|min:2',
        ]);

        if ($this->service_category_id) {
            $service_category = ServiceCategory::find($this->service_category_id);

            $service_category->update([
                'user_id' => Auth::user()->id,
                'category_name' => $this->category_name,
                'description' => $this->description
            ]);

            $this->reset('category_name', 'description');
            $this->closeEdit();
        }

        session()->flash('success', "{$service_category->category_name} has been updated.");
    }

    public function openDeleteModal(int $id): void
    {
        $this->service_category_id = $id;
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
        $service_category = ServiceCategory::find($this->service_category_id)->delete();
        $this->closeDelete();
        session()->flash('success', "Category has been deleted.");
    }

    // render view to be displayed
    public function render()
    {
        // order results about on either ascending or discending order
        $service_categories = ServiceCategory::search($this->search)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return view('livewire.service-category-list-component', compact('service_categories'));
    }
}
