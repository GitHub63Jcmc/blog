<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        
    }

    public function show(Permission $permission)
    {
        return view('admin.permissions.show', compact('permission'));
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id . '|string|max:255',
        ]);

        $permission->update([
            'name', $request->name,
        ]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Permiso actualizado!',
            'text' => 'El permiso se ha actualizado correctamente.'
        ]);
            

        return redirect()->route('admin.permissions.edit', $permission);
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Permiso eliminado!',
            'text' => 'El permiso se ha eliminado correctamente.'
        ]);

        return redirect()->route('admin.permissions.index');
    }
}
