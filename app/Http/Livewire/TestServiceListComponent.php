<?php

namespace App\Http\Livewire;

use App\Models\Catagory;
use App\Models\TestService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class TestServiceListComponent extends Component
{
    use WithPagination;

    public bool $isOpenCreate = false;
    public bool $isOpenEdit = false;
    public bool $isOpenDelete = false;

    public $perPage = 15;
    public $sortField = 'test_name';
    public $sortAsc = true;
    public $search = '';
    // sort by class
    public $sortCategory = 'All';

    public $catagory_id;
    public $test_name;
    public $price;
    public $test_service_id;
    public $categories;

    // validation
    protected $rules = [
        'catagory_id' => 'required',
        'test_name' => 'required|string|min:1|unique:test_services',
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
        $this->reset('catagory_id', 'test_name', 'price');
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
        TestService::create([
            'user_id' => Auth::user()->id,
            'catagory_id' => $this->catagory_id,
            'test_name' => $this->test_name,
            'price' => $this->price,
        ]);

        $this->resetData();
        $this->closeModal();
    }

    public function openEditModal(int $id): void
    {
        $test_service = TestService::where('id', $id)->first();

        $this->test_service_id   = $id;
        $this->catagory_id = $test_service->catagory_id;
        $this->test_name = $test_service->test_name;
        $this->price = $test_service->price;

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
            'catagory_id' => 'required',
            'test_name' => 'required|string|min:1',
            'price' => 'required|integer',
        ]);

        if ($this->test_service_id) {
            $test_service = TestService::find($this->test_service_id);

            $test_service->update([
                'user_id' => Auth::user()->id,
                'catagory_id' => $this->catagory_id,
                'test_name' => $this->test_name,
                'price' => $this->price,
            ]);

            $this->resetData();
            $this->closeEdit();
        }

        session()->flash('success', "{$test_service->test_mame} has been updated.");
    }

    public function openDeleteModal(int $id): void
    {
        $this->test_service_id = $id;
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
        TestService::find($this->test_service_id)->delete();
        $this->closeDelete();
        session()->flash('success', 'Lab Service has been deleted.');
    }

    public function mount(): void
    {
        $this->categories = Catagory::all();
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
