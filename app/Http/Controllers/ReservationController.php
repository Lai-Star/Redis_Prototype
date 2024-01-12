<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApiUser;

class ReservationController extends Controller
{
    public function index()
    {
        $apiUsers = ApiUser::paginate(50); // Or any number you prefer
        return view('reservations.index', compact('apiUsers'));
    }
}
