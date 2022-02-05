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
        
        
        if ($request->date == 1) {
            $date = "2022-01-31";
            $request->date = "Monday, 31 January 2022";
        }
        elseif ($request->date == 2) {
            $date = "2022-02-02";
            $request->date = "Wednesday, 02 February 2022";
        }
        elseif ($request->date == 3) {
            $date = "2022-02-04";
            $request->date = "Friday, 04 February 2022";
        }
        else throw new \Exception("False Date");

        if ($request->time == 1) {
            $request->time = "17:00";
        }
        elseif ($request->time == 2) {
            $request->time = "17:30";
        }
        elseif ($request->time == 3) {
            $request->time = "18:00";
        }
        elseif ($request->time == 4) {
            $request->time = "18:30";
        }
        elseif ($request->time == 5) {
            $request->time = "19:00";
        }
        elseif ($request->time == 6) {
            $request->time = "19:30";
        }
        else throw new \Exception("False Time");

        DB::INSERT("INSERT INTO trnregistration2 (Oid, Name, Age, Email, Phone, Address, Note, Date, Time) 
                    VALUES (UUID(), ?, ?, ?, ?, ?, ?, ?, ?)", [$request->name, $request->age, $request->email, $request->phonenumber, $request->address,
                                                            $request->purpose, $date, $request->time]);

        return view('admin.submit',['data' => $request]);
    }
    
    public function list(Request $request) {
        $query = "SELECT * FROM trnregistration2 ORDER BY Name";
        $data = DB::SELECT($query);
        
        return view('admin.list',['data' => $data]);
    }

    public function edit($id) {
        $query= "SELECT * FROM trnregistration2 WHERE Oid = ?";
        $data = DB::SELECT($query, [$id]);
        $data = count($data) > 0 ? $data[0] : null;
        if (empty($data)) throw new \Exception("No Data");

        return view('admin.edit',['data' => $data]);
    }

    public function update(Request $request) {
        dd($request);

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
        
        DB::table('trnregistration2')->where('Oid',$request->Oid)->update([
            'Name' => $request->name,
            'Age' => $request->age,
            'Email' => $request->email,
            'Phone' => $request->phone,
            'Address' => $request->address,
            'Note' => $request->purpose,
            'Date' => $request->date,
            'Time' => $request->time,
        ]);

        return redirect('/list');
    }

    public function delete($id) {
        DB::table('trnregistration2')->where('Oid', $id)->delete();

        return redirect('/list');
    }
}
