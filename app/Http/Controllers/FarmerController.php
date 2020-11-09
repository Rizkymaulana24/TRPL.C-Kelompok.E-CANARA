<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FarmerController extends Controller
{
    // Authentication
    public function __construct()
    {
        $this->middleware('auth','rolecheck');
    }

    // Farmer View
    public function index()
    {
        //
        return 'Farmer';
    }
}
