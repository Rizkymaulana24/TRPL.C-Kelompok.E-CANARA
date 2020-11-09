<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Authentication
    public function __construct()
    {
        $this->middleware('auth');
    }

    // View Home
    public function index()
    {
        return view('home');
    }
}
