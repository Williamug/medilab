<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DeletedCategoriesController extends Controller
{
    public function index(): View
    {
        return view('pages.categories.deleted-categories.index');
    }
}
