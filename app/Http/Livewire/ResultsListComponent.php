<?php

namespace App\Http\Livewire;

use App\Models\Result;
use Illuminate\Support\Facades\Auth;
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

    public $result;
    public $code;
    public $symbol;
    public $result_id;

    // validation
    protected $rules = [
        'result' => 'required|string|unique:results',
        'code' => 'required|string',
        'symbol' => 'required|string',
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
        $this->reset('result', 'code', 'symbol');
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
        Result::create([
            'user_id' => Auth::user()->id,
            'result' => $this->result,
            'code' => $this->code,
            'symbol' => $this->symbol,
        ]);

        $this->resetData();
        $this->closeModal();
    }

    public function openEditModal(int $id): void
    {
        $result = Result::where('id', $id)->first();

        $this->result_id   = $id;
        $this->result = $result->result;
        $this->code = $result->code;
        $this->symbol = $result->symbol;

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
            'result' => 'required|string|unique:results',
            'code' => 'required|string',
            'symbol' => 'required|string',
        ]);

        if ($this->result_id) {
            $result = Result::find($this->result_id);

            $result->update([
                'user_id' => Auth::user()->id,
                'result' => $this->result,
                'code' => $this->code,
                'symbol' => $this->symbol,
            ]);

            $this->resetData();
            $this->closeEdit();
        }

        session()->flash('success', "{$result->result} has been updated.");
    }

    public function openDeleteModal(int $id): void
    {
        $this->result_id = $id;
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
        Result::find($this->result_id)->delete();
        $this->closeDelete();
        session()->flash('success', 'Result Option has been deleted.');
    }

    public function render()
    {
        $results = Result::search($this->search)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
        return view('livewire.results-list-component', compact('results'));
    }
}
