<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class AdminSignUpController extends Controller
{
    use PasswordValidationRules;

    public function create(): View
    {
        return view('pages.auth.signup.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])
            ->validated();

        $role = Role::where('id', 1)->first();

        $user = User::create([
            'name'     => $request['name'],
            'email'    => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $user->assignRole($role->id);
        return to_route('login');
    }
}
