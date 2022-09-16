<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hospitals;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Dashboard extends Model
{
    use HasFactory;

    public function superAdmin()
    {
        $numberOfSessionPerDayVal=array();
        $numberOfSessionPerDayTime=array();
        $numberOfSessionPerDayDate=array();
        $month=Date('m');
        $year=Date('Y');
        $hospitalCount=Hospitals::count();
        $gameSessionCount=DB::table('game_session')->count();
        $numberOfSessionPerDay= DB::select(DB::raw("select DAY(created_at) AS days,count(id) AS count_id,SUM(time_taken) AS time_taken from `game_session` 
             where month(created_at) = '$month' 
          and year(created_at) = '$year' 
        group by day(created_at)"));
        $hospitalListing= DB::select(DB::raw("SELECT 
        COUNT(gs.`hospitals_id`) AS sessions_played,
        SUM(gs.`time_taken`) AS hours_played,
        h.`hospital_name`,h.`hospital_hi_rest_logo`,
       ( select  count(user_type)
        from `users` u where u.`hospitals_id` = h.`id` and user_type='admin') AS admin_count,
        ( select  count(user_type)
        from `users` u where u.`hospitals_id` = h.`id` and user_type='teacher') AS teacher_count,
        ( select  count(user_type)
        from `users` u where u.`hospitals_id` = h.`id` and user_type='student') AS student_count
        
      FROM
        `hospitals` h 
        LEFT JOIN `game_session` gs 
          ON h.`id` = gs.`hospitals_id`
        where h.`deleted_at` IS NULL 
          
      GROUP BY h.`id` "));
        for($i=1; $i <= date('t'); $i++)
        {
            $numberOfSessionPerDayVal[$i]=0;
            $numberOfSessionPerDayTime[$i]=0;
            $numberOfSessionPerDayDate[$i]=DATE("Y-m-$i");
        }
        for($i=0; $i < count($numberOfSessionPerDay); $i++)
        {
            $numberOfSessionPerDayVal[$numberOfSessionPerDay[$i]->days]=$numberOfSessionPerDay[$i]->count_id;
            $numberOfSessionPerDayTime[$numberOfSessionPerDay[$i]->days]=$numberOfSessionPerDay[$i]->time_taken;
        }
        $numberOfSessionPerDayVal=json_encode(array_values($numberOfSessionPerDayVal));
        $numberOfSessionPerDayTime=json_encode(array_values($numberOfSessionPerDayTime));
        $numberOfSessionPerDayDate=json_encode(array_values($numberOfSessionPerDayDate));

      $data=array('hospital_count'=>$hospitalCount,
      'game_session_count' =>$gameSessionCount,
      'number_of_session_per_day_value'=>$numberOfSessionPerDayVal,
      'number_of_session_per_day_time'=>$numberOfSessionPerDayTime,
      'number_of_session_per_day_date'=>$numberOfSessionPerDayDate,
      'hospital_listing'=>$hospitalListing );
      return $data;
    }

    public function admin()
    {
        $numberOfSessionPerDayVal=array();
        $numberOfSessionPerDayTime=array();
        $numberOfSessionPerDayDate=array();
        $month=Date('m');
        $year=Date('Y');
        $hospitalsId=Auth::user()->hospitals_id;
        $teacher = User::whereRoleIs('teacher')->where('hospitals_id',$hospitalsId)->get();
        $student = User::whereRoleIs('student')->where('hospitals_id',$hospitalsId)->get();
        $numberOfSessionPerDay= DB::select(DB::raw("select DAY(created_at) AS days,count(id) AS count_id,SUM(time_taken) AS time_taken from `game_session` 
        where month(created_at) = '$month' and year(created_at) = '$year' AND hospitals_id='$hospitalsId' group by day(created_at)"));
        for($i=1; $i <= date('t'); $i++)
        {
            $numberOfSessionPerDayVal[$i]=0;
            $numberOfSessionPerDayTime[$i]=0;
            $numberOfSessionPerDayDate[$i]=DATE("Y-m-$i");
        }
        for($i=0; $i < count($numberOfSessionPerDay); $i++)
        {
            $numberOfSessionPerDayVal[$numberOfSessionPerDay[$i]->days]=$numberOfSessionPerDay[$i]->count_id;
            $numberOfSessionPerDayTime[$numberOfSessionPerDay[$i]->days]=$numberOfSessionPerDay[$i]->time_taken;
        }
        $numberOfSessionPerDayVal=json_encode(array_values($numberOfSessionPerDayVal));
        $numberOfSessionPerDayTime=json_encode(array_values($numberOfSessionPerDayTime));
        $numberOfSessionPerDayDate=json_encode(array_values($numberOfSessionPerDayDate));

        $data=array('teacher'=>$teacher,
      'number_of_session_per_day_value'=>$numberOfSessionPerDayVal,
      'number_of_session_per_day_time'=>$numberOfSessionPerDayTime,
      'number_of_session_per_day_date'=>$numberOfSessionPerDayDate,
      'student'=>$student );
      return $data;
    }
    public function teacher()
    {
        $numberOfSessionPerDayVal=array();
        $numberOfSessionPerDayTime=array();
        $numberOfSessionPerDayDate=array();
        $month=Date('m');
        $year=Date('Y');
        $userId=Auth::user()->id;
        $student = User::where('parent_id',$userId)->get();
        $child=User::where('parent_id',$userId)->pluck('id')->toArray();
        $child=implode(',',$child);
        $numberOfSessionPerDay= DB::select(DB::raw("select DAY(created_at) AS days,count(id) AS count_id,SUM(time_taken) AS time_taken from `game_session` 
        where month(created_at) = '$month' and year(created_at) = '$year' AND user_id IN ($child)  group by day(created_at)"));
        for($i=1; $i <= date('t'); $i++)
        {
            $numberOfSessionPerDayVal[$i]=0;
            $numberOfSessionPerDayTime[$i]=0;
            $numberOfSessionPerDayDate[$i]=DATE("Y-m-$i");
        }
        for($i=0; $i < count($numberOfSessionPerDay); $i++)
        {
            $numberOfSessionPerDayVal[$numberOfSessionPerDay[$i]->days]=$numberOfSessionPerDay[$i]->count_id;
            $numberOfSessionPerDayTime[$numberOfSessionPerDay[$i]->days]=$numberOfSessionPerDay[$i]->time_taken;
        }
        $numberOfSessionPerDayVal=json_encode(array_values($numberOfSessionPerDayVal));
        $numberOfSessionPerDayTime=json_encode(array_values($numberOfSessionPerDayTime));
        $numberOfSessionPerDayDate=json_encode(array_values($numberOfSessionPerDayDate));

        $data=array(
      'number_of_session_per_day_value'=>$numberOfSessionPerDayVal,
      'number_of_session_per_day_time'=>$numberOfSessionPerDayTime,
      'number_of_session_per_day_date'=>$numberOfSessionPerDayDate,
      'student'=>$student );
      return $data;
    }
    public function student()
    {
        $numberOfSessionPerDayVal=array();
        $numberOfSessionPerDayTime=array();
        $numberOfSessionPerDayDate=array();
        $month=Date('m');
        $year=Date('Y');
        $userId=Auth::user()->id;
        $session=DB::table('game_session')->where('user_id',$userId)->whereMonth('created_at',$month)->whereYear('created_at',$year)->get();
        $avgTime=DB::table('game_session')
        ->select(DB::raw('AVG(time_taken) AS time_taken'))
        ->where('user_id', $userId)->get();
        $minutes=$avgTime[0]->time_taken;
         $avgTime = intdiv($minutes, 60).':'. ($minutes % 60);
        $numberOfSessionPerDay= DB::select(DB::raw("select DAY(created_at) AS days,count(id) AS count_id,SUM(time_taken) AS time_taken from `game_session` 
        where month(created_at) = '$month' and year(created_at) = '$year' AND user_id = $userId  group by day(created_at)"));
        for($i=1; $i <= date('t'); $i++)
        {
            $numberOfSessionPerDayVal[$i]=0;
            $numberOfSessionPerDayTime[$i]=0;
            $numberOfSessionPerDayDate[$i]=DATE("Y-m-$i");
        }
        for($i=0; $i < count($numberOfSessionPerDay); $i++)
        {
            $numberOfSessionPerDayVal[$numberOfSessionPerDay[$i]->days]=$numberOfSessionPerDay[$i]->count_id;
            $numberOfSessionPerDayTime[$numberOfSessionPerDay[$i]->days]=$numberOfSessionPerDay[$i]->time_taken;
        }
        $numberOfSessionPerDayVal=json_encode(array_values($numberOfSessionPerDayVal));
        $numberOfSessionPerDayTime=json_encode(array_values($numberOfSessionPerDayTime));
        $numberOfSessionPerDayDate=json_encode(array_values($numberOfSessionPerDayDate));

        $data=array(
      'number_of_session_per_day_value'=>$numberOfSessionPerDayVal,
      'number_of_session_per_day_time'=>$numberOfSessionPerDayTime,
      'number_of_session_per_day_date'=>$numberOfSessionPerDayDate,
      'session'=>$session,
      'avg_time'=>$avgTime
       );
      return $data;
    }
}
