<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')->with('children')->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        Category::create($request->all());
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {

        $category = Category::findOrFail($id);


        $categories = Category::whereNull('parent_id')->where('id', '!=', $id)->get();


        return view('categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Kategori başarıyla güncellendi.');
    }

    public function destroy($id)
    {

        $category = Category::findOrFail($id);

        $category->children()->delete();

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Kategori başarıyla silindi.');
    }

    public function getHeaderData()
    {
        $categories = Category::with(['children', 'products'])->whereNull('parent_id')->get();
        return view('layouts.app', compact('categories'));
    }


}
