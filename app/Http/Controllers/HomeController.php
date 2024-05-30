<?php

namespace App\Http\Controllers;

use App\Models\Itinerary;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index2()
    {
        return view('index2');
    }

    public function login()
    {
        return view('loginsuccessful');
    }

    public function loginsuccessful($id)
{
    // Get all itineraries for the authenticated user
    $itineraries = Itinerary::where('user_id', $id)->get();

    // Pass the user ID and itineraries to the view
    return view('loginsuccessful', ['userId' => $id, 'itineraries' => $itineraries]);
}
}
