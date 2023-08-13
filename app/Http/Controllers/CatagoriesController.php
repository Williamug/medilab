<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatagoryRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Catagory;
use App\Models\ServiceCategory;
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
}
