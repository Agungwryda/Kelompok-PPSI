<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Time;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Field;

class BookingController extends Controller
{
    public function index(Field $field, Request $request)
    {
        $bookings = $request->select_date ?
            Booking::where("field_id", $field->id)->where('date', $request->select_date)->get() :
            Booking::where("field_id", $field->id)->get();
        return view('user.booking', [
            "title" => "Pilih Jadwal Lapangan",
            "times" => Time::all(),
            "field" => $field,
            "bookings" => $bookings,
            "select_date" => $request->select_date,
        ]);
    }

    public function storeBooking(Request $request)
    {
        $validated = $request->validate([
            "field_id" => "required|exists:fields,id",
            "date" => "required|date|after_or_equal:today|before_or_equal:" . date('Y-m-d', strtotime('+5 days')),
            "start_time" => "required",
            "costumer_name" => "required|string",
            "phone" => "required|numeric|digits_between:10,12",
        ]);

        $validated["user_id"] = Auth()->user()->id;
        $validated["end_time"] = Carbon::parse($validated["start_time"])->addHour()->format('H:i');
        Booking::create($validated);
        return redirect()->route('profile')->with("success", "Booking Telah Ditambahkan Tunggu perkembangan selanjutnya");
    }
}
