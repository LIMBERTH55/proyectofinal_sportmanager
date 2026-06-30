<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminUserController extends Controller
{
    /**
     * Listado de usuarios
     */
    public function index()
    {
        $usuarios = User::with('roles')
            ->orderBy('name')
            ->paginate(10);

        $roles = Role::orderBy('name')->get();

        return view(
            'admin.usuarios.index',
            compact('usuarios', 'roles')
        );
    }

    /**
     * Cambiar rol
     */
    public function updateRole(
        Request $request,
        User $user
    ) {
        $request->validate([
            'role' => 'required|exists:roles,name'
        ]);

        $user->syncRoles([$request->role]);

        return back()->with(
            'success',
            'Rol actualizado correctamente.'
        );
    }
}