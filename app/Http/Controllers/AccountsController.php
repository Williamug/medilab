<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    // View index page
    public function index(): View
    {
        return view('pages.accountings.index');
    }

    public function show(Patient $patient): View
    {
        return view('pages.accountings.show', compact('patient'));
    }
}
