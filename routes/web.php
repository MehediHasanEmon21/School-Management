<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'],function(){

	Route::prefix('/user')->group(function(){

		Route::get('/list','Admin\UserController@all_user')->name('user.view');
		Route::get('/create','Admin\UserController@create')->name('user.create');
		Route::post('/store','Admin\UserController@store')->name('user.store');
		Route::get('/delete/{id}','Admin\UserController@delete')->name('user.destroy');

	});

	Route::prefix('/profile')->group(function(){

		Route::get('/view','Admin\ProfileController@view')->name('profile.view');
		Route::get('/edit/{id}','Admin\ProfileController@edit')->name('profile.edit');
		Route::post('/update/{id}','Admin\ProfileController@update')->name('profile.update');


	});


	
	Route::prefix('/setups')->group(function(){

		//class route
		Route::get('/student/class/list','Admin\Setup\StudentClassController@index')->name('student.class.view');
		Route::get('/student/class/create','Admin\Setup\StudentClassController@create')->name('student.class.create');
		Route::post('/student/class/store','Admin\Setup\StudentClassController@store')->name('student.class.store');
		Route::get('/student/class/edit/{id}','Admin\Setup\StudentClassController@edit')->name('student.class.edit');
		Route::post('/student/class/update/{id}','Admin\Setup\StudentClassController@update')->name('student.class.update');
		Route::get('/student/class/delete/{id}','Admin\Setup\StudentClassController@delete')->name('student.class.delete');

		//year route
		Route::get('/student/year/list','Admin\Setup\YearController@index')->name('student.year.view');
		Route::get('/student/year/create','Admin\Setup\YearController@create')->name('student.year.create');
		Route::post('/student/year/store','Admin\Setup\YearController@store')->name('student.year.store');
		Route::get('/student/year/edit/{id}','Admin\Setup\YearController@edit')->name('student.year.edit');
		Route::post('/student/year/update/{id}','Admin\Setup\YearController@update')->name('student.year.update');
		Route::get('/student/year/delete/{id}','Admin\Setup\YearController@delete')->name('student.year.delete');

		//group route
		Route::get('/student/group/list','Admin\Setup\GroupController@index')->name('student.group.view');
		Route::get('/student/group/create','Admin\Setup\GroupController@create')->name('student.group.create');
		Route::post('/student/group/store','Admin\Setup\GroupController@store')->name('student.group.store');
		Route::get('/student/group/edit/{id}','Admin\Setup\GroupController@edit')->name('student.group.edit');
		Route::post('/student/group/update/{id}','Admin\Setup\GroupController@update')->name('student.group.update');
		Route::get('/student/group/delete/{id}','Admin\Setup\GroupController@delete')->name('student.group.delete');

		//shift route
		Route::get('/student/shift/list','Admin\Setup\ShiftController@index')->name('student.shift.view');
		Route::get('/student/shift/create','Admin\Setup\ShiftController@create')->name('student.shift.create');
		Route::post('/student/shift/store','Admin\Setup\ShiftController@store')->name('student.shift.store');
		Route::get('/student/shift/edit/{id}','Admin\Setup\ShiftController@edit')->name('student.shift.edit');
		Route::post('/student/shift/update/{id}','Admin\Setup\ShiftController@update')->name('student.shift.update');
		Route::get('/student/shift/delete/{id}','Admin\Setup\ShiftController@delete')->name('student.shift.delete');

		//fee category route
		Route::get('/fee/category/list','Admin\Setup\FeeCategoryController@index')->name('student.fee.category.view');
		Route::get('/fee/category/create','Admin\Setup\FeeCategoryController@create')->name('student.fee.category.create');
		Route::post('/fee/category/store','Admin\Setup\FeeCategoryController@store')->name('student.fee.category.store');
		Route::get('/fee/category/edit/{id}','Admin\Setup\FeeCategoryController@edit')->name('student.fee.category.edit');
		Route::post('/fee/category/update/{id}','Admin\Setup\FeeCategoryController@update')->name('student.fee.category.update');
		Route::get('/fee/category/delete/{id}','Admin\Setup\FeeCategoryController@delete')->name('student.fee.category.delete');

		//fee category amount route
		Route::get('/fee/amount/list','Admin\Setup\FeeCategoryAmountController@index')->name('student.fee.amount.view');
		Route::get('/fee/amount/create','Admin\Setup\FeeCategoryAmountController@create')->name('student.fee.amount.create');
		Route::post('/fee/amount/store','Admin\Setup\FeeCategoryAmountController@store')->name('student.fee.amount.store');
		Route::get('/fee/amount/edit/{fee_category_id}','Admin\Setup\FeeCategoryAmountController@edit')->name('student.fee.amount.edit');
		Route::post('/fee/amount/update/{fee_category_id}','Admin\Setup\FeeCategoryAmountController@update')->name('student.fee.amount.update');
		Route::get('/fee/amount/details/{fee_category_id}','Admin\Setup\FeeCategoryAmountController@details')->name('student.fee.amount.details');


		//exam type route
		Route::get('/exam/type/list','Admin\Setup\ExamTypeController@index')->name('exam.type.view');
		Route::get('/exam/type/create','Admin\Setup\ExamTypeController@create')->name('exam.type.create');
		Route::post('/exam/type/store','Admin\Setup\ExamTypeController@store')->name('exam.type.store');
		Route::get('/exam/type/edit/{id}','Admin\Setup\ExamTypeController@edit')->name('exam.type.edit');
		Route::post('/exam/type/update/{id}','Admin\Setup\ExamTypeController@update')->name('exam.type.update');
		Route::get('/exam/type/delete/{id}','Admin\Setup\ExamTypeController@delete')->name('exam.type.delete');


		//year route
		Route::get('/subject/list','Admin\Setup\SubjectController@index')->name('subject.view');
		Route::get('/subject/create','Admin\Setup\SubjectController@create')->name('subject.create');
		Route::post('/subject/store','Admin\Setup\SubjectController@store')->name('subject.store');
		Route::get('/subject/edit/{id}','Admin\Setup\SubjectController@edit')->name('subject.edit');
		Route::post('/subject/update/{id}','Admin\Setup\SubjectController@update')->name('subject.update');
		Route::get('/subject/delete/{id}','Admin\Setup\SubjectController@delete')->name('subject.delete');

		//fee category amount route
		Route::get('/assign/subject/list','Admin\Setup\AssignSubjectController@index')->name('assign.subject.view');
		Route::get('/assign/subject/create','Admin\Setup\AssignSubjectController@create')->name('assign.subject.create');
		Route::post('/assign/subject/store','Admin\Setup\AssignSubjectController@store')->name('assign.subject.store');
		Route::get('/assign/subject/edit/{class_id}','Admin\Setup\AssignSubjectController@edit')->name('assign.subject.edit');
		Route::post('/assign/subject/update/{class_id}','Admin\Setup\AssignSubjectController@update')->name('assign.subject.update');
		Route::get('/assign/subject/details/{class_id}','Admin\Setup\AssignSubjectController@details')->name('assign.subject.details');

		//group route
		Route::get('/designation/list','Admin\Setup\DesignationController@index')->name('designation.view');
		Route::get('/designation/create','Admin\Setup\DesignationController@create')->name('designation.create');
		Route::post('/designation/store','Admin\Setup\DesignationController@store')->name('designation.store');
		Route::get('/designation/edit/{id}','Admin\Setup\DesignationController@edit')->name('designation.edit');
		Route::post('/designation/update/{id}','Admin\Setup\DesignationController@update')->name('designation.update');
		Route::get('/designation/delete/{id}','Admin\Setup\DesignationController@delete')->name('designation.delete');


	});

	Route::prefix('/student')->group(function(){

		//reg rout
		Route::get('/reg/list','Admin\Student\StudentRegController@index')->name('student.reg.view');
		Route::get('/reg/create','Admin\Student\StudentRegController@create')->name('student.reg.create');
		Route::post('/reg/store','Admin\Student\StudentRegController@store')->name('student.reg.store');
		Route::get('/reg/edit/{student_id}','Admin\Student\StudentRegController@edit')->name('student.reg.edit');
		Route::post('/reg/update/{student_id}','Admin\Student\StudentRegController@update')->name('student.reg.update');
		Route::get('/reg/delete/{id}','Admin\Student\StudentRegController@delete')->name('student.reg.delete');
		Route::get('/class/year/student','Admin\Student\StudentRegController@studentSearch')->name('student.class.wise.search');
		Route::get('/reg/promotion/{student_id}','Admin\Student\StudentRegController@promotion')->name('student.reg.promotion.edit');
		Route::post('/reg/promotion/{student_id}','Admin\Student\StudentRegController@promotionStore')->name('student.reg.promotion.update');
		Route::get('/reg/student/details/{student_id}','Admin\Student\StudentRegController@studentDetails')->name('student.reg.detail');


		//roll route
		Route::get('/roll/view/list','Admin\Student\RollController@index')->name('student.roll.view');
		Route::get('roll/get-student','Admin\Student\RollController@getStudent')->name('get.student.roll.generation');
		Route::post('/roll/store','Admin\Student\RollController@storeRoll')->name('student.roll.store');

		//registartion fee route
		Route::get('/reg/fee/list','Admin\Student\RegistrationFeeController@index')->name('student.reg.fee.view');
		Route::get('/reg/get-student','Admin\Student\RegistrationFeeController@getStudent')->name('student.reg.fee.get.student');
		Route::get('/reg/pay/slip','Admin\Student\RegistrationFeeController@paySlip')->name('student.reg.pay.slip');

		//mothly fee route
		Route::get('/monthly/fee/list','Admin\Student\MonthlyFeeController@index')->name('student.monthly.fee.view');
		Route::get('/monthly/get-student','Admin\Student\MonthlyFeeController@getStudent')->name('student.monthly.fee.get.student');
		Route::get('/monthly/pay/slip','Admin\Student\MonthlyFeeController@paySlip')->name('student.monthly.pay.slip');

		//exam fee route
		Route::get('/exam/fee/list','Admin\Student\ExamFeeController@index')->name('student.exam.fee.view');
		Route::get('/exam/get-student','Admin\Student\ExamFeeController@getStudent')->name('student.exam.fee.get.student');
		Route::get('/exam/pay/slip','Admin\Student\ExamFeeController@paySlip')->name('student.exam.pay.slip');


	});


	Route::prefix('/employee')->group(function(){

		//employee registration
		Route::get('/reg/list','Admin\Employee\EmployeeRegController@index')->name('employee.reg.view');
		Route::get('/reg/create','Admin\Employee\EmployeeRegController@create')->name('employee.reg.create');
		Route::post('/reg/store','Admin\Employee\EmployeeRegController@store')->name('employee.reg.store');
		Route::get('/reg/edit/{id}','Admin\Employee\EmployeeRegController@edit')->name('employee.reg.edit');
		Route::post('/reg/update/{id}','Admin\Employee\EmployeeRegController@update')->name('employee.reg.update');
		Route::get('/reg/details/{id}','Admin\Employee\EmployeeRegController@employeeDetails')->name('employee.reg.detail');


		//employee salary
		Route::get('/salary/list','Admin\Employee\EmployeeSalaryController@index')->name('employee.salary.view');
		Route::get('/salary/increment/{id}','Admin\Employee\EmployeeSalaryController@increment')->name('employee.salary.increment');
		Route::post('/salary/update/{id}','Admin\Employee\EmployeeSalaryController@update')->name('employee.salary.update');
		Route::get('/salary/details/{id}','Admin\Employee\EmployeeSalaryController@employeeSalaryDetails')->name('employee.salary.detail');

		//employee leave
		Route::get('leave/list','Admin\Employee\EmployeeLeaveController@index')->name('employee.leave.view');
		Route::get('leave/add','Admin\Employee\EmployeeLeaveController@create')->name('employee.leave.add');
		Route::post('leave/store','Admin\Employee\EmployeeLeaveController@store')->name('employee.leave.store');
		Route::get('leave/edit/{id}','Admin\Employee\EmployeeLeaveController@edit')->name('employee.leave.edit');
		Route::post('leave/update/{id}','Admin\Employee\EmployeeLeaveController@update')->name('employee.leave.update');

		//employee leave
		Route::get('attend/list','Admin\Employee\EmployeeAttendController@index')->name('employee.attend.view');
		Route::get('attend/add','Admin\Employee\EmployeeAttendController@create')->name('employee.attend.add');
		Route::post('attend/store','Admin\Employee\EmployeeAttendController@store')->name('employee.attend.store');
		Route::get('attend/edit/{date}','Admin\Employee\EmployeeAttendController@edit')->name('employee.attend.edit');
		Route::get('attend/detail/{date}','Admin\Employee\EmployeeAttendController@detail')->name('employee.attend.detail');

		//mothly fee route
		Route::get('/monthly/salary/list','Admin\Employee\MonthlySalaryController@index')->name('monthly.salary.view');
		Route::get('/monthly/get-employee','Admin\Employee\MonthlySalaryController@getEmployee')->name('monthly.salary.get.employee');
		Route::get('/monthly/pay/slip/{employee_id}','Admin\Employee\MonthlySalaryController@paySlip')->name('monthly.salary.pay.slip');


	});

	Route::prefix('/marks')->group(function(){

		Route::get('/view','Admin\Mark\MarksController@view')->name('marks.view');
		Route::post('/add','Admin\Mark\MarksController@add')->name('marks.add');
		Route::get('/edit','Admin\Mark\MarksController@edit')->name('marks.edit');
		Route::post('/update','Admin\Mark\MarksController@update')->name('marks.update');
		Route::get('/get-student-marks','Admin\Mark\MarksController@getMarks')->name('get-student-marks');
		


	});

	Route::get('/get-subject','Admin\DefaultController@getSubject')->name('get-subject');
	Route::get('/get-student','Admin\DefaultController@getStudent')->name('get-student');

	
});


