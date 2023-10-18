<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    public function index()
    {
        return view("admin.category.index", [
            "title" => "Category Lapangan",
            "categories" => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|string",
        ]);
        Category::create($validated);
        return back()->with("success", "Kategori berhasil ditambahkan");
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            "name" => "required|string",
        ]);
        $category->update($validated);
        return back()->with("success", "Category Berhasil diperbarui");
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with("success", "Kategory berhasil dihapus");
    }
}
