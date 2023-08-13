<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LabServicesController extends Controller
{
    public function index(): View
    {
        $this->authorize('view test service module');
        return view('pages.lab-services.index');
    }
}
