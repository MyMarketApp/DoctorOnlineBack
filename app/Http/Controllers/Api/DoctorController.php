<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Doctor;
use Cartalyst\Stripe\Stripe;
use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
use MicrosoftAzure\Storage\Blob\Models\PublicAccessType; 
use MicrosoftAzure\Storage\Common\ServiceException;
use MicrosoftAzure\Storage\Common\ServicesBuilder;

class DoctorController extends Controller
{
    public function add(Request $request){
        try
        {

            $stripe = new \Stripe\StripeClient(env('STRIPE_API_KEY'));
            
            $product = $stripe->products->create([
                'name'        => $request->name . " " . $request->lastName,
                'description' => 'Consulta',
              ]);

            $priceChat = $stripe->prices->create([
                'product' => $product->id,
                'unit_amount' => $request->chatRate*100,
                'currency' => 'pen',
              ]);

            $priceCall = $stripe->prices->create([
                'product' => $product->id,
                'unit_amount' => $request->callRate*100,
                'currency' => 'pen',
              ]);

            $priceVideo = $stripe->prices->create([
                'product' => $product->id,
                'unit_amount' => $request->videoRate*100,
                'currency' => 'pen',
              ]);

            $doctor = new Doctor();
            $doctor->description = $request->description;
            $doctor->name = $request->name;
            $doctor->lastName = $request->lastName;
            $doctor->dni = $request->dni;
            $doctor->chatRate = $request->chatRate;
            $doctor->callRate = $request->callRate;
            $doctor->videoRate = $request->videoRate;
            $doctor->idGender = $request->idGender;
            $doctor->idUser = $request->idUser;
            $doctor->idSpecialty = $request->idSpecialty;
            $doctor->birthdate = $request->birthdate;
            $doctor->imageUrl = $request->imageUrl;
            $doctor->idChatStripePrice = $priceChat->id;
            $doctor->idCallStripePrice = $priceCall->id;
            $doctor->idVideoStripePrice = $priceVideo->id;
            $doctor->rne = $request->rne;
            $doctor->cmp = $request->cmp;
            $doctor->save();
            
            $file = $request->file('cv');
            if($file)
            {
                $Account = ServicesBuilder::getInstance()->createBlobService(env('AZURE_LARAVELES'));
                $Account->createBlockBlob(env('AZURE_CONTAINER_CV'),$doctor->id . "." . $file->getClientOriginalExtension(),fopen($file,'r'));
                $doctor->cv = "https://" . env('AZURE_STORAGE_ACCOUNT') . ".blob.core.windows.net/" . env('AZURE_CONTAINER_CV') . "/" . $doctor->id . "." . $file->getClientOriginalExtension();
                $doctor->save();
            }

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
            $doctor->idSpecialty = $request->idSpecialty;
            $doctor->birthdate = $request->birthdate;
            $doctor->imageUrl = $request->imageUrl;
            $doctor->cv = $priceChat->cv;
            $doctor->rne = $priceCall->rne;
            $doctor->cmp = $priceVideo->cmp;
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

    public function top(){
        try
        {
            $doctors = Doctor::with(['specialty','user'])->take(3)->get();
            
            return response()->json(['status' => true, 
                'message'=> 'Doctors Found',
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

    public function schedules($id){
        try
        {
            $doctor = Doctor::where('id',$id)->with(['schedules'])->first();

            return response()->json(['status' => true, 
                'message'=> 'Schedules Found',
                'body'=> $doctor->schedules],
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

    public function appointments($id){
        try
        {
            $doctor = Doctor::where('id',$id)->with(['appointments'])->first();

            return response()->json(['status' => true, 
                'message'=> 'Appointments Found',
                'body'=> $doctor->appointments],
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

    public function try(Request $request){
        try
        {
            $file = $request->file('cv');
            if($file)
            {
                $Account = ServicesBuilder::getInstance()->createBlobService(env('AZURE_LARAVELES'));
                $Account->createBlockBlob('cvs',$file->getClientOriginalName(),fopen($file,'r'));
                return "https://" . env('AZURE_STORAGE_ACCOUNT') . ".blob.core.windows.net/" . env('AZURE_CONTAINER_CV') . "/" . $file->getClientOriginalName();
            }
            return "buah";

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
