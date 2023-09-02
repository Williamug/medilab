<?php

namespace App\Http\Livewire\Accountings;

use App\Models\Patient;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\PaymentServiceProvider;
use App\Models\TestOrder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\ValidationException;

class AccountingComponent extends Component
{
    use WithPagination;

    public Collection $patients;
    public Collection $payment_methods;
    public $payment_service_providers;

    public $selectedPaymentMethod       = NULL;
    public $payment_service_provider_id = '';
    public $paymentAmount;
    // public $new_balance;

    public $patient;
    public $patient_id;
    public $amount_due;

    public bool $isOpenPayBill = FALSE;

    // event listeners
    protected $listeners = [
        'updatedSelectedPaymentMethod' => '$refresh',
    ];
    protected $rules = [
        'selectedPaymentMethod' => 'required',
        'paymentAmount' => 'required|numeric|min:100|max:10000000',
    ];

    public function mount(): void
    {
        $this->patients                  = Patient::latest()->get();
        $this->payment_methods           = PaymentMethod::all();
        $this->payment_service_providers = collect();
    }

    public function updatedSelectedPaymentMethod($payment_method): void
    {
        if (!is_null($payment_method)) {
            $this->payment_service_providers = PaymentServiceProvider::where('payment_method_id', $payment_method)->get();
        }
        $this->emitSelf('updatedSelectedPaymentMethod');
    }

    // public function updatedPaymentAmount($propertyName): void
    // {
    //     if ($this->paymentAmount != '' && $this->paymentAmount > $this->amount_due) {
    //         $this->amount_due -= (int)$this->paymentAmount;
    //         throw ValidationException::withMessages([
    //             'paymentAmount' => 'This amount can not be greater than the total amount due. Check and enter collect amount.'
    //         ]);
    //     } else {
    //         $patient = Patient::where('id', $this->patient_id)->first();
    //         $this->amount_due = $patient->test_results->sum('lab_service_price');
    //     }
    //     $this->reset('paymentAmount');
    // }

    // open modal for paying lab bills
    public function openPayBillModal($id): void
    {
        $patient = Patient::where('id', $id)->first();

        $this->patient_id   = $id;
        $this->amount_due = $patient->test_results->sum('lab_service_price');

        $this->isOpenPayBill = TRUE;
    }

    // close modal
    public function closePayBillModal(): void
    {
        $this->reset('selectedPaymentMethod', 'payment_service_provider_id', 'paymentAmount');
        $this->isOpenPayBill = FALSE;
    }

    // store payments
    public function storePayments(): void
    {
        $this->validate();
        // patient_id
        // payment_method_id
        // payment_amount
        // payment_balance
        // payment_status
        Payment::create([
            'patient_id'        => $this->patient_id,
            'payment_method_id' => $this->selectedPaymentMethod,
            'payment_amount'    => $this->payment_amount,
            // 'payment_balance' => 
        ]);

        // table: payment_test_result     
    }

    public function render()
    {
        return view('livewire.accountings.accounting-component');
    }
}
