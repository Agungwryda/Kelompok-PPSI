<?php

namespace App\Http\Controllers\User;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user_id = Auth()->user()->id;
        $userBooking = Booking::where('user_id', $user_id)->latest()->get();
        return view('user.profile', [
            "title" => "Profile",
            "userBooking" => $userBooking,
        ]);
    }

    public function confirmPayment(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            "confirm_payment" => "required|image|mimes:png,jpg,jpeg",
        ]);
        $validated["confirm_payment"] = $request->file('confirm_payment')->store('confirm');
        $booking->update($validated);
        return back()->with('success', "Bukti Pembayaran telah di kirim, tunggu konfirmasi selanjutnya");
    }

    public function destroyBooking(Booking $booking)
    {
        if ($booking->confirmPayment) {
            Storage::delete($booking->confirm_payment);
        }
        $booking->delete();
        return back()->with('success', "Booking berhasil dihapus");
    }
}
