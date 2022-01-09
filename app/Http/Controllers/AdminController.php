<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function registration(Request $request) {
        return view('registration.master');
    }
}
