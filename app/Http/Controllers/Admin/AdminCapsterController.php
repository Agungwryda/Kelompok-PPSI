<?php

namespace App\Http\Controllers\Admin;

use App\Models\Field;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class AdminFieldController extends Controller
{
    public function index()
    {
        return view("admin.field.index", [
            "title" => "Lapangan",
            "fields" => Field::all(),
        ]);
    }

    public function create()
    {
        return view("admin.field.create", [
            "title" => "Tambah Lapangan",
            "categories" => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "category_id" => "required|exists:categories,id",
            "name" => "required|string",
            'image' => 'required|mimes:jpg,jpeg,png,webp|max:250',
            "description" => "required|string",
            "rental_price" => "required|numeric|min:0",
        ]);
        // $extension = $request->file("image")->getClientOriginalExtension();
        // $newname = $request->name.'-'.now()->timestamp.'.'.$extension;
        $validated["image"] = $request->file("image")->store('field');
        Field::create($validated);
        return redirect()->route('admin.field.index')->with("success", "Lapangan Berhasil ditambahkan");
    }

    public function show(Field $field)
    {
        return view("admin.field.show", [
            "title" => "Detail Lapangan",
            "field" => $field,
        ]);
    }

    public function edit(Field $field)
    {
        return view("admin.field.edit", [
            "title" => "Edit Lapangan",
            "field" => $field,
            "categories" => Category::all(),
        ]);
    }

    public function update(Request $request, Field $field)
    {
        $validated = $request->validate([
            "category_id" => "required|exists:categories,id",
            "name" => "required|string",
            "image" => "nullable|image",
            "description" => "required|string",
            "rental_price" => "required|numeric|min:0",
        ]);
        if($request->file("image")){
            Storage::delete($field->image);
            $validated["image"] = $request->file('image')->store('field');
        }
        $field->update($validated);
        return redirect()->route('admin.field.index')->with("Data Lapangan Berhasil Diperbarui");
    }

    public function destroy(Field $field)
    {
        Storage::delete($field->image);
        $field->delete();
        return back()->with("success", "Lapangan Berhasil Dihapus");
    }
}
