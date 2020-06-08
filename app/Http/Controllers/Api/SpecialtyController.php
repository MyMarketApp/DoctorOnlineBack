<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Specialty;

class SpecialtyController extends Controller
{
    public function all(Request $request){
        try
        {
            $specialties = Specialty::all();
            
            return response()->json(['status' => true, 
                'message'=> 'Specialities',
                'body'=> $specialties],
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
