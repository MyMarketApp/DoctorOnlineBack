<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Schedule;

class ScheduleController extends Controller
{
    public function add(Request $request){
        try
        {
            $schedule = new Schedule();
            $schedule->day = $request->day;
            $schedule->start = $request->start;
            $schedule->end = $request->end;
            $schedule->save();
            
            return response()->json(['status' => true, 
                'message'=> 'Schedule Created',
                'body'=> $schedule],
                200);
        }
        catch(\Exception $e)
        {
            return response()->json(['status' => false,
                'message'=> 'Hubo un error',
                'body' => $e->getMessage()],
                500);
        }
    }

    public function all(){
        try
        {
            $schedules = Schedule::all();
            
            return response()->json(['status' => true, 
                'message'=> 'Schedules Found',
                'body'=> $schedules],
                200);
        }
        catch(\Exception $e)
        {
            return response()->json(['status' => false,
                'message'=> 'Hubo un error',
                'body' => $e->getMessage()],
                500);
        }
    }
}
