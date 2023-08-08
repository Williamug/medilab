<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSpacemenRequest;
use App\Http\Requests\UpdateSpacemenRequest;
use App\Models\Spacemen;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SpacemensController extends Controller
{
    public function index(): View
    {
        return view('pages.spacemens.index');
    }

    // render page for add spacemens
    public function create(): View
    {
        return view('pages.spacemens.create');
    }

    // store record in the database
    public function store(CreateSpacemenRequest $request): RedirectResponse
    {
        $request->validated();
        Spacemen::create([
            'spacemen' => $request['spacemen'],
            'user_id' => auth()->id()
        ]);
        return to_route('spacemens.index')->with('success', 'A new spacemen has been add!');
    }

    // show single record
    public function show(Spacemen $spacemen): View
    {
        return view('pages.spacemens.show', compact('spacemen'));
    }

    public function edit(Spacemen $spacemen): View
    {
        return view('pages.spacemens.edit', compact('spacemen'));
    }

    public function update(UpdateSpacemenRequest $request, Spacemen $spacemen): RedirectResponse
    {
        $request->validated();
        $spacemen->update([
            'spacemen' => $request['spacemen'],
            'user_id' => auth()->id()
        ]);

        return to_route('spacemens.show', $spacemen);
    }

    public function destroy(Spacemen $spacemen): RedirectResponse
    {
        $spacemen->delete();
        return to_route('spacemens.index');
    }
}
