<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Model\ExamType;
use App\Model\MarkGrade;
use App\Model\StudentClass;
use App\Model\StudentMark;
use App\Model\Year;
use Illuminate\Http\Request;

class MarkSheetController extends Controller
{
   public function view(){

   		$data['years'] = Year::get();
		$data['classes'] = StudentClass::get();
		$data['exams'] = ExamType::get();
   		return view('pages.report.marksheet-create',$data);

   }

   public function result(Request $request){

   		$fail_count = StudentMark::where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('exam_type_id',$request->exam_type_id)->where('id_no',$request->id_no)->where('marks','<',33)->get()->count();

   		$resultExists = StudentMark::where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('exam_type_id',$request->exam_type_id)->where('id_no',$request->id_no)->first();
   		if ($resultExists == true) {
   			$allResults = StudentMark::with(['student','class','year','exam','subject'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('exam_type_id',$request->exam_type_id)->where('id_no',$request->id_no)->get();
   			return response()->json($allResults);
   			$mark_grades = MarkGrade::get();

   		}else{
   			return redirect()->back('error','Sorry This Criteria does not match!');
   		}


   }
}
