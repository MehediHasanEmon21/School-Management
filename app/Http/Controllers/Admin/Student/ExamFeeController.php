<?php

namespace App\Http\Controllers\Admin\Student;

use App\AssignStudent;
use App\DiscountStudent;
use App\Http\Controllers\Controller;
use App\Model\ExamType;
use App\Model\FeeCategoryAmount;
use App\Model\Group;
use App\Model\Shift;
use App\Model\StudentClass;
use App\Model\Year;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PDF;

class ExamFeeController extends Controller
{
    public function index(){
    	$data['years'] = Year::get();
	    $data['classes'] = StudentClass::get();
	    $data['exam_types'] = ExamType::get();
		return view('pages.student.exam_fee.view_exam_fee',$data);
    }

    public function getStudent(Request $request){
    	$year_id = $request->year_id;
    	$class_id = $request->class_id;

    	if ($year_id != '') {
    		$where[] = ['year_id','like',$year_id.'%'];
    	}

    	if ($class_id != '') {
    		$where[] = ['class_id','like',$class_id.'%'];
    	}

    	$allStudent  = AssignStudent::with(['discount_student'])->where($where)->get();

    	$html['thsource']  = '<th>SL</th>';
    	$html['thsource']  .= '<th>ID No</th>';
    	$html['thsource']  .= '<th>Student Name</th>';
    	$html['thsource']  .= '<th>Roll No</th>';
    	$html['thsource']  .= '<th>Exam Fee</th>';
    	$html['thsource']  .= '<th>Discount Amount</th>';
    	$html['thsource']  .= '<th>Fee (This Student)</th>';
    	$html['thsource']  .= '<th>Action</th>';

    	foreach ($allStudent as $key => $v) {
    		$registrationFee = FeeCategoryAmount::where('fee_category_id',3)->where('student_class_id',$v->class_id)->first();
    		$color = 'success';
    		$html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
    		$html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'</td>';
    		$html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
    		$html[$key]['tdsource'] .= '<td>'.$v->roll.'</td>';
    		$html[$key]['tdsource'] .= '<td>'.$registrationFee->amount.'</td>';
    		$html[$key]['tdsource'] .= '<td>'.$v['discount_student']['discount'].'%'.'</td>';

    		$originalFee = $registrationFee->amount;
    		$discount = $v['discount_student']['discount'];
    		$discountFee = $discount/100*$originalFee;
    		$finalFee = (float)$originalFee - (float)$discountFee;

    		$html[$key]['tdsource'] .= '<td>'.$finalFee.'Tk'.'</td>';
    		$html[$key]['tdsource'] .= '<td>'.'<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blank" href="'.route('student.exam.pay.slip').'?class_id='.$v->class_id.'&student_id='.$v->student_id.'&exam_fee_id='.$request->exam_type_id.'">Fee Slip</a>'.'</td>';

    	}

    	return response()->json(@$html);
    }

    public function paySlip(Request $request){

    	$student_id = $request->student_id;
    	$class_id = $request->class_id;
        $exam_fee_id = $request->exam_fee_id;
        $data['exam']  = ExamType::where('id',$exam_fee_id)->first()->name;
    	$data['detail'] = AssignStudent::with(['discount_student','student'])->where('student_id',$student_id)->where('class_id',$class_id)->first();
    	$pdf = PDF::loadView('pages.student.exam_fee.exam_fee_payslip_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');

    }
}
