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

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/images', $filename);
            $data->image = $filename;
        }
        $data->save();
        return redirect()->route("storedata");
    }
    public function store()
    {
        $datastore = Students::paginate(5);
        return view("storedata", compact('datastore'));
    }
    public function edit($id)
    {
        $editdata = Students::find($id);
        return view('editstudent', compact('editdata'));
    }

    public function update(Request $request, $id)
    {
        $updatedata = Students::find($id);
        $updatedata->username = $request->uname;
        $updatedata->password = $request->pass;
        $updatedata->phone = $request->mobile;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/images', $filename);
            $updatedata->image = $filename;
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

    public function autocomplete(request $request)
    {
        $first = $request->input('searchbox');
        if ($request->ajax()) {
            $data = Students::where('username', 'LIKE', "%".$first."%")->get();
            $output = "";
            if (count($data) > 0 ){
                $output = '<ul class="" style="display : block; position:relative; z-nidex:1">';
                foreach ($data as $row){
                    $output .= '<li class="list-group-item">'.$row->username.'</li>';
                }
                $output .= "</ul>";
            }
            else{
                $output .= '<li class="list-group-item">No Data Found</li>';
            }
            return $output;
        }
        return view('storedata');
        // $autolist = Students::where('username', 'LIKE', "%$first%")->pluck('username');
        // $jsondatadecode = json_decode($autolist);
        // if (is_array($jsondatadecode)) {
        //     // echo 'hurrrey data came';exit;
        // }
        // return response()->json($jsondatadecode);
    }

    public function filterdata(request $request)
    {
        // $datastore = Students::all();
        $filterinput = $request->input("searchbox");
        $datastore = Students::where('username', 'LIKE', "%$filterinput%")->pluck('username');
        return response()->json($datastore);
        // return view('storedata', compact('datastore'));
    }


}









