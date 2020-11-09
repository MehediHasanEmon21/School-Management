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

   public function resultView(){

      $data['years'] = Year::get();
      $data['classes'] = StudentClass::get();
      $data['exams'] = ExamType::get();
      return view('pages.report.result-view',$data);

   }

   public function resultGet(Request $request){

      $resultExists = StudentMark::where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('exam_type_id',$request->exam_type_id)->first();

      if ($resultExists == true) {

         $allResults = StudentMark::with(['student','class','year','exam'])->select('year_id','class_id','exam_type_id','student_id')->where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('exam_type_id',$request->exam_type_id)->groupBy('year_id')->groupBy('class_id')->groupBy('student_id')->groupBy('exam_type_id')->get();


         foreach ($allResults as $key => $value) {
            
           $singleResults = StudentMark::with(['student','class','year','exam'])->where('year_id',$value->year_id)->where('class_id',$value->class_id)->where('exam_type_id',$value->exam_type_id)->where('student_id',$value->student_id)->get();

             $total_grade = 0;

             foreach ($singleResults as $key => $singleResult) {

                  $grade_result = MarkGrade::where('start_mark', '<=', (int)$singleResult->marks)->where('end_mark','>=', (int)$singleResult->marks)->first();
                  $total_grade = (float)$total_grade + number_format((float)$grade_result->grade_point,2);
                 
             }

             $value->grade_point = round($total_grade/count($singleResults),2);
             $grade_result = MarkGrade::where('start_point', '<=', $total_grade/count($singleResults))->where('end_point','>=', $total_grade/count($singleResults))->first();
             $value->letter_grade = $grade_result->grade_name;
             $value->remark = $grade_result->remark;


         }

         return $allResults;
         
      }else{
         return redirect()->back('error','Sorry This Criteria does not match!');
      }



   }
}
