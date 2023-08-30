<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\DataFeed;
use App\Models\LabService;
use App\Models\Patient;
use App\Models\TestResult;
use Carbon\Carbon;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{

    /**
     * Displays the dashboard screen
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // $this->authorize('view  dashboard module');
        $patient_chart_options = [
            'chart_title'     => 'Patient by months',
            'report_type'     => 'group_by_date',
            'model'           => Patient::class,
            'group_by_field'  => 'created_at',
            'group_by_period' => 'month',
            'chart_type'      => 'bar',
            'chart_height'          => '600px'
        ];

        $total_income_chart_options = [
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
        $patients_chart     = new LaravelChart($patient_chart_options);
        $total_income_chart = new LaravelChart($total_income_chart_options);

        $patients     = Patient::count();
        $lab_services = LabService::count();
        $test_results = TestResult::whereNotNull('result_option_id')->count();
        $total_income = TestResult::where('payment_status', 'paid')->get();

        $greetings = $this->greetings();

        return view('pages/dashboard/dashboard', compact('patients', 'lab_services', 'test_results', 'test_results', 'total_income', 'patients_chart', 'total_income_chart', 'greetings'));
    }

    private function greetings(): string
    {
        $greetings = "";

        // This sets the $time variable to the current hour in the 24 hour clock format 
        $time = date("H");

        // Set the $timezone variable to become the current timezone 
        $timezone = date("e");

        return match (true) {
            $time < "12"  => 'Good morning',
            $time >= "12" &&
                $time < "17" => "Good afternoon",
            $time >= "17" &&
                $time < "19"  => "Good evening",
            $time >= "19" => "Good night"
        };
    }
}
