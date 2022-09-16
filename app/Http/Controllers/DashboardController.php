<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('superadmin'))
        {
            $dasboardObj=new Dashboard();
            $data=$dasboardObj->superAdmin();
            return view('dashboard/dashboard_superadmin',compact('data'));
        }
        elseif(Auth::user()->hasRole('admin'))
        {
            $dasboardObj=new Dashboard();
            $data=$dasboardObj->admin();
            return view('dashboard/dashboard_admin',compact('data'));
            
        }
        elseif(Auth::user()->hasRole('teacher'))
        {
            $dasboardObj=new Dashboard();
            $data=$dasboardObj->teacher();
            return view('dashboard/dashboard_teacher',compact('data'));
            
        }
        elseif(Auth::user()->hasRole('student'))
        {      
            $dasboardObj=new Dashboard();
            $data=$dasboardObj->student();      
            return view('dashboard/dashboard_student',compact('data'));

        }
    }

   
}
