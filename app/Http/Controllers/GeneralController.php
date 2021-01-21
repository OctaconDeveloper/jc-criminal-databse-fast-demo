<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveOffenceCategoryRequest;
use App\Models\OffenceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GeneralController extends Controller
{
    
    public function saveoffencetype(SaveOffenceCategoryRequest $request)
    {
        $data["name"] = $request->offence_title;
        $data["slug"] = Str::slug($request->offence_title);
        $data["description"]= $request->offence_description;
        $save = OffenceCategory::create($data);
        return redirect()->back()->with('message', 'New Offence Category Added');
    } 

    public function removeOffenceCategory(OffenceCategory $id)
    {
        $id->delete();
        return redirect()->back();
    }
 
}
