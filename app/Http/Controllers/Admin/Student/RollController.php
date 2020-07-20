<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use App\AssignStudent;
use App\DiscountStudent;
use App\Model\Group;
use App\Model\Shift;
use App\Model\StudentClass;
use App\Model\Year;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PDF;

class RollController extends Controller
{
    public function index(){
    	$data['years'] = Year::get();
	    $data['classes'] = StudentClass::get();
		return view('pages.student.roll_generate.view_roll_generate',$data);
    }

    public function getStudent(Request $request){
    	$students = AssignStudent::with(['student'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
    	return response()->json($students);
    }

    public function storeRoll(Request $request){

    	$student_id = $request->student_id;
    	$class_id = $request->class_id;
    	$year_id = $request->year_id;

    	if ($student_id != NULL) {

    		for ($i=0; $i < count($student_id) ; $i++) { 
    			AssignStudent::where('year_id',$year_id)
	    			->where('class_id',$class_id)
	    			->where('student_id',$request->student_id[$i])
	    			->update(['roll' => $request->roll[$i]]);
    		}

    		
    	}else{
    		return redirect()->back()->with('error', 'Sorry you do not selected any class');
    	}

    	return redirect()->route('student.roll.view')->with('success', 'Well Done ! Successfully roll generate');

    }
}
