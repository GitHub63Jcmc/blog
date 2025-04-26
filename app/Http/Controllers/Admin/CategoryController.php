<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.categories.index', compact('categories'));
    }

  
    public function create()
    {
        return view('admin.categories.create');
    }

 
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);

        Category::create($data);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Categoría creada!',
            'text' => 'La categoría se ha creado correctamente',
        ]);

        return redirect()->route('admin.categories.index');
    }


    public function show(Category $category)
    {
        //
    }

 
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update($data);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Categoría actualizada!',
            'text' => 'La categoría se ha actualizado correctamente',
        ]);

        return redirect()->route('admin.categories.edit', $category);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Categoría eliminada!',
            'text' => 'La Categoría se ha eliminado correctamente.',
        ]);

        return redirect()->route('admin.categories.index');
    }
}
