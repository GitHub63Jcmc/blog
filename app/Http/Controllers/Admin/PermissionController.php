<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        return view('Admin.permissions.index');
    }

    public function create()
    {
        return view('Admin.permissions.create');
    }

    public function store(Request $request)
    {
        
    }

    public function show(Permission $permission)
    {
        return view('Admin.permissions.show', compact('permission'));
    }

    public function edit(Permission $permission)
    {
        return view('Admin.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        //
    }

    public function destroy(Permission $permission)
    {
        //
    }
}
