<?php

namespace App\Http\Controllers\Admin;

use App\Models\Time;
use App\Models\Field;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::latest()->get();
        return view("admin.booking.index", [
            "title" => "Daftar Booking",
            "bookings" => $bookings,
        ]);
    }

    public function show(Booking $booking)
    {
        return view('admin.booking.show', [
            "title" => "Detail Booking",
            "booking" => $booking,
        ]);
    }

    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            "status" => "required|in:Pending,Waiting For Payment,Confirmed,Cancelled",
        ]);
        $booking->update($validated);
        return back()->with("success", "Status berhasil di perbharui");
    }

    public function destroy(Booking $booking)
    {
        if ($booking->confirm_payment) {
            Storage::delete($booking->confirm_payment);
        }
        $booking->delete();
        return back()->with('sucess', "Booking berhasil dihapus");
    }

    public function show_field()
    {
        return view("admin.booking.show_field", [
            "title" => "Daftar Lapangan",
            "fields" => Field::all(),
        ]);
    }

    public function show_date(Field $field, Request $request)
    {
        $bookings = $request->select_date ? 
        Booking::where("field_id", $field->id)->where('date', $request->select_date)->get() :
        Booking::where("field_id", $field->id)->get();
        return view("admin.booking.show_date", [
            "title" => "Jadwal Lapangan",
            "bookings" => $bookings,
            "times" => Time::all(),
            "select_date" => $request->select_date,
            "field" => $field,
        ]);
    }
}
