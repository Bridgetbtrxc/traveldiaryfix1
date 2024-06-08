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

    public function CreateAccountView()
    {
        return view('CreateAccountView');
    }

}
