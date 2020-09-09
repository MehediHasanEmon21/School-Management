<?php

namespace App\Http\Controllers\Admin\Employee;

use App\AssignStudent;
use App\Designation;
use App\DiscountStudent;
use App\Http\Controllers\Controller;
use App\Model\EmployeeLeave;
use App\Model\EmployeeSalaryLog;
use App\Model\Group;
use App\Model\LeavePurpose;
use App\Model\Shift;
use App\Model\StudentClass;
use App\Model\Year;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PDF;

class EmployeeLeaveController extends Controller
{
    public function index(){

    	$data['allData'] = EmployeeLeave::orderBy('id','DESC')->get();
    	return view('pages.employee.employee_leave.list',$data);

    }


    public function create(){
    	
    	$data['leave_purposes'] = LeavePurpose::get();
        $data['employees'] = User::where('userType','employee')->get();
    	return view('pages.employee.employee_leave.add_employee_leave',$data);
    }

    public function store(Request $request){

        if($request->leave_purpose_id == 0){

            $lp = new LeavePurpose();
            $lp->name = $request->name;
            $lp->save();
            $leave_purpose_id = $lp->id;

        }else{
            $leave_purpose_id = $request->leave_purpose_id;
        }

        $el = new EmployeeLeave();
        $el->employee_id = $request->employee_id;
        $el->leave_purpose_id = $leave_purpose_id;
        $el->start_date = date('Y-m-d',strtotime($request->start_date));
        $el->end_date = date('Y-m-d',strtotime($request->end_date));
        $el->save();
    	return redirect()->route('employee.leave.view')->with('success','Data Inserted Successfully');

 


    }

      public function edit($id){

        $data['editData'] = EmployeeLeave::find($id);
        $data['leave_purposes'] = LeavePurpose::get();
        $data['employees'] = User::where('userType','employee')->get();
        return view('pages.employee.employee_leave.add_employee_leave',$data);

    }

    public function update(Request $request, $id){


        if($request->leave_purpose_id == 0){

        $lp = new LeavePurpose();
        $lp->name = $request->name;
        $lp->save();
        $leave_purpose_id = $lp->id;

        }else{
            $leave_purpose_id = $request->leave_purpose_id;
        }

        $el = EmployeeLeave::find($id);
        $el->employee_id = $request->employee_id;
        $el->leave_purpose_id = $leave_purpose_id;
        $el->start_date = date('Y-m-d',strtotime($request->start_date));
        $el->end_date = date('Y-m-d',strtotime($request->end_date));
        $el->save();
        return redirect()->route('employee.leave.view')->with('success','Data Update Successfully');


    }

    public function promotion($student_id){

        $data['student'] = AssignStudent::with(['student','discount_student'])->where('student_id',$student_id)->first();
        $data['years'] = Year::get();
        $data['classes'] = StudentClass::get();
        $data['groups'] = Group::get();
        $data['shifts'] = Shift::get();
        return view('pages.student.registration.promotion',$data);
    }



    

    public function employeeDetails($id){
        $data['detail'] = User::find($id);
        $pdf = PDF::loadView('pages.employee.registration.details', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');


    }
}
