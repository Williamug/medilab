<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestServiceRequest;
use App\Http\Requests\UpdateTestServiceRequest;
use App\Models\Catagory;
use App\Models\TestService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TestServicesController extends Controller
{
    public function index(): View
    {
        return view('pages.test-services.index');
    }

    public function create(): View
    {
        $categories = Catagory::all();
        return view('pages.test-services.create', compact('categories'));
    }

    // store record in the database
    public function store(StoreTestServiceRequest $request): RedirectResponse
    {
        $request->validated();
        TestService::create([
            'test_name' => $request['test_name'],
            'price' => $request['price'],
            'user_id' => auth()->id(),
            'catagory_id' => $request['catagory_id'],
        ]);
        return to_route('test-services.index')->with('success', 'A new test has been add!');
    }

    // show single record
    public function show(TestService $test_service): View
    {
        return view('pages.test-services.show', compact('test_service'));
    }

    public function edit(TestService $test_service): View
    {
        $categories = Catagory::all();
        return view('pages.test-services.edit', compact('test_service', 'categories'));
    }

    public function update(UpdateTestServiceRequest $request, TestService $test_service): RedirectResponse
    {
        $request->validated();
        $test_service->update([
            'test_name' => $request['test_name'],
            'price' => $request['price'],
            'user_id' => auth()->id(),
            'catagory_id' => $request['catagory_id'],
        ]);

        return to_route('test-services.show', $test_service);
    }

    public function destroy(TestService $test_service): RedirectResponse
    {
        $test_service->delete();
        return to_route('test-services.index');
    }
}
