<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\UserGender;

class UserGenderController extends Controller
{
    public function all(Request $request){
        try
        {
            $users = UserGender::all();
            
            return response()->json(['status' => true, 
                'message'=> 'User Genders',
                'body'=> $users],
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
