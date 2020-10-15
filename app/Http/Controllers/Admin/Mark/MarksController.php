<?php

namespace App\Http\Controllers\Admin\Mark;

use App\AssignStudent;
use App\DiscountStudent;
use App\Http\Controllers\Controller;
use App\Model\ExamType;
use App\Model\Group;
use App\Model\Shift;
use App\Model\StudentClass;
use App\Model\StudentMark;
use App\Model\Year;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PDF;

class MarksController extends Controller
{
    public function view(){
    	$data['years'] = Year::get();
		$data['classes'] = StudentClass::get();
		$data['exams'] = ExamType::get();
		return view('pages.mark.mark-add',$data);
    }

    public function add(Request $request){

    	$student_id = count($request->student_id);
         if ($student_id !=NULL) {
             for ($i=0; $i < $student_id; $i++) { 
               $mark = new StudentMark();
               $mark->year_id = $request->year_id;
               $mark->class_id = $request->class_id;
               $mark->assign_subject_id = $request->assign_subject_id;
               $mark->exam_type_id = $request->exam_type_id;
               $mark->student_id = $request->student_id[$i];
               $mark->id_no = $request->id_no[$i];
               $mark->marks = $request->marks[$i];
               $mark->save();
            }
         }
        
    	return redirect()->back()->with('success','Mark Assign Successfully');

    }

    public function edit(){
      $data['years'] = Year::get();
      $data['classes'] = StudentClass::get();
      $data['exams'] = ExamType::get();
      return view('pages.mark.mark-edit',$data);
    }

    public function getMarks(Request $request){


      $class_id = $request->class_id;
      $year_id = $request->year_id;
      $assign_subject_id = $request->assign_subject_id;
      $exam_type_id = $request->exam_type_id;

      $allData = StudentMark::with(['student'])->where('class_id',$class_id)->where('year_id',$year_id)->where('assign_subject_id',$assign_subject_id)->where('exam_type_id',$exam_type_id)->get();
      return response()->json($allData);

    }

    public function update(Request $request){

      $class_id = $request->class_id;
      $year_id = $request->year_id;
      $assign_subject_id = $request->assign_subject_id;
      $exam_type_id = $request->exam_type_id;

      StudentMark::where('class_id',$class_id)->where('year_id',$year_id)->where('assign_subject_id',$assign_subject_id)->where('exam_type_id',$exam_type_id)->delete();

        $student_id = count($request->student_id);
         if ($student_id !=NULL) {
             for ($i=0; $i < $student_id; $i++) { 
               $mark = new StudentMark();
               $mark->year_id = $request->year_id;
               $mark->class_id = $request->class_id;
               $mark->assign_subject_id = $request->assign_subject_id;
               $mark->exam_type_id = $request->exam_type_id;
               $mark->student_id = $request->student_id[$i];
               $mark->id_no = $request->id_no[$i];
               $mark->marks = $request->marks[$i];
               $mark->save();
            }
         }
        
      return redirect()->back()->with('success','Mark Update Successfully');




    }
}
