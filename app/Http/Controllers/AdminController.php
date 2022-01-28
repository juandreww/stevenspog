<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\Models\UserRegistration;

class AdminController extends Controller
{
    public function registration(Request $request) {

        $user = DB::table('trnregistration2')->first();
        // return response()->json(
        //     $user,
        //     Response::HTTP_OK
        // );
        return view('admin.registration', ['user' => $user]);
    }

    public function submit(Request $request) {
        $this->validate($request, [
            'nama' => 'required|min:5|max:20',
            'pekerjaan' => 'required',
            'usia' => 'required|numeric'
        ]);

        DB::INSERT("INSERT INTO trnregistration2 (Oid, Name, Age) VALUES (UUID(), ?, ?)", [$request->nama, 23]);

        return view('admin.submit',['data' => $request]);
    }
}
