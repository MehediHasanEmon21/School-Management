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
use PDF;
use Illuminate\Support\Str;

class MonthlySalaryController extends Controller
{
     public function index(){

    	$data['allData'] = EmployeeAttendance::select('date')->groupBy('date')->get();
    	return view('pages.employee.salary.salary-view',$data);

    }

    public function getEmployee(Request $request){

        $date = date('Y-m',strtotime($request->date));

        

        if ($date != '') {
          $where[] = ['date','like',$date.'%'];
        }

        

        $data  = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->where($where)->get();

        $html['thsource']  = '<th>SL</th>';
        $html['thsource']  .= '<th>Employee Name</th>';
        $html['thsource']  .= '<th>Basic Salary</th>';
        $html['thsource']  .= '<th>Salary (This Month)</th>';
        $html['thsource']  .= '<th>Action</th>';

        foreach ($data as $key => $attend) {
          $totalAttend = EmployeeAttendance::where($where)->where('employee_id',$attend->employee_id)->get();
          $absentCount = count($totalAttend->where('attend_status','Absent')); 
          $color = 'success';
          $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
          $html[$key]['tdsource'] .= '<td>'.$attend['user']['name'].'</td>';
          $html[$key]['tdsource'] .= '<td>'.$attend['user']['salary'].'</td>';

          $salary = (float)$attend['user']['salary'];
          $salaryperday = (float)$salary/30;
          $totalSalaryminus = (float)$absentCount*(float)$salaryperday;
          $totalSalary = (float)$salary - (float)$totalSalaryminus;

          $html[$key]['tdsource'] .= '<td>'.round($totalSalary,2).' Tk'.'</td>';
          $html[$key]['tdsource'] .= '<td>'.'<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blank" href="'.route('monthly.salary.pay.slip',$attend->employee_id).'">Pay Slip</a>'.'</td>';

      }

      return response()->json(@$html);

    }

    public function paySlip(Request $request, $employee_id){

      $id = EmployeeAttendance::where('employee_id',$employee_id)->first();
       $date = date('Y-m',strtotime($id->date));

       if ($date != '') {
          $where[] = ['date','like',$date.'%'];
        }
      $data['totalAttendGroupbyId'] = EmployeeAttendance::where($where)->where('employee_id',$id->employee_id)->get();
      $pdf = PDF::loadView('pages.employee.salary.employee-pay-slip', $data);
      $pdf->SetProtection(['copy', 'print'], '', 'pass');
      return $pdf->stream('document.pdf');

    }


    

 

     

    






    

    
}
