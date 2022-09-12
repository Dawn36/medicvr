<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department=Department::get();
        return view('department/department_index',compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department/department_create');
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
            'department_name' => ['required'],
            'department_logo' => ['required'],
        ]);
        
        if ($request->hasFile('department_logo')) {
            $file = $request->file('department_logo');
                $file_name = time() . $file->getClientOriginalName();
                $size = $file->getSize();
                $destinationPath = base_path('public/uploads/department/' . $userId);
                $file->move($destinationPath, $file_name);
                $path = 'uploads/department/' . $userId . "/" . $file_name;

        }

        $data = Department::create([
            'name' => $request->department_name,
            'path' => $path,
            'file_name' => $file_name,
            'user_id' => $userId,
            'created_at' => date("Y-m-d h:i:s"),
            'created_by' => $userId,
        ]);
        return redirect()->route('department.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $department=Department::find($id);
        return view('department/department_show',compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('department/department_edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $userId=Auth::user()->id;
        $department = Department::find($id);
        $request->validate([
            'department_name' => ['required'],
        ]);

        if ($request->hasFile('department_logo')) {
            $previousPic = $department->path;
            $previousPicDest =  $previousPic;
            File::delete($previousPicDest);
            $destinationPath = base_path('public/uploads/department/' . $userId);
            $file = $request->file('department_logo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $department['path'] = "uploads/department/" .$userId . "/". $filename;
            $department['file_name'] = $filename;
            $department->save();
        }
        
        
        $department['name'] = $request->department_name;
        $department['updated_at'] = date("Y-m-d");
        $department->save();

        return redirect()->route('department.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = Department::find($id);
        $data->delete();
        return redirect()->route('department.index');
    }
}
