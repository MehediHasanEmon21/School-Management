<?php

namespace App\Http\Controllers\Admin\Setup;

use App\Http\Controllers\Controller;
use App\Model\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
        public function index(){

    	$exam_types = ExamType::get();
    	return view('pages.setup.exam_type.list',compact('exam_types'));

    }

    public function create(){
    	
    	return view('pages.setup.exam_type.create');
    }

    public function store(Request $request){
    	$this->validate($request,[
            'name' => 'required|unique:exam_types'
        ]);
    	$exam_type = new ExamType();
    	$exam_type->name = $request->name;
    	$exam_type->save();
    	return redirect()->route('exam.type.view')->with('success','ExamType Added Successfully');
 


    }

      public function edit($id){

        $exam_type = ExamType::find($id);
        return view('pages.setup.exam_type.edit',compact('exam_type'));

    }

    public function update(Request $request, $id){

    	$this->validate($request,[
            'name' => 'unique:exam_types'
        ]);

        $exam_type = ExamType::find($id);
        $exam_type->name = $request->name;
        $exam_type->save();
        return redirect()->route('exam.type.view')->with('success','ExamType Updated Successfully');

    }

    public function delete($id){
  
        $exam_type = ExamType::find($id);
        $exam_type->delete();
        return redirect()->back()->with('success','ExamType Deleted Successfully');
    }
}
