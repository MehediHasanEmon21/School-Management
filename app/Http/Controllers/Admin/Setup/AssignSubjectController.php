<?php

namespace App\Http\Controllers\Admin\Setup;

use App\AssignSubject;
use App\Http\Controllers\Controller;
use App\Model\FeeCategoryAmount;
use App\Model\StudentClass;
use App\Model\Subject;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    public function index(){

    	$assign_subjects = AssignSubject::with(['class'])->select('class_id')->groupBy('class_id')->get();
    	return view('pages.setup.assign_subject.list',compact('assign_subjects'));

    }

    public function create(){
    	
    	$student_classes = StudentClass::get();
    	$subjects = Subject::get();
    	return view('pages.setup.assign_subject.create',compact('subjects','student_classes'));
    }

    public function store(Request $request){

         $subject_id = count($request->subject_id);
         if ($subject_id !=NULL) {
             for ($i=0; $i < $subject_id; $i++) { 
               $assign_subject = new AssignSubject();
               $assign_subject->class_id = $request->class_id;
               $assign_subject->subject_id = $request->subject_id[$i];
               $assign_subject->full_mark = $request->full_mark[$i];
               $assign_subject->pass_mark = $request->pass_mark[$i];
               $assign_subject->subjective_mark = $request->subjective_mark[$i];
               $assign_subject->save();
            }
         }
        
    	return redirect()->route('assign.subject.view')->with('success','Assign Subject Added Successfully');
 


    }

      public function edit($class_id){

        $editDatas = AssignSubject::with(['class'])->where('class_id',$class_id)->get();
        $student_classes = StudentClass::get();
        $subjects = Subject::get();

        return view('pages.setup.assign_subject.edit',compact('editDatas','subjects','student_classes'));

    }

    public function update(Request $request, $class_id){

        if ($request->subject_id == NULL) {
            return redirect()->back()->with('error','Sorry You do not select any item');
        }else{
            AssignSubject::where('class_id',$class_id)->delete();
            $subject_id = count($request->subject_id);
             for ($i=0; $i < $subject_id; $i++) { 
               $assign_subject = new AssignSubject();
               $assign_subject->class_id = $request->class_id;
               $assign_subject->subject_id = $request->subject_id[$i];
               $assign_subject->full_mark = $request->full_mark[$i];
               $assign_subject->pass_mark = $request->pass_mark[$i];
               $assign_subject->subjective_mark = $request->subjective_mark[$i];
               $assign_subject->save();
            }
        

        }

        return redirect()->route('assign.subject.view')->with('success','Assign Subject Updated Successfully');

    }

    public function details($class_id){
        $details = AssignSubject::with(['class'])->where('class_id',$class_id)->get();
        return view('pages.setup.assign_subject.details',compact('details'));
    }
}
