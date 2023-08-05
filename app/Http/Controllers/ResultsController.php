<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResultRequest;
use App\Http\Requests\UpdateResultRequest;
use App\Models\Result;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    // view a list of patients
    public function index(): View
    {
        return view('pages.results.index');
    }

    // display page for adding a new patient
    public function create(): View
    {
        return view('pages.results.create');
    }

    // store patient info in database
    public function store(StoreResultRequest $request): RedirectResponse
    {
        Result::create($request->validated());
        return to_route('results.create')->with('success', 'Results has been save');
    }

    // display single record
    public function show(Result $result): View
    {
        return view('pages.results.show', compact('result'));
    }

    // show edit view
    public function edit(Result $result): View
    {
        return view('pages.results.edit', compact('result'));
    }

    // update records in the database
    public function update(UpdateResultRequest $request, Result $result): RedirectResponse
    {
        $result->update($request->validated());
        return to_route('results.update', $result);
    }

    // delete record
    public function destroy(Result $result): RedirectResponse
    {
        $result->delete();
        return to_route('results.index');
    }
}
