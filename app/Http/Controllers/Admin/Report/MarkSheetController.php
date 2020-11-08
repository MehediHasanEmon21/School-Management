<?php

namespace App\Http\Controllers\Admin\Report;

use App\AssignStudent;
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

   		$fail_count = StudentMark::where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('exam_type_id',$request->exam_type_id)->where('id_no',$request->id_no)->where('marks','<','33')->get()->count();

   		$resultExists = StudentMark::where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('exam_type_id',$request->exam_type_id)->where('id_no',$request->id_no)->first();
   		if ($resultExists == true) {
   			$allResults = StudentMark::with(['student','class','year','exam','assign_subject'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('exam_type_id',$request->exam_type_id)->where('id_no',$request->id_no)->get();
            $total_number = 0;
            $total_grade = 0;
            foreach ($allResults as $key => $res) {
               $res->roll = AssignStudent::where('class_id',$request->class_id)->where('year_id',$request->year_id)->where('student_id',$allResults[0]->student->id)->first()->roll;

               $grade_result = MarkGrade::where('start_mark', '<=', (int)$res->marks)->where('end_mark','>=', (int)$res->marks)->first();
               $res->grade_name = $grade_result->grade_name;
               $res->grade_point = number_format((float)$grade_result->grade_point,2);
               $total_number = (float)$total_number + (float)$res->marks;
               $total_grade = (float)$total_grade + number_format((float)$grade_result->grade_point,2);
            }

   			$mark_grades = MarkGrade::get();

            $grade_point_average = (float)$total_grade/(float)count($allResults);

            $letter_grade = MarkGrade::where('start_point', '<=', $grade_point_average)->where('end_point','>=', $grade_point_average)->first();


            return view('pages.report.marksheet-view',compact('fail_count','allResults','mark_grades','total_number','total_number','grade_point_average','letter_grade'));

   		}else{
   			return redirect()->back('error','Sorry This Criteria does not match!');
   		}


   }
}
