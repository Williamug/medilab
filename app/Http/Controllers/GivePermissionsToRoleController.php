<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class GivePermissionsToRoleController extends Controller
{
    public function create(): View
    {
        return view('panel.super.roles-permissions.give-permissions.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Validator::make($request->all(), [
            'role_id' => 'required',
        ])->validated();

        $role = Role::where('id', $request->role_id)->first();
        if (!is_null($role)) {
            $role->syncPermissions($request->permissions);
            return to_route('roles.index');
        } else {
            return to_route('roles.give-permissions')
                ->with('error', 'Please select a role you are assigning permissions to.');
        }
    }

    public function edit(Role $role): View
    {
        $roles = Role::all();
        $modules = Module::all();
        $permissions = Permission::get();
        $role_permissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->toArray();

        return view('panel.super.roles-permissions.give-permissions.edit', compact('role', 'modules', 'permissions', 'role_permissions'));
    }

    public function update(Role $role, Request $request): RedirectResponse
    {
        $role->syncPermissions($request->permissions);
        return to_route('roles.show', $role)->with('success', 'Permissions have been updated');
    }
}
