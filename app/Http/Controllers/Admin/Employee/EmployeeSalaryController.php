<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AssignStudent;
use App\Designation;
use App\DiscountStudent;
use App\Model\EmployeeSalaryLog;
use App\Model\Group;
use App\Model\Shift;
use App\Model\StudentClass;
use App\Model\Year;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PDF;

class EmployeeSalaryController extends Controller
{
    public function index(){

    	$data['users'] = User::where('userType','employee')->orderBy('id','DESC')->get();
    	return view('pages.employee.employee_salary.list',$data);

    }




      public function increment($id){

        $data['employee'] = User::find($id);
        return view('pages.employee.employee_salary.add_employee_salary',$data);

    }

    public function update(Request $request, $id){

            $user = User::find($id);
            $previous_salary = $user->salary;
            $present_salary = (float) ($user->salary) + (float)($request->increment_salary);
            $user->salary = $present_salary;
            $user->save();

            $esl = new EmployeeSalaryLog();
            $esl->employee_id = $id;
            $esl->previous_salary    = $previous_salary;
            $esl->increment_salary    = $request->increment_salary;
            $esl->present_salary    = $present_salary;
            $esl->effected_date    = date('Y-m-d',strtotime($request->effected_date));
            $esl->save();

           return redirect()->route('employee.salary.view')->with('success','Salary Increment Successfully');

    }




    

    public function employeeSalaryDetails($id){
        $data['detail'] = User::find($id);
        $data['salaries'] = EmployeeSalaryLog::where('employee_id',$data['detail']->id)->get();

        return view('pages.employee.employee_salary.detail',$data);


    }
}
