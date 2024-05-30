<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Itinerary;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\UserController;

class HomeController extends Controller
{
    public function LoginView()
    {
        return view('LoginView');
    }

    public function CreateAccount()
    {
        return view('CreateAccount');
    }

    public function MainView($id)
    {
        // Get the user by ID
        $user = User::findOrFail($id);

        // Get all itineraries for the authenticated user
        $itineraries = Itinerary::where('user_id', $id)->get();

        // Pass the user ID, user name, and itineraries to the view
        return view('MainView', [
            'userId' => $id,
            'userName' => $user->name,
            'itineraries' => $itineraries
        ]);
    }
}
