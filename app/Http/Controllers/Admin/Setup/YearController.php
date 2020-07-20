<?php

namespace App\Http\Controllers\Admin\Setup;

use App\Http\Controllers\Controller;
use App\Model\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    public function index(){

    	$years = Year::orderBy('id','DESC')->get();
    	return view('pages.setup.year.list',compact('years'));

    }

    public function create(){
    	
    	return view('pages.setup.year.create');
    }

    public function store(Request $request){
    	$this->validate($request,[
            'name' => 'required|unique:years'
        ]);
    	$year = new Year();
    	$year->name = $request->name;
    	$year->save();
    	return redirect()->route('student.year.view')->with('success','Year Added Successfully');
 


    }

      public function edit($id){

        $year = Year::find($id);
        return view('pages.setup.year.edit',compact('year'));

    }

    public function update(Request $request, $id){

    	$this->validate($request,[
            'name' => 'unique:years'
        ]);

        $year = Year::find($id);
        $year->name = $request->name;
        $year->save();
        return redirect()->route('student.year.view')->with('success','Year Updated Successfully');

    }

    public function delete($id){
        $year = Year::find($id);
        $year->delete();
        return redirect()->back()->with('success','Year Deleted Successfully');
    }
}
