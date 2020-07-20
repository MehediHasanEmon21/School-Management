<?php

namespace App\Http\Controllers\Admin\Setup;

use App\Designation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index(){

    	$designations = Designation::orderBy('id','DESC')->get();
    	return view('pages.setup.designation.list',compact('designations'));

    }

    public function create(){
    	
    	return view('pages.setup.designation.create');
    }

    public function store(Request $request){
    	$this->validate($request,[
            'name' => 'required|unique:designations'
        ]);
    	$designation = new Designation();
    	$designation->name = $request->name;
    	$designation->save();
    	return redirect()->route('designation.view')->with('success','Designation Added Successfully');
 


    }

      public function edit($id){

        $designation = Designation::find($id);
        return view('pages.setup.designation.edit',compact('designation'));

    }

    public function update(Request $request, $id){

    	$this->validate($request,[
            'name' => 'unique:designations'
        ]);

        $designation = Designation::find($id);
        $designation->name = $request->name;
        $designation->save();
        return redirect()->route('designation.view')->with('success','Designation Updated Successfully');

    }

    public function delete($id){
        $designation = Designation::find($id);
        $designation->delete();
        return redirect()->back()->with('success','Designation Deleted Successfully');
    }
}
