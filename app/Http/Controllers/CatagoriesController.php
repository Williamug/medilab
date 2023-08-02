<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatagoryRequest;
use App\Models\Catagory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CatagoriesController extends Controller
{
    public function index(): View
    {
        return view('pages.catagories.index');
    }

    public function store(CatagoryRequest $request): RedirectResponse
    {
        Catagory::create($request->validated());
        return to_route('catagories.index')->with('success', 'Catagory has been added');
    }

    public function update(): RedirectResponse
    {
        return back();
    }
}
