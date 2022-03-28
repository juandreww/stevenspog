<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\Models\UserRegistration;

class AdminController extends Controller
{

    public function registration(Request $request) {
        // coba bikin redirect ke home kalo error
        if (!$request->has('date')) throw new \ErrorException('Please Contact Via Whatsapp #01');
        $query = "SELECT dr.Oid, DATE_FORMAT(dr.Date, '%W, %d %M %Y') Date, dr.Date DateOrder 
                FROM mstdateregister dr 
                WHERE DATE_FORMAT(dr.Date, '%Y%m%d') = ?
                ORDER BY DateOrder DESC Limit 6";
        $date = DB::SELECT($query, [$request->query('date')]);
        if ($date > 0) $date = $date[0];
        else throw new \ErrorException('Please Contact Via Whatsapp #02');

        $time = [];
        $defaulttimearray = ['17:00', '17:30', '18:00', '18:30', '19:00', '19:30'];
        for ($i = 0; $i <= 5; $i ++) {
            $query = "SELECT DATE_FORMAT(Time, '%H:%i') Time, count(Oid) Count FROM trnregistration2 WHERE Date = ? AND Time = ? GROUP BY Time";
            $timearray = DB::SELECT($query, [$date->DateOrder, $defaulttimearray[$i]]);
            $time[$i] = [
                'Value' => $i + 1,
                'Count' => count($timearray) > 0 ? $timearray[0]->Count + 5 : 0
            ];
        }

        $datechosen = $request->query('date');
        return view('admin.registration', ['data' => $date, 'datechosen' => $datechosen,
                                        'time' => $time]);
    }

    public function pickdate(Request $request) {
        $now = Carbon::now()->addHours(7)->format('Y-m-d');
        $query = "SELECT dr.Oid, DATE_FORMAT(dr.Date, '%W, %d %M %Y') Date, dr.Date DateOrder FROM mstdateregister dr 
                WHERE dr.Date >= '{$now}'
                ORDER BY DateOrder ASC Limit 6";
        $date = DB::SELECT($query);
        $status[] = [
            'Value' => $request->status
        ];
        return view('admin.pickdate', ['data' => $date,
                                        'status' => $status]);
    }

    public function registration_existing(Request $request) {
        // coba bikin redirect ke home kalo error
        if (!$request->has('date')) throw new \ErrorException('Please Contact Via Whatsapp #01');
        $query = "SELECT dr.Oid, DATE_FORMAT(dr.Date, '%W, %d %M %Y') Date, dr.Date DateOrder 
                FROM mstdateregister dr 
                WHERE DATE_FORMAT(dr.Date, '%Y%m%d') = ?
                ORDER BY DateOrder DESC Limit 6";
        $date = DB::SELECT($query, [$request->query('date')]);
        if ($date > 0) $date = $date[0];
        else throw new \ErrorException('Please Contact Via Whatsapp #02');

        $data = null; $find = null;
        if ($request->has('find')) {
            $query = "SELECT * FROM trnregistration2 WHERE Code = ?";
            $data = DB::SELECT($query, [$request->query('find')]);
            if (count($data) > 0) $data = $data[0]; 
            $find = $request->query('find');
        }
        
        $now = Carbon::now()->addHours(7)->format('Y-m-d');
        $time = [];
        $defaulttimearray = ['17:00', '17:30', '18:00', '18:30', '19:00', '19:30'];
        for ($i = 0; $i <= 5; $i ++) {
            $query = "SELECT DATE_FORMAT(Time, '%H:%i') Time, count(Oid) Count FROM trnregistration2 WHERE Date = ? AND Time = ? GROUP BY Time";
            $timearray = DB::SELECT($query, [$date->DateOrder, $defaulttimearray[$i]]);
            $time[$i] = [
                'Value' => $i + 1,
                'Count' => count($timearray) > 0 ? $timearray[0]->Count + 5 : 0
            ];
        }
        $datechosen = $request->query('date');
        return view('admin.registration_existing', ['date' => $date, 'datechosen' => $datechosen,
                                                    'data' => $data, 'find' => $find, 'time' => $time]);
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
            'time' => 'required'
        ]);

        $query = "SELECT Oid, Date
                FROM mstdateregister 
                WHERE DATE_FORMAT(Date, '%Y%m%d') = ?";
        $date = DB::SELECT($query, [$request->query('date')]);
        $request->date = $date[0]->Date;

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
                                                            $request->purpose, $request->date, $request->time]);

        return view('admin.submit',['data' => $request]);
    }

    public function submitexist(Request $request) {
        $this->validate($request, [
            'purpose' => 'required',
            'time' => 'required'
        ]);

        if (!$request->Oid) throw new \Exception('No Record');

        $query = "SELECT Oid, Date
                FROM mstdateregister 
                WHERE DATE_FORMAT(Date, '%Y%m%d') = ?";
        $date = DB::SELECT($query, [$request->query('date')]);
        $request->date = $date[0]->Date;
        
        $query = "SELECT * FROM trnregistration2 WHERE Oid = ?";
        $source = DB::SELECT($query, [$request->Oid])[0];

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
        else throw new \Exception("Jam Penuh");

        DB::INSERT("INSERT INTO trnregistration2 (Oid, Name, Age, Email, Phone, Address, Note, Date, Time) 
                    VALUES (UUID(), ?, ?, ?, ?, ?, ?, ?, ?)", [$source->Name, $source->Age, $source->Email, $source->Phone, $source->Address,
                                                            $request->purpose, $request->date, $request->time]);
        
        $data = new request();
        $data->Name = $source->Name;
        $data->Code = $source->Code;
        $data->Note = $request->purpose;
        $data->Date = $request->date;
        $data->Time = $request->time;
        return view('admin.submit_existing',['data' => $data]);
    }
    
    public function list(Request $request) {
        $where = "";
        if ($request->has('find')) $where = " AND WHERE (
            Name like '%{$request->query('find')}%' OR
            Age like '%{$request->query('find')}%' OR
            Date like '%{$request->query('find')}%' OR
            Email like '%{$request->query('find')}%' OR
            Phone like '%{$request->query('find')}%' OR
            Address like '%{$request->query('find')}%' OR
            Note like '%{$request->query('find')}%' OR
            Time like '%{$request->query('find')}%'
        ) ";

        if ($request->has('finddate')) $where = $where . " AND WHERE (
            Date like '%{$request->query('finddate')}%'
        ) ";

        $query = "SELECT * FROM trnregistration2 WHERE Name IS NOT NULL {$where} ORDER BY Date ASC,Name";
        $data = DB::SELECT($query);
        
        return view('admin.list',['data' => $data]);
    }

    public function listdate(Request $request) {
        $query = "SELECT Oid, DATE_FORMAT(Date, '%a, %d-%m-%Y') Date, Date DateOrder
                FROM mstdateregister ORDER BY DateOrder ASC";
        $data = DB::SELECT($query);
        
        return view('admin.listdate',['data' => $data]);
    }

    public function choosestatus(Request $request) {
        return view('admin.choosestatus');
    }

    public function edit($id) {
        $query= "SELECT tr.*, DATE_FORMAT(tr.Time, '%H:%i') DateTime, DATE_FORMAT(tr.Date, '%W, %d %M %Y') DateFormatted  
                FROM trnregistration2 tr WHERE tr.Oid = ?";
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
        if ($request->date != -1) {
            $date = $date[$request->date]->Date;
            $request->date = $date;
        }

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
            'Phone' => $request->phonenumber,
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
