<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    // View index page
    public function index(): View
    {
        return view('pages.accountings.index');
    }
}
