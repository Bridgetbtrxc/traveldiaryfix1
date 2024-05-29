<?php

namespace App\Http\Controllers;

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
}
