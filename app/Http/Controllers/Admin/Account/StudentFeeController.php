<?php

namespace App\Http\Controllers\Admin\Account;

use App\AssignStudent;
use App\FeeCategory;
use App\Http\Controllers\Controller;
use App\Model\AccountStudentFee;
use App\Model\FeeCategoryAmount;
use App\Model\StudentClass;
use App\Model\Year;
use Illuminate\Http\Request;

class StudentFeeController extends Controller
{
    public function view(){

    	$data['allData'] = AccountStudentFee::all();
    	return view('pages.account.student.fee-view',$data);
    }

    public function add(){

    	$data['years'] = Year::orderBy('id','DESC')->get();
    	$data['classes'] = StudentClass::get();
    	$data['fee_categories'] = FeeCategory::orderBy('id','DESC')->get();
    	return view('pages.account.student.fee-add',$data);

    }

    public function getStudent(Request $request){

    	$date = date('Y-m',strtotime($request->date));

    	$allData = AssignStudent::with(['discount_student','student','class','year'])->where('class_id',$request->class_id)->where('year_id',$request->year_id)->orderBy('roll','ASC')->get();
    	foreach ($allData as $key => $data) {

    		$student_fee = FeeCategoryAmount::where('fee_category_id',$request->fee_category_id)->where('student_class_id',$data->class_id)->first();

    		$originalFee = $student_fee->amount;
    		$discount = $data->discount_student->discount;
    		$discountFee = (float)($discount/100*$originalFee);
    		$final = (float)$originalFee - (float)$discountFee;

    		$data->finalFee = $final;
    		$data->origiNalFee = $originalFee;
    		$data->discount = $discount;
    		$data->date = $date;
    		$data->fee_category_id = $request->fee_category_id;
    		$data->year_id = $request->year_id;
    		$data->class_id = $request->class_id;

    		$accountFeeExist = AccountStudentFee::where('class_id',$request->class_id)->where('year_id',$request->year_id)->where('fee_category_id',$request->fee_category_id)->where('student_id',$data->student_id)->where('date',$date)->first();
    		if (isset($accountFeeExist)) {
    			$data->selectStatus = 'checked';
    		}else{
    			$data->selectStatus = '';
    		}

    		
    	}

    	return response()->json($allData);
    	
    }

    public function Store(Request $request){

        $date = date('Y-m',strtotime($request->date));
        AccountStudentFee::where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('fee_category_id',$request->fee_category_id)->where('date',$date)->delete();
        $checkData = $request->checkManage;
        if ($checkData != null) {
            for ($i=0; $i < count($checkData) ; $i++) { 
                $data = new AccountStudentFee();

                $data->year_id = $request->year_id;
                $data->class_id = $request->class_id;
                $data->student_id = $request->student_id[$checkData[$i]];
                $data->fee_category_id = $request->fee_category_id;
                $data->date = $date;
                $data->amount = $request->amount[$checkData[$i]];
                $data->save();
            }
            
        }

        if (!empty(@data) || empty($checkData)) {
            return redirect()->route('acounts.fee.view')->with('success','Well done! Successfully updated');
        }else{
            return redirect()->back()->with('error', 'Sorry! Data not Saved');
        }

    }
}
