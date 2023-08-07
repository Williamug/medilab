<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestRequestRequest;
use App\Models\Patient;
use App\Models\TestRequst;
use App\Models\TestService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SubmitTestRequestsController extends Controller
{

    public function create(): View
    {
        $patients = Patient::all();
        $test_services = TestService::all();

        return view('pages.submit-test-requests.create', compact('patients', 'test_services'));
    }

    public function store(StoreTestRequestRequest $request): RedirectResponse
    {
        TestRequst::create($request->validated());
        return to_route('requests.index')->with('success', 'Test request has been submitted!');
    }
}
