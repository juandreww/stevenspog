<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\Models\UserRegistration;

class AdminController extends Controller
{
    public function registration(Request $request) {
        $query = "SELECT dr.Oid, DATE_FORMAT(dr.Date, '%W, %d %M %Y') Date, dr.Date DateOrder FROM mstdateregister dr ORDER BY DateOrder DESC Limit 6";
        $date = DB::SELECT($query);
        return view('admin.registration', ['data' => $date]);
    }

    public function formadddate(Request $request) {
        return view('admin.adddate');
    }

    public function adddate(Request $request) {
        $this->validate($request, [
            'date' => 'required'
        ]);

        DB::INSERT("INSERT INTO mstdateregister (Oid, Date) 
                    VALUES (UUID(), ?)", [$request->date]);

        return redirect('/listdate');
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

        if ($request->date == "Available Date") throw new \Exception("False Date");
        
        
        $query = "SELECT Oid, Date
                FROM mstdateregister ORDER BY Date DESC Limit 6";
        $date = DB::SELECT($query);
        $date = $date[$request->date]->Date;
        $request->date = $date;

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
        $where = "";
        if ($request->has('find')) $where = " WHERE (
            Name like '%{$request->query('find')}%' OR
            Age like '%{$request->query('find')}%' OR
            Date like '%{$request->query('find')}%' OR
            Email like '%{$request->query('find')}%' OR
            Phone like '%{$request->query('find')}%' OR
            Address like '%{$request->query('find')}%' OR
            Note like '%{$request->query('find')}%' OR
            Time like '%{$request->query('find')}%'
        ) ";

        if ($request->has('finddate')) $where = " WHERE (
            Date like '%{$request->query('finddate')}%'
        ) ";

        $query = "SELECT * FROM trnregistration2 {$where} ORDER BY Date ASC,Name";
        $data = DB::SELECT($query);
        
        return view('admin.list',['data' => $data]);
    }

    public function listdate(Request $request) {
        $query = "SELECT Oid, DATE_FORMAT(Date, '%a, %d-%m-%Y') Date, Date DateOrder
                FROM mstdateregister ORDER BY DateOrder ASC";
        $data = DB::SELECT($query);
        
        return view('admin.listdate',['data' => $data]);
    }

    public function edit($id) {
        $query= "SELECT tr.*, DATE_FORMAT(tr.Date, '%W, %d %M %Y') DateFormatted  FROM trnregistration2 tr WHERE tr.Oid = ?";
        $data = DB::SELECT($query, [$id]);
        $data = count($data) > 0 ? $data[0] : null;
        if (empty($data)) throw new \Exception("No Data");

        $query = "SELECT dr.Oid, DATE_FORMAT(dr.Date, '%W, %d %M %Y') Date, dr.Date DateOrder FROM mstdateregister dr ORDER BY DateOrder DESC Limit 6";
        $date = DB::SELECT($query);

        return view('admin.edit',['data' => $data,
                                'date' => $date]);
    }

    public function update(Request $request) {
        $query = "SELECT Oid, Date
                FROM mstdateregister ORDER BY Date DESC Limit 6";
        $date = DB::SELECT($query);
        $date = $date[$request->date]->Date;
        $request->date = $date;

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

        if ($request->date != -1) {
            DB::table('trnregistration2')->where('Oid',$request->oid)->update([
                'Date' => $request->date,
            ]);
        }

        DB::table('trnregistration2')->where('Oid',$request->oid)->update([
            'Name' => $request->name,
            'Age' => $request->age,
            'Email' => $request->email,
            'Phone' => $request->phone,
            'Address' => $request->address,
            'Note' => $request->purpose,
            'Time' => $request->time,
        ]);
        
        return redirect('/list');
    }

    public function delete($id) {
        DB::table('trnregistration2')->where('Oid', $id)->delete();

        return redirect('/list');
    }

    public function deletedate($id) {
        DB::table('mstdateregister')->where('Oid', $id)->delete();

        return redirect('/listdate');
    }
}
