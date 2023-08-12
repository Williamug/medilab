<?php

namespace App\Http\Livewire;

use App\Models\TestService;
use Livewire\Component;

class DeletedTestServices extends Component
{
    public bool $isOpenRestore = false;
    public $test_services;
    public $test_service_id;

    public function openRestoreModal(int $id): void
    {
        $this->test_service_id = $id;
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
        TestService::onlyTrashed()->where('id', $this->test_service_id)->restore();
        $this->closeRestore();
        session()->flash('success', "Lab service has been restored.");
        return redirect()->to(route('test-services.index'));
    }

    public function mount()
    {
        $this->test_services = TestService::onlyTrashed()->get();
    }
    public function render()
    {
        return view('livewire.deleted-test-services');
    }
}
