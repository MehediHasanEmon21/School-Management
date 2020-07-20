<?php

namespace App\Http\Controllers\Admin\Employee;

use App\AssignStudent;
use App\Designation;
use App\DiscountStudent;
use App\Http\Controllers\Controller;
use App\Model\EmployeeSalaryLog;
use App\Model\Group;
use App\Model\Shift;
use App\Model\StudentClass;
use App\Model\Year;
use App\User;
use Illuminate\Http\Request;
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

            $checkYear = date('Y',strtotime($request->join_date));

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

      public function edit($student_id){

        $data['student'] = AssignStudent::with(['student','discount_student'])->where('student_id',$student_id)->first();
        $data['years'] = Year::get();
        $data['classes'] = StudentClass::get();
        $data['groups'] = Group::get();
        $data['shifts'] = Shift::get();
        return view('pages.student.registration.edit',$data);

    }

    public function update(Request $request, $student_id){

    	   DB::transaction(function() use($request,$student_id){

            $user =  User::where('id',$student_id)->first();
            $image = $request->file('image');

            if ($image) {
                
                $user_info = DB::table('users')->where('id',$student_id)->first();
                $old_pic = $user_info->image;
                if (file_exists($old_pic)) {
                    unlink($old_pic);
                }
                $unique_str = Str::random(10);
                $ext=strtolower($image->getClientOriginalExtension());
                $image_name = $unique_str.'.'.$ext;
                $upload_path = 'public/assets/backend/images/student/';
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
            $user->dob = date('Y-m-d',strtotime($request->dob));
            $user->save();

            $assign_student =  AssignStudent::where('student_id',$student_id)->where('id',$request->id)->first();
            $assign_student->class_id = $request->class_id;
            $assign_student->year_id = $request->year_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();

            $discount_student =  DiscountStudent::where('assign_student_id',$request->id)->first();
            $discount_student->assign_student_id = $request->id;
            $discount_student->discount = $request->discount;
            $discount_student->save();



        });
        return redirect()->route('student.reg.view')->with('success','Data Updated Successfully');

    }

    public function promotion($student_id){

        $data['student'] = AssignStudent::with(['student','discount_student'])->where('student_id',$student_id)->first();
        $data['years'] = Year::get();
        $data['classes'] = StudentClass::get();
        $data['groups'] = Group::get();
        $data['shifts'] = Shift::get();
        return view('pages.student.registration.promotion',$data);
    }

    public function promotionStore(Request $request, $student_id){

            DB::transaction(function() use($request,$student_id){

            $user =  User::where('id',$student_id)->first();
            $image = $request->file('image');

            if ($image) {
                
                $user_info = DB::table('users')->where('id',$student_id)->first();
                $old_pic = $user_info->image;
                if (file_exists($old_pic)) {
                    unlink($old_pic);
                }
                $unique_str = Str::random(10);
                $ext=strtolower($image->getClientOriginalExtension());
                $image_name = $unique_str.'.'.$ext;
                $upload_path = 'public/assets/backend/images/student/';
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
            $user->dob = date('Y-m-d',strtotime($request->dob));
            $user->save();

            $assign_student = new AssignStudent();
            $assign_student->student_id = $student_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->year_id = $request->year_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();

            $discount_student =  DiscountStudent::where('assign_student_id',$request->id)->first();
            $discount_student->discount = $request->discount;
            $discount_student->save();



        });
        return redirect()->route('student.reg.view')->with('success','Student Promoted Successfully');

    }


    public function studentSearch(Request $request){

        $data['years'] = Year::get();
        $data['classes'] = StudentClass::get();
        $data['class_id'] = $request->class_id;
        $data['year_id'] = $request->year_id;

        $data['students'] = AssignStudent::where('class_id',$data['class_id'])->where('year_id',$data['year_id'])->orderBy('id','DESC')->get();
        return view('pages.student.registration.list',$data);

    }

    public function studentDetails($student_id){
        $data['detail'] = AssignStudent::with(['student','discount_student'])->where('student_id',$student_id)->first();
        $pdf = PDF::loadView('pages.student.registration.details', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');


    }
}
