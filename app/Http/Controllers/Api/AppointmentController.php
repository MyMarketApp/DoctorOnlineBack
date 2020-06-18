<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Appointment;

class AppointmentController extends Controller
{
    public function add(Request $request){
        try
        {
            $appointment = new Appointment();
            $appointment->diagnostic = $request->diagnostic;
            $appointment->prescription = $request->prescription;
            $appointment->comment = $request->comment;
            $appointment->score = $request->score;
            $appointment->date = $request->date;
            $appointment->idDoctor = $request->idDoctor;
            $appointment->idStatus = $request->idStatus;
            $appointment->idPatient = $request->idPatient;
            $appointment->idSchedule = $request->idSchedule;
            $appointment->idType = $request->idType;
            $appointment->save();

            $appointment = Appointment::where('id',$appointment->id)->with(['doctor.specialty','status','patient','schedule','type'])->first();
            
            return response()->json(['status' => true, 
                'message'=> 'Appointment Created',
                'body'=> $appointment],
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

    public function update(Request $request){
        try
        {
            $appointment = Appointment::where('id',$request->id)->first();
            $appointment->diagnostic = $request->diagnostic;
            $appointment->prescription = $request->prescription;
            $appointment->comment = $request->comment;
            $appointment->score = $request->score;
            $appointment->date = $request->date;
            $appointment->idDoctor = $request->idDoctor;
            $appointment->idStatus = $request->idStatus;
            $appointment->idPatient = $request->idPatient;
            $appointment->idSchedule = $request->idSchedule;
            $appointment->idType = $request->idType;
            $appointment->save();

            return response()->json(['status' => true, 
                'message'=> 'Update Success',
                'body'=> $appointment],
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
            $appointments = Appointment::with(['doctor.specialty','status','patient','schedule','type'])->get();

            return response()->json(['status' => true, 
                'message'=> 'Appointments Found',
                'body'=> $appointments],
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
