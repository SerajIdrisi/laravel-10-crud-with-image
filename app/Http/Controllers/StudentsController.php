<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        return view("students");
    }
    public function create(Request $request)
    {
        $data = new Students();
        $data->username = $request->uname;
        $data->password = $request->pass;
        $data->phone = $request->mobile;
        
        if($request->hasFile('img'))
        {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'. $extension;
            $file->move('upload/images', $filename);
            $data->image=$filename;
        }
        $data->save();
        return redirect()->route("storedata");
    }
    public function store()
    {
        $datastore = Students::paginate(10);
        return view("storedata", compact('datastore'));
    }
    public function edit($id)
    {
        $editdata = Students::find($id);
        return view('editstudent', compact('editdata'));
    }

    public function update(Request $request, $id){
        $updatedata = Students::find($id);
        $updatedata->username = $request->uname;
        $updatedata->password = $request->pass;
        $updatedata->phone = $request->mobile;
        if($request->hasFile('img'))
        {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'. $extension;
            $file->move('upload/images', $filename);
            $updatedata->image=$filename;
        }
       
        $updatedata->save();
        return redirect()->route('storedata');

    }
     public function delete($id)
     {
        $deletedata = Students::find($id);
        $deletedata->delete();
        return redirect()->route('storedata');
     }
}   

 







