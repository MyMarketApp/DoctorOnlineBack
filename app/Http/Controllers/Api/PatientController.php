<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Patient;

class PatientController extends Controller
{
    public function add(Request $request){
        try
        {
            $patient = new Patient();
            $patient->name = $request->name;
            $patient->lastName = $request->lastName;
            $patient->idGender = $request->idGender;
            $patient->idUser = $request->idUser;
            $patient->dni = $request->dni;
            $patient->birthdate = $request->birthdate;
            $patient->imageUrl = $request->imageUrl;
            $patient->save();
            
            return response()->json(['status' => true, 
                'message'=> 'Patient Created',
                'body'=> $patient],
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
            $patient = User::where('id',$request->id)->first();
            $patient->name = $request->name;
            $patient->lastName = $request->lastName;
            $patient->idGender = $request->idGender;
            $patient->idUser = $request->idUser;
            $patient->dni = $request->dni;
            $patient->birthdate = $request->birthdate;
            $patient->imageUrl = $request->imageUrl;
            $patient->save();

            return response()->json(['status' => true, 
                'message'=> 'Update Success',
                'body'=> $patient],
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
