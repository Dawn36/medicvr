<?php

namespace App\Http\Controllers;

use App\Models\Hospitals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class HospitalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitals=Hospitals::get();
        return view('hospitals/hospitals_index',compact('hospitals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hospitals/hospitals_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId=Auth::user()->id;
        $request->validate([
            'hospital_name' => ['required'],
            'hospital_phone' => ['required'],
            'hospital_email' => ['required'],
            'hospital_address' => ['required'],
            'primary_color' => ['required'],
            'secondary_color' => ['required'],
        ]);
        
        if ($request->hasFile('hospital_small_logo')) {
            $file = $request->file('hospital_small_logo');
                $file_name = time() . $file->getClientOriginalName();
                $size = $file->getSize();
                $destinationPath = base_path('public/uploads/hospital/hospital-small-logo/' . $userId);
                $file->move($destinationPath, $file_name);
                $pathSmall = 'uploads/hospital/hospital-small-logo/' . $userId . "/" . $file_name;

        }
        if ($request->hasFile('hospital_hi_rest_logo')) {
            $file = $request->file('hospital_hi_rest_logo');
                $file_name = time() . $file->getClientOriginalName();
                $size = $file->getSize();
                $destinationPath = base_path('public/uploads/hospital/hospital-hi-rest-logo/' . $userId);
                $file->move($destinationPath, $file_name);
                $pathHi = 'uploads/hospital/hospital-hi-rest-logo/' . $userId . "/" . $file_name;

        }

        $data = Hospitals::create([
            'hospital_name' => $request->hospital_name,
            'hospital_phone' => $request->hospital_phone,
            'hospital_email' => $request->hospital_email,
            'hospital_address' => $request->hospital_address,
            'primary_color' => $request->primary_color,
            'secondary_color' => $request->secondary_color,
            'hospital_small_logo' => $pathSmall,
            'hospital_hi_rest_logo' => $pathHi,
            'user_id' => $userId,
            'created_at' => date("Y-m-d h:i:s"),
            'created_by' => $userId,
        ]);
        return redirect()->route('hospitals.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hospitals  $hospitals
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $hospital=Hospitals::find($id);
        $adminCount = DB::select(DB::raw("SELECT COUNT(id) AS count_id FROM users WHERE hospitals_id='$id' AND user_type='admin'"));
        $teacherCount = DB::select(DB::raw("SELECT COUNT(id) AS count_id FROM users WHERE hospitals_id='$id' AND user_type='teacher'"));
        $studentCount = DB::select(DB::raw("SELECT COUNT(id) AS count_id FROM users WHERE hospitals_id='$id' AND user_type='student'"));
        $scenariosMapping = DB::select(DB::raw("SELECT s.`id` AS scenario_id,sm.`id`,s.`name`,sm.`created_at` FROM `scenarios` s INNER JOIN `scenario_mappings` sm ON s.`id`=sm.`scenarios_id`
        WHERE sm.`hospital_id`='$id'"));

        return view('hospitals/hospitals_show',compact('hospital','adminCount','teacherCount','studentCount','scenariosMapping'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hospitals  $hospitals
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospitals $hospital)
    {
        return view('hospitals/hospitals_edit',compact('hospital'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hospitals  $hospitals
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $userId=Auth::user()->id;
        $hospital = Hospitals::find($id);
        $request->validate([
            'hospital_name' => ['required'],
            'hospital_phone' => ['required'],
            'hospital_email' => ['required'],
            'hospital_address' => ['required'],
            'primary_color' => ['required'],
            'secondary_color' => ['required'],
        ]);

        if ($request->hasFile('hospital_small_logo')) {
            $previousPic = $hospital->hospital_small_logo;
            $previousPicDest =  $previousPic;
            File::delete($previousPicDest);
            $destinationPath = base_path('public/uploads/hospital/hospital-small-logo/' . $userId);
            $file = $request->file('hospital_small_logo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $hospital['hospital_small_logo'] = "uploads/hospital/hospital-small-logo/" .$userId . "/". $filename;
            $hospital->save();
        }
        if ($request->hasFile('hospital_hi_rest_logo')) {
            $previousPic = $hospital->hospital_hi_rest_logo;
            $previousPicDest =  $previousPic;
            File::delete($previousPicDest);
            $destinationPath = base_path('public/uploads/hospital/hospital-hi-rest-logo/' . $userId);
            $file = $request->file('hospital_hi_rest_logo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $hospital['hospital_hi_rest_logo'] =  "uploads/hospital/hospital-hi-rest-logo/" .$userId . "/". $filename;
            $hospital->save();
        }
        
        
        $hospital['hospital_name'] = $request->hospital_name;
        $hospital['hospital_phone'] = $request->hospital_phone;
        $hospital['hospital_email'] = $request->hospital_email;
        $hospital['hospital_address'] = $request->hospital_address;
        $hospital['primary_color'] = $request->primary_color;
        $hospital['secondary_color'] = $request->secondary_color;
        $hospital['updated_at'] = date("Y-m-d");
        $hospital->save();

        return redirect()->route('hospitals.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hospitals  $hospitals
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = Hospitals::find($id);
        $data->delete();
        return redirect()->route('hospitals.index');
    }
}
