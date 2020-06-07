<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\UserType;

class UserTypeController extends Controller
{
    public function all(Request $request){
        try
        {
            $users = UserType::all();
            
            return response()->json(['status' => true, 
                'message'=> 'User Types',
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
