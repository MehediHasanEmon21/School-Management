<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Model\EmployeeAttendance;
use App\User;
use Illuminate\Http\Request;
use PDF;

class AttendanceController extends Controller
{
    public function view(){

    	$data['employees'] = User::where('userType','employee')->get();

    	return view('pages.report.attendance-view',$data);

    }

    public function result(Request $request){

    	 $employee_id = $request->employee_id;

    	 if ($employee_id != '') {
    	 	$where[] = ['employee_id',$employee_id];
    	 }

    	 $date = date('Y-m',strtotime($request->date));

        if ($date != '') {
          $where[] = ['date','like',$date.'%'];
        }

        $singleAttendance = EmployeeAttendance::where($where)->first();

        if ($singleAttendance == true) {
        	$data['allAttendance'] = EmployeeAttendance::where($where)->get();
        	$data['absent_count'] = EmployeeAttendance::where($where)->where('attend_status','Absent')->get()->count();
        	$data['leave_count'] = EmployeeAttendance::where($where)->where('attend_status','Leave')->get()->count();

	        $pdf = PDF::loadView('pages.report.attendance-pdf', $data);
	        $pdf->SetProtection(['copy', 'print'], '', 'pass');
	        return $pdf->stream('document.pdf');

        }else{
        	return back()->with('error','Select the valid credential');
        }

    }
}
