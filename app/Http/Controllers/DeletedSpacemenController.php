<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DeletedSpacemenController extends Controller
{
    public function index(): View
    {
        return view('pages.catagories.deleted-categories.index');
    }
}
