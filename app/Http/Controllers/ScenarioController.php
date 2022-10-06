<?php

namespace App\Http\Controllers;

use App\Models\Scenario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Department;
use Illuminate\Validation\Rule;


class ScenarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scenario=DB::table('scenarios AS s')
        ->join('departments AS d', 's.department_id', '=', 'd.id')
        ->select(DB::raw('s.id,s.`name` AS secnario_name,s.`created_at`,d.`name`'))
        ->whereNull('d.deleted_at')
        ->whereNull('s.deleted_at')->get();

        return view('scenario/scenario_index',compact('scenario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department=Department::get();
        return view('scenario/scenario_create',compact('department'));
        
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
            'id' => [
                'required',
                Rule::unique('scenarios')->whereNull('deleted_at'),
            ],
            'scenario_name' => ['required'],
            'department_id' => ['required'],
        ]);
        if ($request->hasFile('scenario_logo')) {
            $file = $request->file('scenario_logo');
                $file_name = time() . $file->getClientOriginalName();
                $size = $file->getSize();
                $destinationPath = base_path('public/uploads/scenario/' . $userId);
                $file->move($destinationPath, $file_name);
                $path = 'uploads/scenario/' . $userId . "/" . $file_name;

        }
      
        $data = Scenario::create([
            'name' => $request->scenario_name,
            'id' => $request->id,
            'department_id' => $request->department_id,
            'path' => $path,
            'file_name' => $file_name,
            'user_id' => $userId,
            'created_at' => date("Y-m-d h:i:s"),
            'created_by' => $userId,
        ]);
        return redirect()->route('scenario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scenario  $scenario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $scenario=DB::table('scenarios AS s')
        ->join('departments AS d', 's.department_id', '=', 'd.id')
        ->select(DB::raw('s.id,s.`name` AS secnario_name,s.`created_at`,d.`name`,d.`path` AS d_path,s.`path`'))
        ->where('s.id',$id)
        ->get();

        return view('scenario/scenario_show',compact('scenario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Scenario  $scenario
     * @return \Illuminate\Http\Response
     */
    public function edit(Scenario $scenario)
    {
        $department=Department::get();
        return view('scenario/scenario_edit',compact('scenario','department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scenario  $scenario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $userId=Auth::user()->id;
        $scenario = Scenario::find($id);
        $request->validate([
            'scenario_name' => ['required'],
            'id' => ['required'],
            'department_id' => ['required'],
        ]);

        if ($request->hasFile('scenario_logo')) {
            $previousPic = $scenario->path;
            $previousPicDest =  $previousPic;
            File::delete($previousPicDest);
            $destinationPath = base_path('public/uploads/scenario/' . $userId);
            $file = $request->file('scenario_logo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $scenario['path'] = "uploads/scenario/" .$userId . "/". $filename;
            $scenario['file_name'] = $filename;
            $scenario->save();
        }
        
        
        $scenario['name'] = $request->scenario_name;
        $scenario['id'] = $request->id;
        $scenario['department_id'] = $request->department_id;
        $scenario['user_id'] = $userId;
        $scenario['updated_at'] = date("Y-m-d");
        $scenario->save();

        return redirect()->route('scenario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scenario  $scenario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Scenario::find($id);
        $data->delete();
        return redirect()->route('scenario.index');
    }
}
