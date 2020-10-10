<?php

namespace App\Http\Controllers\Admin\Employee;

use App\AssignStudent;
use App\Designation;
use App\DiscountStudent;
use App\Http\Controllers\Controller;
use App\Model\EmployeeAttendance;
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

class EmployeeAttendController extends Controller
{
    public function index(){

    	$data['allData'] = EmployeeAttendance::select('date')->groupBy('date')->get();
    	return view('pages.employee.attend.list',$data);

    }


    public function create(){
    	
        $data['employees'] = User::where('userType','employee')->get();
    	return view('pages.employee.attend.attendance_add',$data);
    }

    public function store(Request $request){


        EmployeeAttendance::where('date',date('Y-m-d',strtotime($request->date)))->delete();

       $employeeCount = count($request->employee_id);
       for ($i=0; $i < $employeeCount; $i++) {
           $attend_status = 'attend_status'.$i;
           $employee_attend = new EmployeeAttendance();
           $employee_attend->employee_id = $request->employee_id[$i];
           $employee_attend->date = date('Y-m-d',strtotime($request->date));
           $employee_attend->attend_status = $request->$attend_status;
           $employee_attend->save();
       }
      return redirect()->route('employee.attend.view')->with('success','Attendent Take Successfully');

 


    }

      public function edit($date){

        $data['editData'] = EmployeeAttendance::where('date',$date)->get();
        $data['employees'] = User::where('userType','employee')->get();
        return view('pages.employee.attend.attendance_add',$data);

    }

    public function detail($date){
         $data['editData'] = EmployeeAttendance::where('date',$date)->get();
         return view('pages.employee.attend.attendance_detail',$data);
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
