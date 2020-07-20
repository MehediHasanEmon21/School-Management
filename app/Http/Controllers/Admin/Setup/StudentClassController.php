<?php

namespace App\Http\Controllers\Admin\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentClass;

class StudentClassController extends Controller
{
      public function index(){

    	$classes = StudentClass::orderBy('id','DESC')->get();
    	return view('pages.setup.class.list',compact('classes'));

    }

    public function create(){
    	
    	return view('pages.setup.class.create');
    }

    public function store(Request $request){
    	$this->validate($request,[
            'name' => 'required|unique:student_classes'
        ]);
    	$class = new StudentClass();
    	$class->name = $request->name;
    	$class->save();
    	return redirect()->route('student.class.view')->with('success','Class Added Successfully');
 


    }

      public function edit($id){

        $class = StudentClass::find($id);
        return view('pages.setup.class.edit',compact('class'));

    }

    public function update(Request $request, $id){

    	$this->validate($request,[
            'name' => 'unique:student_classes'
        ]);

        $class = StudentClass::find($id);
        $class->name = $request->name;
        $class->save();
        return redirect()->route('student.class.view')->with('success','Class Updated Successfully');

    }

    public function delete($id){
        $class = StudentClass::find($id);
        $class->delete();
        return redirect()->back()->with('success','Class Deleted Successfully');
    }
}
