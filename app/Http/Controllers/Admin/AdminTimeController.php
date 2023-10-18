<?php

namespace App\Http\Controllers\Admin;

use App\Models\Time;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTimeController extends Controller
{
    public function index()
    {
        return view('admin.time.index', [
            "title" => "Jam Booking",
            "times" => Time::orderBy('clock')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "clock" => "required",
        ]);
        Time::create($validated);
        return back()->with("success", "Jam Berhasil ditambahkan");
    }

    public function update(Request $request, Time $time)
    {
        $validated = $request->validate([
            "clock" => "required|unique:times,clock",
        ]);
        $time->update($validated);
        return back()->with("success", "Jam Berhasil diperbaharui");
    }

    public function destroy(Time $time)
    {
        $time->delete();
        return back()->with("success", "Jam Berhasil dihapus");
    }
}
