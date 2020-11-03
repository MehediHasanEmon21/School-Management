<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Model\AccountEmployeeSalary;
use App\Model\EmployeeAttendance;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function view(){

    	$data['allData'] = AccountEmployeeSalary::with(['user'])->get();
    	return view('pages.account.employee.salary-view',$data);
    }

    public function add(){

    	return view('pages.account.employee.salary-add');

    }

    public function getEmployee(Request $request){

        $date = date('Y-m',strtotime($request->date));

        if ($date != '') {
          $where[] = ['date','like',$date.'%'];
        }

        $data  = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->where($where)->get();

        foreach ($data as $key => $attend) {

              $totalAttend = EmployeeAttendance::where($where)->where('employee_id',$attend->employee_id)->get();
              $absentCount = count($totalAttend->where('attend_status','Absent')); 

              $salary = (float)$attend->user->salary;
              $salaryperday = (float)$salary/30;
              $totalSalaryminus = (float)$absentCount*(float)$salaryperday;
              $totalSalary = (float)$salary - (float)$totalSalaryminus;

              $attend->total = round($totalSalary,2);
              $attend->date = $date;

              $AccountEmployeeSalaryExists = AccountEmployeeSalary::where('date',$date)->where('employee_id',$attend->employee_id)->first();
              if (isset($AccountEmployeeSalaryExists)) {
                  $attend->selectStatus = 'checked';
              }else{
                $attend->selectStatus = '';
              }


          }

    	
          return response()->json($data);
    	
    	
    }

    public function Store(Request $request){


        AccountEmployeeSalary::where('date',$request->date)->delete();
        $checkData = $request->checkManage;
        if ($checkData != null) {
            for ($i=0; $i < count($checkData) ; $i++) { 
                $data = new AccountEmployeeSalary();
                $data->employee_id = $request->employee_id[$checkData[$i]];
                $data->date = $request->date;
                $data->amount = $request->amount[$checkData[$i]];
                $data->save();
            }
            
        }

        if (!empty(@data) || empty($checkData)) {
            return redirect()->route('acounts.salary.view')->with('success','Well done! Successfully updated');
        }else{
            return redirect()->back()->with('error', 'Sorry! Data not Saved');
        }

    }
}
