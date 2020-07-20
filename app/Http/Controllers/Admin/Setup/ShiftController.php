<?php

namespace App\Http\Controllers\Admin\Setup;

use App\Http\Controllers\Controller;
use App\Model\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
     public function index(){

    	$shifts = Shift::orderBy('id','DESC')->get();
    	return view('pages.setup.shift.list',compact('shifts'));

    }

    public function create(){
    	
    	return view('pages.setup.shift.create');
    }

    public function store(Request $request){
    	$this->validate($request,[
            'name' => 'required|unique:shifts'
        ]);
    	$shift = new Shift();
    	$shift->name = $request->name;
    	$shift->save();
    	return redirect()->route('student.shift.view')->with('success','Shift Added Successfully');
 


    }

      public function edit($id){

        $shift = Shift::find($id);
        return view('pages.setup.shift.edit',compact('shift'));

    }

    public function update(Request $request, $id){

    	$this->validate($request,[
            'name' => 'unique:shifts'
        ]);

        $shift = Shift::find($id);
        $shift->name = $request->name;
        $shift->save();
        return redirect()->route('student.shift.view')->with('success','Shift Updated Successfully');

    }

    public function delete($id){
        $shift = Shift::find($id);
        $shift->delete();
        return redirect()->back()->with('success','Shift Deleted Successfully');
    }
}
