<?php

namespace App\Http\Controllers;

use App\Models\LabService;
use App\Models\Patient;
use App\Models\TestResult;
use Illuminate\Contracts\View\View;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{
    public function index(): View
    {
        // initialize charts
        $patients_chart     = new LaravelChart($this->patientChart());
        $total_income_chart = new LaravelChart($this->incomeChart());

        $patients     = Patient::count();
        $lab_services = LabService::count();
        $test_results = TestResult::query()
            ->whereNotNull('result_option_id')
            ->count();
        $total_income = TestResult::query()
            ->where('payment_status', 'paid')
            ->get();

        $greetings = $this->greetings();

        return view('pages/dashboard/dashboard', compact('patients', 'lab_services', 'test_results', 'test_results', 'total_income', 'patients_chart', 'total_income_chart', 'greetings'));
    }

    private function greetings(): string
    {
        // This sets the $time variable to the current hour in the 24 hour clock format 
        $time = date("H");

        // match expresion 
        return match (true) {
            $time < "12" => 'Good morning',
            $time >= "12" &&
                $time < "17" => "Good afternoon",
            $time >= "17" &&
                $time < "19"  => "Good evening",
            $time >= "19" => "Good night"
        };
    }

    // chart to display total number of patients per month
    private function patientChart(): array
    {
        return [
            'chart_title'     => 'Patient by months',
            'report_type'     => 'group_by_date',
            'model'           => Patient::class,
            'group_by_field'  => 'created_at',
            'group_by_period' => 'month',
            'chart_type'      => 'bar',
            'chart_color'        => '0,0,255',
            'chart_height'    => '600px'
        ];
    }

    // chart to display income per month
    private function incomeChart(): array
    {
        return [
            'chart_title'        => 'Income by months',
            'report_type'        => 'group_by_date',
            'model'              => TestResult::class,
            'group_by_field'     => 'created_at',
            'group_by_period'    => 'month',
            'chart_type'         => 'line',
            'chart_color'        => '0,128,0',
            'aggregate_field'    => 'lab_service_price',
            'aggregate_function' => 'sum',
            'chart_height'       => '600px',
        ];
    }
}
