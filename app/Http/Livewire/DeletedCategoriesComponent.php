<?php

namespace App\Http\Livewire;

use App\Models\Catagory;
use Livewire\Component;
use Livewire\WithPagination;

class DeletedCategoriesComponent extends Component
{
    use WithPagination;

    public bool $isOpenRestore = false;
    public $categories;
    public $catagory_id;

    public function openRestoreModal(int $id): void
    {
        $this->catagory_id = $id;
        $this->openRestore();
    }

    public function openRestore(): void
    {
        $this->isOpenRestore = true;
    }

    public function closeRestore(): void
    {
        $this->isOpenRestore = false;
    }

    public function restore()
    {
        Catagory::onlyTrashed()->where('id', $this->catagory_id)->restore();
        $this->closeRestore();
        session()->flash('success', "Lab service category has been restored.");
        return redirect()->to(route('catagories.index'));
    }

    public function mount()
    {
        $this->categories = Catagory::onlyTrashed()->get();
    }
    public function render()
    {
        return view('livewire.deleted-categories-component');
    }
}
