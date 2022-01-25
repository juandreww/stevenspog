<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function registration(Request $request) {
        return view('admin.registration');
    }

    public function submit(Request $request) {
        $this->validate($request, [
            'nama' => 'required|min:5|max:20',
            'pekerjaan' => 'required',
            'usia' => 'required|numeric'
        ]);

        

        return view('admin.submit',['data' => $request]);
    }
}
