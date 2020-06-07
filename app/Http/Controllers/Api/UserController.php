<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\User;

class UserController extends Controller
{
    public function add(Request $request){
        try
        {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->lastName = $request->lastName;
            $user->phone = $request->phone;
            $user->dni = $request->dni;
            $user->birthdate = $request->birthdate;
            $user->idGender = $request->idGender;
            $user->idType = $request->idType;
            $user->save();
            
            return response()->json(['status' => true, 
                'message'=> 'User Created',
                'body'=> $user],
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

    public function login(Request $request){
        try
        {
            $user = User::where('email',$request->email)
                        ->where('password',$request->password)
                        ->with(['type','gender'])->first();
            if($user)
            {
                return response()->json(['status' => true, 
                    'message'=> 'Login Success',
                    'body'=> $user],
                    200);
            }
            else {
                return response()->json(['status' => false, 
                    'message'=> 'Login Fail',
                    'body'=> $user],
                    200);
            }
            
        }
        catch(\Exception $e)
        {
            return response()->json(['status' => false,
                'message'=> 'Hubo un error',
                'body' => $e->getMessage()],
                500);
        }
    }

    public function verify($email){
        try
        {
            $user = User::where('email',$email)->with(['type','gender'])->first();
            if($user)
            {
                return response()->json(['status' => true, 
                    'message'=> 'User Found',
                    'body'=> $user],
                    200);
            }
            else {
                return response()->json(['status' => false, 
                    'message'=> 'User Not Found',
                    'body'=> $user],
                    200);
            }
            
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
            $user = User::where('email',$request->email)->first();
            $user->name = $request->name;
            $user->password = $request->password;
            $user->lastName = $request->lastName;
            $user->gender = $request->gender;
            $user->idType = $request->idType;

            return response()->json(['status' => true, 
                'message'=> 'Update Success',
                'body'=> $user],
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
