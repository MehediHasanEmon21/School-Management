<?php

namespace App\Http\Controllers\Admin\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

class EmployeeRegController extends Controller
{
    public function index(){

    	$data['users'] = User::where('userType','employee')->orderBy('id','DESC')->get();
    	return view('pages.employee.registration.list',$data);

    }


    public function create(){
    	
    	$data['designations'] = Designation::get();
    	return view('pages.employee.registration.create',$data);
    }

    public function store(Request $request){

    	


    	DB::transaction(function() use($request){

            $checkYear = date('Ym',strtotime($request->join_date));

            $employee = User::where('userType','employee')->orderBy('id','DESC')->first();
            if ($employee == null) {
                $firstReg = 0;
                $employeeId = $firstReg + 1;
                if ($employeeId < 10) {
                    $id_no = '000'.$employeeId;
                }elseif($employeeId < 100){
                    $id_no = '00'.$employeeId;
                }elseif($employeeId < 1000){
                    $id_no = '0'.$employeeId;
                }
            }else{
                $employee = User::where('userType','employee')->orderBy('id','DESC')->first()->id;
                $employeeId = $employee + 1;
                if ($employeeId < 10) {
                    $id_no = '000'.$employeeId;
                }elseif($employeeId < 100){
                    $id_no = '00'.$employeeId;
                }elseif($employeeId < 1000){
                    $id_no = '0'.$employeeId;
                }
            }

            $user = new User();
            $image = $request->file('image');

            if ($image) {
                $unique_str = Str::random(10);
                $ext=strtolower($image->getClientOriginalExtension());
                $image_name = $unique_str.'.'.$ext;
                $upload_path = 'public/assets/backend/images/employee/';
                $image_url = $upload_path.$image_name;
                $image->move($upload_path,$image_name);
                $user->image = $image_url;

            }else{
                $user->image = null;
            }
            $final_id_no = $checkYear.$id_no;
            $code = rand(0000,9999);
            $user->name = $request->name;
            $user->userType = 'employee';
            $user->password = bcrypt($code);
            $user->code = $code;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->religion = $request->religion;
            $user->salary = $request->salary;
            $user->designation_id = $request->designation_id;
            $user->id_no = $final_id_no;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            $user->join_date = date('Y-m-d',strtotime($request->join_date));
            $user->save();

            $employee_salary = new EmployeeSalaryLog();
            $employee_salary->employee_id = $user->id;
            $employee_salary->present_salary = $request->salary;
            $employee_salary->increment_salary = 0;
            $employee_salary->effected_date = date('Y-m-d',strtotime($request->join_date));
            $employee_salary->save();



        });
    	return redirect()->route('employee.reg.view')->with('success','Registration Done Successfully');

 


    }

      public function edit($id){

        $data['designations'] = Designation::get();
        $data['employee'] = User::find($id);
        return view('pages.employee.registration.edit',$data);

    }

    public function update(Request $request, $id){

 
   

            $user =  User::find($id);
            $image = $request->file('image');

            if ($image) {
                $old_image_path = DB::table('users')->where('id',$id)->first()->image;
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
                $unique_str = Str::random(10);
                $ext=strtolower($image->getClientOriginalExtension());
                $image_name = $unique_str.'.'.$ext;
                $upload_path = 'public/assets/backend/images/employee/';
                $image_url = $upload_path.$image_name;
                $image->move($upload_path,$image_name);
                $user->image = $image_url;

            }
            $user->name = $request->name;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->religion = $request->religion;
            $user->designation_id = $request->designation_id;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            $user->save();

           return redirect()->route('employee.reg.view')->with('success','Data Updated Successfully');

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
