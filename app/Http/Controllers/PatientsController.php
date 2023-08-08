<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Patient;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    // view a list of patients
    public function index(): View
    {
        return view('pages.patients.index');
    }

    // display page for adding a new patient
    public function create(): View
    {
        return view('pages.patients.create');
    }

    // display single record
    public function show(Patient $patient): View
    {
        return view('pages.patients.show', compact('patient'));
    }

    // store patient info in database
    public function store(StorePatientRequest $request): RedirectResponse
    {
        Patient::create($request->validated());
        return to_route('patients.index')->with('success', 'New patient has been added!');
    }

    // show edit view
    public function edit(Patient $patient): View
    {
        return view('pages.patients.edit', compact('patient'));
    }

    // update records in the database
    public function update(UpdatePatientRequest $request, Patient $patient): RedirectResponse
    {
        $patient->update($request->validated());
        return to_route('patients.update', $patient);
    }

    // delete record
    public function destroy(Patient $patient): RedirectResponse
    {
        $patient->delete();
        return to_route('patients.index');
    }
}
