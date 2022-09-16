<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Hospitals;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status)
    {
        if(Auth::user()->hasRole('superadmin'))
        {
            if($status == 'admin')
            {
                $admin = User::with('hospitals')->whereRoleIs($status)->get();
                return view('admin/admin_index', compact('admin'));
            }
            if($status == 'teacher')
            {
                $teacher = User::whereRoleIs($status)->get();
                return view('teacher/teacher_index', compact('teacher'));
            }
            if($status == 'student')
            {
                $student = User::whereRoleIs($status)->get();
                return view('student/student_index', compact('student'));
            }
            if($status == 'superadmin')
            {
                $userId=Auth::user()->id;
                $superadmin = User::whereRoleIs($status)->where('id','!=',$userId)->get();
                return view('superadmin/superadmin_index', compact('superadmin'));
            }
        }
        elseif(Auth::user()->hasRole('admin'))
        {
            $hospitalsId=Auth::user()->hospitals_id;
            if($status == 'teacher')
            {
                $teacher = User::whereRoleIs($status)->where('hospitals_id',$hospitalsId)->get();
                return view('teacher/teacher_index', compact('teacher'));
            }
            if($status == 'student')
            {
                $student = User::whereRoleIs($status)->where('hospitals_id',$hospitalsId)->get();
                return view('student/student_index', compact('student'));
            }
        }
        elseif(Auth::user()->hasRole('teacher'))
        {
            $userId=Auth::user()->id;
            $student = User::where('parent_id',$userId)->get();
            return view('student/student_index', compact('student'));
        }
        
       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($status)
    {
        if(Auth::user()->hasRole('superadmin'))
        {
            if($status == 'admin')
            {
                $hospitals=Hospitals::get();
                return view('admin/admin_create',compact('hospitals'));
            }
            if($status == 'teacher')
            {
                $admin=User::whereRoleIs('admin')->get();
                return view('teacher/teacher_create',compact('admin'));
            }
            if($status == 'student')
            {
                $teacher=User::whereRoleIs('teacher')->get();
                return view('student/student_create',compact('teacher'));
            }
            if($status == 'superadmin')
            {
                return view('superadmin/superadmin_create');
            }
        }
        elseif(Auth::user()->hasRole('admin'))
        {
            $hospitalsId=Auth::user()->hospitals_id;
            if($status == 'teacher')
            {
                $admin=User::whereRoleIs('admin')->where('hospitals_id',$hospitalsId)->get();
                return view('teacher/teacher_create',compact('admin'));
            }
            if($status == 'student')
            {
                $teacher=User::whereRoleIs('teacher')->where('hospitals_id',$hospitalsId)->get();
                return view('student/student_create',compact('teacher'));
            }
        }
        elseif(Auth::user()->hasRole('teacher'))
        {
            $userId=Auth::user()->id;
            $teacher=User::where('id',$userId)->get();
            return view('student/student_create',compact('teacher'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roleId=$request->role_id;
        $hospitalsId=$request->hospitals_id;
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,deleted_at,NULL'],
            
        ]);
        if($roleId == 'teacher')
        {
            $userId=$request->parent_id;
            $user=User::find($userId);
            $hospitalsId=$user['hospitals_id'];
        }
        if($roleId == 'student')
        {
            $userId=$request->parent_id;
            $user=User::find($userId);
            $hospitalsId=$user['hospitals_id'];
        }
        // 'password' => ['required',  Rules\Password::defaults()],
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'unique_id' => $request->unique_id,
            'hospitals_id' => $hospitalsId,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'city' => $request->city,
            'user_type' => $request->role_id,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
            'created_at' => date("Y-m-d"),
            'password' => Hash::make($request->password),
            'password_show' => $request->password,
            'parent_id' => $request->parent_id,

        ]);


        $user->attachRole($request->role_id);

      
        return $this->redirectAfterAction($roleId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $role=$request->role_id;
        $userId=$request->user_id;
        if($role == 'admin')
        {
            $admin=User::with('hospitals')->find($userId);
            return view('admin/admin_show', compact('admin'));
        }
        if($role == 'teacher')
        {
            $teacher=User::with('hospitals')->find($userId);
            return view('teacher/teacher_show', compact('teacher'));
        }
        if($role == 'superadmin')
        {
            $superadmin=User::find($userId);
            return view('superadmin/superadmin_show',compact('superadmin'));
        }
        if($role == 'student')
        {
            $student=User::with('hospitals')->find($userId);
            $session=DB::table('game_session')->where('user_id',$userId)->get();
            return view('student/student_show', compact('student','session'));
        }
       
     
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($status,$userId)
    {
        if(Auth::user()->hasRole('superadmin'))
        {
        if($status == 'admin')
        {
            $admin=User::find($userId);
            $hospitals=Hospitals::get();
            return view('admin/admin_edit',compact('admin','hospitals'));
        }
        if($status == 'teacher')
        {
            $teacher=User::find($userId);
            $admin=User::whereRoleIs('admin')->get();
            return view('teacher/teacher_edit',compact('teacher','admin'));
        }
        if($status == 'student')
        {
            $student=User::find($userId);
            $teacher=User::whereRoleIs('teacher')->get();
            return view('student/student_edit',compact('student','teacher'));
        }
        if($status == 'superadmin')
        {
            $superadmin=User::find($userId);
            return view('superadmin/superadmin_edit',compact('superadmin'));
        }
        }
        elseif(Auth::user()->hasRole('admin'))
        {
            $hospitalsId=Auth::user()->hospitals_id;
            if($status == 'teacher')
            {
                $teacher=User::find($userId);
                $admin=User::whereRoleIs('admin')->where('hospitals_id',$hospitalsId)->get();
                return view('teacher/teacher_edit',compact('teacher','admin'));
            }
            if($status == 'student')
            {
                $student=User::find($userId);
                $teacher=User::whereRoleIs('teacher')->where('hospitals_id',$hospitalsId)->get();
                return view('student/student_edit',compact('student','teacher'));
            }
        }
        elseif(Auth::user()->hasRole('teacher'))
        {
            $userIdAuth=Auth::user()->id;
            $student=User::find($userId);
            $teacher=User::where('id',$userIdAuth)->get();
            return view('student/student_edit',compact('student','teacher'));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $roleId=$request->role_id;
        $hospitalsId=0;
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
        ]);

        $user = User::find($id);
        if($roleId == 'admin')
        {
            
            $child=User::where('parent_id',$id)->pluck('id')->toArray();
            
            User::whereIn('id', $child)
                ->update([
                    'hospitals_id' => $request->hospitals_id,
                ]);
            $child=User::whereIn('parent_id',$child)->pluck('id')->toArray();
            User::whereIn('id', $child)
            ->update([
                'hospitals_id' => $request->hospitals_id,
            ]);
            $hospitalsId=$request->hospitals_id;
            
        }
        if($roleId == 'teacher')
        {
            
            $user2 = User::find($request->parent_id);
            $hospitalsId=$user2['hospitals_id'];

            $child=User::where('parent_id',$id)->pluck('id')->toArray();
            
            User::whereIn('id', $child)
                ->update([
                    'hospitals_id' => $hospitalsId,
                ]);
        }
        if($roleId == 'student')
        {
            
            $user2 = User::find($request->parent_id);
            $hospitalsId=$user2['hospitals_id'];

            $child=User::where('parent_id',$id)->pluck('id')->toArray();
            
            User::whereIn('id', $child)
                ->update([
                    'hospitals_id' => $hospitalsId,
                ]);
        }
        if ($request->password) {
            $user['password'] = Hash::make($request->password);
            $user['password_show'] = $request->password;
        }
        $user['hospitals_id'] = $hospitalsId;
        $user['unique_id'] = $request->unique_id;
        $user['first_name'] = $request->first_name;
        $user['parent_id'] =  $request->parent_id;
        $user['last_name'] = $request->last_name;
        $user['phone_number'] = $request->phone_number;
        $user['city'] = $request->city;
        $user['address'] = $request->address;
        $user['updated_by'] = Auth::user()->id;
        $user['updated_at'] =  date("Y-m-d");
        $user->save();

        return $this->redirectAfterAction($roleId);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $roleId= $data->user_type;
        $data->delete();
        return $this->redirectAfterAction($roleId);
    }
  
    private function redirectAfterAction($roleId)
    {
        if($roleId == 'admin')
        {
            return redirect()->route('admin','admin');
        }
        if( $roleId == 'student')
        {
            return redirect()->route('student','student');
        }
       if( $roleId == 'teacher')
       {
         return redirect()->route('teacher','teacher');
       }
       if( $roleId == 'superadmin')
       {
         return redirect()->route('superadmin','superadmin');
       }
    }
    public function studentSessionDetails(int $id)
    {
        $gameSessionQuestion=DB::table('game_session_question')->where('game_session_id',$id)->get();
        $gameSessionProcedure=DB::table('game_session_procedure')->where('game_session_id',$id)->get();
        $aveScore=DB::table('game_session_question')
        ->select(DB::raw('MAX(score) AS max_score, AVG(score) AS avg_score'))
        ->where('game_session_id', $id)->get();
        return view('student/student_session_details',compact('aveScore','gameSessionQuestion','gameSessionProcedure'));
    }
    
}
