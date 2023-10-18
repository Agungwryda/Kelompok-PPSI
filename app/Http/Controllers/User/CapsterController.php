<?php

namespace App\Http\Controllers\User;

use App\Models\Field;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FieldController extends Controller
{
    public function index()
    {
        return view('user.field', [
            "title" => "Field Booking",
            "fields" => Field::all(),
        ]);
    }
}
