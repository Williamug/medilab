<?php

namespace App\Http\Livewire\Laboratory;

use App\Models\Patient;
use App\Models\Spacemen;
use App\Models\TestOrder;
use App\Models\TestResult;
use Livewire\Component;
use Livewire\WithPagination;

class TestOrderComponent extends Component
{
    use WithPagination;

    public $isOpenReceiveTestOrder = false;
    public $isOpenAddSpacemen = false;

    public $patients;
    public $specimens;

    public $patient;
    public $test_order;
    public $test_order_id;
    public $patient_id;
    public $spacemen_id;

    public $inputs = [];
    public $i      = 1;

    protected $listeners = [
        'receiveOrder' => '$refresh',
    ];

    // add new field
    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    // remove the field
    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function mount(): void
    {
        $this->patients = Patient::latest()->get();
        $this->specimens = Spacemen::all();
    }

    public function openReceiveTestOrder(int $id): void
    {
        $test_order = TestOrder::where('id', $id)->first();
        $this->test_order_id   = $id;

        $this->isOpenReceiveTestOrder = true;
    }

    public function closeReceiveTestOrder(): void
    {
        $this->isOpenReceiveTestOrder = false;
    }


    public function receiveOrder(): void
    {
        if ($this->test_order_id) {
            $test_order = TestOrder::find($this->test_order_id);

            $result = $test_order->update([
                'user_id' => auth()->id(),
                'order_status' => 'received',
            ]);
            $test_order = TestOrder::find($this->test_order_id);



            TestResult::create([
                'test_order_id' => $test_order->id,
                'patient_id' => $test_order->patient->id,
            ]);

            $this->emitSelf('receiveOrder');
            toastr()->success('Test order has been received.');
            $this->closeReceiveTestOrder();
        }
    }

    public function render()
    {
        return view('livewire.laboratory.test-order-component');
    }
}
