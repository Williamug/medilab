<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TestResultscontroller extends Controller
{
    // view a list of patients
    public function index(): View
    {
        $this->authorize('view test result module');
        return view('pages.test-results.results.index');
    }
}
