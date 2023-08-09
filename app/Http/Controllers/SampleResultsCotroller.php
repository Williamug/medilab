<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateTestSampleResultRequest;
use App\Models\Patient;
use App\Models\Result;
use App\Models\Spacemen;
use App\Models\TestRequst;
use App\Models\TestService;
use App\Models\VisitInfo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SampleResultsCotroller extends Controller
{
    // view a list of patients
    public function index(): View
    {
        $this->authorize('view test result module');
        return view('pages.sample-results.index');
    }

    // display page for adding a new patient
    public function create(): View
    {
        $this->authorize('add test result');
        $patients = Patient::all();
        $test_services = TestService::all();
        $spacemens = Spacemen::all();
        $results = Result::all();

        return view('pages.sample-results.create', compact('patients', 'test_services', 'spacemens', 'results'));
    }

    // display single record
    public function show(TestRequst $sample_result): View
    {
        $this->authorize('view test result');
        return view('pages.sample-results.show', compact('sample_result'));
    }

    // store patient info in database
    // public function store(StorePatientRequest $request): RedirectResponse
    // {
    //     Patient::create($request->validated());
    //     return to_route('patients.index')->with('success', 'New patient has been added!');
    // }

    // show edit view
    public function edit(TestRequst $sample_result): View
    {
        $this->authorize('edit test result');
        $spacemens = Spacemen::all();
        $results = Result::all();

        return view('pages.sample-results.edit', compact('sample_result', 'spacemens', 'results'));
    }

    // update records in the database
    public function update(Request $request, TestRequst $sample_result): RedirectResponse
    {
        request()->validate([
            'spacemen_id' => 'required',
            'result_id' => 'required',
        ]);

        VisitInfo::create([
            'patient_id' => $sample_result->patient->id,
            'visit_date' => now(),
            'age' => $request['age'],
            'temperature' => $request['temperature'],
            'weight' => $request['weight'],
            'height' => $request['height']
        ]);

        $sample_result->update([
            'spacemen_id' => $request['spacemen_id'],
            'result_id' => $request['result_id'],
        ]);
        return to_route('requests.index', $sample_result);
    }

    // delete record
    // public function destroy(Patient $patient): RedirectResponse
    // {
    //     $patient->delete();
    //     return to_route('patients.index');
    // }

}
