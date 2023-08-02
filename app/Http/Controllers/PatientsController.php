<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    public function index(): View
    {
        return view('pages.patients.index');
    }
}
