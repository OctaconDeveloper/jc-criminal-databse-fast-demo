<?php

namespace App\Http\Controllers;

use App\Models\Criminal;
use App\Models\OffenceCategory;
use App\Models\User;
use Illuminate\Http\Request;

class RouteController extends Controller
{ 
    public function Main(){ return view('welcome');}
    public function searchType($type){ $response = null; return view('search_type',compact(['type','response']));}
    public function searchPhoto(){$response = null; return view('search_photo' , compact('response'));}
    public function login(){ return view('login');}
    public function settings(){ return view('admin.settings');}
    public function error403() { return view('errors.403');}
    public function viewResult($tag_number){ $response = Criminal::whereTagNumber($tag_number)->with(['photo','offences.offence'])->first(); return view('view_result', compact('response'));  }

    

    public function Home(){ return view('admin.home');}
    public function superAddUser(){ return view('admin.add_users'); }
    public function superViewUser(){ $users = User::all();   return view('admin.users', compact('users',$users)); }
    public function superOffenceCategory(){ return view('admin.offence_category'); }
    public function superEditOffenceCategory(){ $cases = OffenceCategory::all();  return view('admin.edit_offence_category', compact('cases')); }
    public function AdminCriminalProfile(){ return view('admin.add_criminal_offence');  }
    public function AdminViewCriminalProfile(){ $criminal_profiles = Criminal::with(['photo','offences.offence'])->get(); return view('admin.view_criminal_profiles', compact('criminal_profiles'));  }
    

}
