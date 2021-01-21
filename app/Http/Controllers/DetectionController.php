<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCriminalRequest;
use App\Models\Criminal;
use App\Models\CriminalOffence;
use App\Models\CriminalPhoto;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class DetectionController extends Controller
{
    protected $detection_url;
    protected $api_key;

    public function __construct()
    {
        $this->detection_url = env('LUXARD_URL');
        $this->api_key = env('LUXARD_API_KEY');
    }

    public function savecriminal(SaveCriminalRequest $request)
    {
        DB::beginTransaction();
        try { 
            $criminal_record = $request->only([ 
                "last_name",
                "other_names",
                "sex",
                "phone_number",
                "date_of_birth",
                "lga_of_origin",
                "state_of_origin",
                "address"
                ]); 
            $criminal_record["tag_number"] = $this->getTagNumber();
            $criminal =  Criminal::create($criminal_record);
            $criminal_id = $criminal->id;
            $image =  $this->processImage($request);
            $image_path = $image['url'];
            $image_id = $image['id'];
            $imageData = [
                "image_path" => $image_path,
                "image_id" => $image_id,
                "criminal_id" => $criminal_id 
            ];
            CriminalPhoto::create($imageData); 
            $this->saveOffences($request->offences, $criminal_id);
            DB::commit();
            return redirect()->back()->with('message','Profile Created');
        }
        catch(Error $e)
        {
            DB::rollBack();
            return redirect()->back()->withErrors(['Error creating profile']);
        }

       
    }
    private function getTagNumber()
    {
        $gt = "ABCDEFGHIJKabcdefghijk";
        $tg = rand(40,9000) * time();
        $tag = str_shuffle($gt.$tg);
        return sprintf("%0.9s", str_shuffle($tag));
    }

    private function processImage($request)
    { 
        $name = str_replace(" ","_",$request->last_name)."_".str_replace(" ","_",$request->other_names);
        $file = $this->processUploadImage($request);
        $response = $this->makeRequest($file, $name);
        return $response;
    }
 
    private function saveOffences($offences, $criminal_id)
    { 
        foreach($offences as $offence)
        { 
            CriminalOffence::create([
                'criminal_id' => $criminal_id,
                'offence_category_id' => $offence
            ]);
        }
    }
    private function processUploadImage($request)
    {
        $name = str_replace(" ","_",$request->last_name)."_".str_replace(" ","_",$request->other_names);
        $path = $_FILES['profile_picture']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $filename =  str_replace(" ","_", strtolower($name)). '.'.$ext ;
        $filepath = public_path('criminal_photo/');
        move_uploaded_file($_FILES['profile_picture']['tmp_name'], $filepath.$filename);
        return $new_image = 'criminal_photo/'.$filename;
    }
  

    private function  makeRequest($file, $name)
    {
        $photo = fopen($file, 'r');
        $response =  Http::withHeaders([
                        'token' => $this->api_key,
                    ])->attach(
                        'photo', $photo, 'photo.jpg'
                    )->post('https://api.luxand.cloud/subject/v2', [
                        'name' => $name,
                        "store" => 1
                    ]);
        return $response->json();
    }

    public function removeProfile(Criminal $id)
    {
        CriminalPhoto::whereCriminalId($id)->delete();
        CriminalOffence::whereCriminalId($id)->delete();
        Criminal::find($id)->delete();
    }

    public function searchbyPhone(Request $request)
    {
        $request->validate(['phone_number'=>'required|numeric']);
        $response = Criminal::wherePhoneNumber($request->phone_number)->with(['photo','offences.offence'])->get();
        $type="phone";
        if($response)
        {
            return view('search_type', compact(['response','type']));
        }
        else 
        {
            return redirect()->back()->withErrors(['No record found']);
        }
    }

    public function searchbyName(Request $request)
    {
        $request->validate(['name'=>'required|string']);
       $response = Criminal::where('last_name', 'like', "%{$request->name}%")
        ->orWhere('other_names', 'like', "%{$request->name}%")
        ->with(['photo','offences.offence'])
        ->get();
        $type="name";
        if($response)
        {
            return view('search_type', compact(['response','type']));
        }
        else 
        {
            return redirect()->back()->withErrors(['No record found']);
        }
    }

    public function searchbyPhoto(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required'
        ]);
        $response = [];
        $result = $this->verifyImage($request);
        if(!empty($result))
        {
            foreach($result as $res)
            {
                $response[] = Criminal::find($res)->with(['photo','offences.offence'])->first();
            }
            return view('search_photo', compact('response'));
        }
        else 
        {
            return redirect()->back()->withErrors(['No record found']);
        }

    }

    private function verifyImage($request)
    {
        $file = $this->processUploadImage2($request);
        $photos = CriminalPhoto::all();
        $data = [];
        foreach($photos as $photo)
        {
            $response = $this->checkImage($photo->image_id, $file);
            if($response['message'] === 'verified' )
            {
                $data[] = $photo->criminal_id;
            }
        }

        return $data;
    }

    private function processUploadImage2($request)
    {
        $name = 'to_verify';
        $path = $_FILES['profile_picture']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $filename =  str_replace(" ","_", strtolower($name)). '.'.$ext ;
        $filepath = public_path('criminal_verify/');
        move_uploaded_file($_FILES['profile_picture']['tmp_name'], $filepath.$filename);
        return  'criminal_verify/'.$filename;
    } 

    private function checkImage($id, $file)
    {
        $photo = fopen($file, 'r');
        $response =  Http::withHeaders([
                        'token' => $this->api_key,
                    ])->attach(
                        'photo', $photo, 'photo.jpg'
                    )->post('https://api.luxand.cloud/photo/verify/'.$id);
        return $response->json();

    }

}
