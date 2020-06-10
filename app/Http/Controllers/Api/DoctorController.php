<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Doctor;

class DoctorController extends Controller
{
    public function add(Request $request){
        try
        {
            $doctor = new Doctor();
            $doctor->description = $request->description;
            $doctor->name = $request->name;
            $doctor->lastName = $request->lastName;
            $doctor->dni = $request->dni;
            $doctor->rate = $request->rate;
            $doctor->idGender = $request->idGender;
            $doctor->idUser = $request->idUser;
            $doctor->idSchedule = $request->idSchedule;
            $doctor->idSpecialty = $request->idSpecialty;
            $doctor->birthdate = $request->birthdate;
            $doctor->imageUrl = $request->imageUrl;
            $doctor->save();
            
            return response()->json(['status' => true, 
                'message'=> 'Doctor Created',
                'body'=> $doctor],
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
            $doctor = Doctor::where('id',$request->id)->first();
            $doctor->description = $request->description;
            $doctor->name = $request->name;
            $doctor->lastName = $request->lastName;
            $doctor->dni = $request->dni;
            $doctor->rate = $request->rate;
            $doctor->idGender = $request->idGender;
            $doctor->idUser = $request->idUser;
            $doctor->idSchedule = $request->idSchedule;
            $doctor->idSpecialty = $request->idSpecialty;
            $doctor->birthdate = $request->birthdate;
            $doctor->imageUrl = $request->imageUrl;
            $doctor->save();

            return response()->json(['status' => true, 
                'message'=> 'Update Success',
                'body'=> $doctor],
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
            $doctors = Doctor::all();
            
            return response()->json(['status' => true, 
                'message'=> 'Patients Found',
                'body'=> $doctors],
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
