<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatagoryRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Catagory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CatagoriesController extends Controller
{
    // display a list of categories in the database
    public function index(): View
    {
        $this->authorize('view category module');
        return view('pages.catagories.index');
    }

    // displays the page for the user to add catagories
    public function create(): View
    {
        $this->authorize('add category');
        return view('pages.catagories.create');
    }
    // view sigle record
    public function show(Catagory $category): View
    {
        $this->authorize('view category');
        return view('pages.catagories.show', compact('category'));
    }

    // store records in the database
    public function store(CategoryRequest $request): RedirectResponse
    {
        Catagory::create($request->validated());
        return to_route('catagories.index')->with('success', 'Category has been added!');
    }

    // display the edit page
    public function edit(Catagory $category): View
    {
        $this->authorize('edit category');
        return view('pages.catagories.edit', compact('category'));
    }
    // update record
    public function update(UpdateCategoryRequest $request, Catagory $category): RedirectResponse
    {
        $category->update($request->validated());

        return to_route('catagories.index')->with('success', 'Category has been updated!');
    }

    // delete record
    public function destroy(Catagory $category): RedirectResponse
    {
        // allow to delete resource
        $this->authorize('delete category');
        // delete resource
        $category->delete();
        // go back to index page
        return to_route('catagories.index')->with('success', 'Category has been deleted!');
    }
}
