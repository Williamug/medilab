<?php

namespace App\Http\Livewire;

use App\Models\LabServices;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class LabServiceListComponent extends Component
{
    use WithPagination;

    public bool $isOpenCreate = false;
    public bool $isOpenEdit = false;
    public bool $isOpenDelete = false;

    public $perPage = 15;
    public $sortField = 'service_name';
    public $sortAsc = true;
    public $search = '';
    // sort by class
    public $sortCategory = 'All';

    public $service_category_id;
    public $service_name;
    public $price;
    public $lab_service_id;
    public $categories;

    // validation
    protected $rules = [
        'service_category_id' => 'required',
        'service_name' => 'required|string|min:1|unique:lab_services',
        'price' => 'required|numeric',
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
        $this->reset('service_category_id', 'service_name', 'price');
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
        LabServices::create([
            'user_id' => Auth::user()->id,
            'service_category_id' => $this->service_category_id,
            'service_name' => $this->service_name,
            'price' => $this->price,
        ]);

        $this->resetData();
        $this->closeModal();
    }

    public function openEditModal(int $id): void
    {
        $lab_service = LabServices::where('id', $id)->first();

        $this->lab_service_id   = $id;
        $this->service_category_id = $lab_service->service_category_id;
        $this->service_name = $lab_service->service_name;
        $this->price = $lab_service->price;

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
            'service_category_id' => 'required',
            'service_name' => 'required|string|min:1',
            'price' => 'required|integer',
        ]);

        if ($this->lab_service_id) {
            $lab_service = LabServices::find($this->lab_service_id);

            $lab_service->update([
                'user_id' => Auth::user()->id,
                'service_category_id' => $this->service_category_id,
                'service_name' => $this->service_name,
                'price' => $this->price,
            ]);

            $this->resetData();
            $this->closeEdit();
        }

        session()->flash('success', "{$lab_service->service_name} has been updated.");
    }

    public function openDeleteModal(int $id): void
    {
        $this->lab_service_id = $id;
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
        LabServices::find($this->lab_service_id)->delete();
        $this->closeDelete();
        session()->flash('success', 'Lab Service has been deleted.');
    }

    public function mount(): void
    {
        $this->categories = ServiceCategory::all();
    }

    public function render()
    {
        // order results about on either ascending or discending order
        $lab_services = LabServices::search($this->search)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return view('livewire.lab-service-list-component', compact('lab_services'));
    }
}
