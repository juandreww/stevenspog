<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\Models\UserRegistration;

class AdminController extends Controller
{
    public function registration(Request $request) {
        return view('admin.registration');
    }

    public function submit(Request $request) {
        $this->validate($request, [
            'name' => 'required|min:3',
            'age' => 'required|numeric',
            'email' => 'required',
            'phonenumber' => 'required',
            'address' => 'required',
            'purpose' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        // DB::INSERT("INSERT INTO trnregistration2 (Oid, Name, Age) VALUES (UUID(), ?, ?)", [$request->nama, 23]);

        return view('admin.submit',['data' => $request]);
    }
}
