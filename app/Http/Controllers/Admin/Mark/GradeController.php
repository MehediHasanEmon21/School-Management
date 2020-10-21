<?php

namespace App\Http\Controllers\Admin\Mark;

use App\Http\Controllers\Controller;
use App\Model\MarkGrade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
   public function index(){
    	$data['allData'] = MarkGrade::get();
		return view('pages.mark.grade-marks-list',$data);
    }

    public function create(){

    	return view('pages.mark.grade-marks-add');

    }

    public function store(Request $request){

    	
       $mark_grade = new MarkGrade();
       $mark_grade->grade_name = $request->grade_name;
       $mark_grade->grade_point = $request->grade_point;
       $mark_grade->start_mark = $request->start_mark;
       $mark_grade->end_mark = $request->end_mark;
       $mark_grade->start_point = $request->start_point;
       $mark_grade->end_point = $request->end_point;
       $mark_grade->remark = $request->remark;
       $mark_grade->save();
            
         
        
    	return redirect()->route('grade.view')->with('success','Mark Grade Assign Successfully');

    }

    public function edit($id){
      
      $data['editData'] = MarkGrade::find($id);
      return view('pages.mark.grade-marks-add',$data);
    }

 

    public function update(Request $request,$id){

       $mark_grade = MarkGrade::find($id);
       $mark_grade->grade_name = $request->grade_name;
       $mark_grade->grade_point = $request->grade_point;
       $mark_grade->start_mark = $request->start_mark;
       $mark_grade->end_mark = $request->end_mark;
       $mark_grade->start_point = $request->start_point;
       $mark_grade->end_point = $request->end_point;
       $mark_grade->remark = $request->remark;
       $mark_grade->save();
            
         
        
      return redirect()->route('grade.view')->with('success','Mark Update Assign Successfully');
        
      




    }
}
