<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Patient;
use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
use MicrosoftAzure\Storage\Blob\Models\PublicAccessType; 
use MicrosoftAzure\Storage\Common\ServiceException;
use MicrosoftAzure\Storage\Common\ServicesBuilder;

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
            $patient = Patient::where('id',$request->id)->first();
            $patient->name = $request->name;
            $patient->lastName = $request->lastName;
            $patient->idGender = $request->idGender;
            $patient->idUser = $request->idUser;
            $patient->dni = $request->dni;
            $patient->birthdate = $request->birthdate;
            $patient->imageUrl = $request->imageUrl;
            $file = $request->file('photo');
            if($file)
            {
                $Account = ServicesBuilder::getInstance()->createBlobService(env('AZURE_LARAVELES'));
                $Account->createBlockBlob(env('AZURE_CONTAINER_PROFILE'),$patient->id . "." . $file->getClientOriginalExtension(),fopen($file,'r'));
                $patient->imageUrl = "https://" . env('AZURE_STORAGE_ACCOUNT') . ".blob.core.windows.net/" . env('AZURE_CONTAINER_PROFILE') . "/" . $patient->id . "." . $file->getClientOriginalExtension();
            }
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

    public function all(){
        try
        {
            $patients = Patient::all();
            
            return response()->json(['status' => true, 
                'message'=> 'Patients Found',
                'body'=> $patients],
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
