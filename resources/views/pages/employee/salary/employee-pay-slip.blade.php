<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Monthly Salary</title>
	  <link rel="stylesheet" href="{{asset('public/assets/backend')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<style type="text/css">
		
		table {
			border-collapse: collapse;
		}

		h2, h3 {
			margin: 0;
			padding: 0;
		}

		.table {
			width: 100%;
			margin-bottom: 1rem;
			background-color: transparent;
		}

		.table th, .table td {
			padding: 0.75rem;
			vertical-align: top;
			border-top: 1px solid #dee2e6;
		}

		.table thead th {
			vertical-align: bottom;
			border-top: 1px solid #dee2e6;
		}

		.table tbody + tbody {
			border-top: 2px solid #dee2e6;
		}

		.table {
			background-color: #fff;
		}

		.table-bordered {
			border: 1px solid #dee2e6;
		}

		.table-bordered th, .table-bordered td {
			border: 1px solid #dee2e6;
		}

		.table-bordered thead th, .table-bordered thead td {
			border-bottom-width: 2px;
		}

		.text-center {
			text-align: center;
		}

		.text-right {
			text-align: right;
		}

		table tr td {
			padding: 5px;
		}


		.table-bordered thead th, .table-bordered th, .table-bordered td {
			border: 1px solid black !important;
		}

		.table-bordered thead th{
			background-color: #cacaca;
		}

	</style>
</head>
<body>

	<div class="container">
		
		<div class="row">

			@php

			$date = date('Y-m',strtotime($totalAttendGroupbyId[0]->date));

        

	        if ($date != '') {
	          $where[] = ['date','like',$date.'%'];
	        }

	       

	      $totalAttend = App\Model\EmployeeAttendance::where($where)->where('employee_id',$totalAttendGroupbyId[0]->employee_id)->get();
	      $singleSalary = (float)$totalAttendGroupbyId[0]['user']['salary'];
          $salaryperday = (float)$singleSalary/30;
          $absentCount = count($totalAttend->where('attend_status','Absent')); 
          $totalSalaryminus = (float)$absentCount*(float)$salaryperday;
          $totalSalary = (float)$singleSalary - (float)$totalSalaryminus;

 
			@endphp
			
			<div class="col-md-12">
				<table width="100%">

					<tr>
						<td width="30%" class="text-center">
							<img src="{{ URL::to('public/assets/backend/images/sc.jpg') }}" style="width: 80px; height: 80px">
						</td>
						<td width="40%" class="text-center">
							<h4><strong>ABC School</strong></h4>
							<h5><strong>Dhaka, Notunbazar</strong></h5>
							<h6><strong>www.school.com</strong></h6>
						</td>
						<td class="text-center" width="30%"> 
							<img src="{{ URL::to($totalAttendGroupbyId[0]->user->image) }}" style="width: 80px; height: 80px">
						</td>
					</tr>
					
				</table>
				
			</div>

			<div class="col-md-12 text-center">
				<h5 style="font-weight: bold; padding-top: -25px;">Exam Fee Pay Slip</h5>
			</div>

			<div class="col-md-12">
				
				<table border="1" width="100%">
					

					<tr>
						<td width="50%">Employee Name</td>
						<td>{{$totalAttendGroupbyId[0]->user->name}}</td>
					</tr>

					

					<tr>
						<td width="50%">Basic Salary</td>
						<td>{{$totalAttendGroupbyId[0]->user->salary}}</td>
					</tr>

					<tr>
						<td width="50%">Total Absent for this Month</td>
						<td>{{$absentCount}}</td>
					</tr>

					<tr>
						<td width="50%">Month</td>
						<td>{{date('M Y',strtotime($totalAttendGroupbyId[0]->date))}}</td>
					</tr>

					<tr>
						<td width="50%">Salary for this Month</td>
						<td>{{round($totalSalary,2)}}</td>
					</tr>

					
					
				</table>
				<i style="font-size: 10px; float: right;">Print Date: {{ date('d M Y') }}</i>
			</div><br>
			<div class="col-md-12">
				<table border="0" width="100%">
					<tr>
						<td width="30%"></td>
						<td width="30%"></td>
						<td width="40%">
							<hr style="border: solid 1px; width: 60%; color: #000; margin-bottom: 0">
							<p class="text-center">Principal/Headmaste</p>
						</td> 
					</tr>
				</table>
			</div>


		</div>
		<hr style="border:dashed 1px; width: 96%; color: #DDD; margin-bottom: 30px;">

			<div class="row">

			@php

			$date = date('Y-m',strtotime($totalAttendGroupbyId[0]->date));

        

	        if ($date != '') {
	          $where[] = ['date','like',$date.'%'];
	        }

	       

	      $totalAttend = App\Model\EmployeeAttendance::where($where)->where('employee_id',$totalAttendGroupbyId[0]->employee_id)->get();
	      $singleSalary = (float)$totalAttendGroupbyId[0]['user']['salary'];
          $salaryperday = (float)$singleSalary/30;
          $absentCount = count($totalAttend->where('attend_status','Absent')); 
          $totalSalaryminus = (float)$absentCount*(float)$salaryperday;
          $totalSalary = (float)$singleSalary - (float)$totalSalaryminus;

 
			@endphp
			
			<div class="col-md-12">
				<table width="100%">

					<tr>
						<td width="30%" class="text-center">
							<img src="{{ URL::to('public/assets/backend/images/sc.jpg') }}" style="width: 80px; height: 80px">
						</td>
						<td width="40%" class="text-center">
							<h4><strong>ABC School</strong></h4>
							<h5><strong>Dhaka, Notunbazar</strong></h5>
							<h6><strong>www.school.com</strong></h6>
						</td>
						<td class="text-center" width="30%"> 
							<img src="{{ URL::to($totalAttendGroupbyId[0]->user->image) }}" style="width: 80px; height: 80px">
						</td>
					</tr>
					
				</table>
				
			</div>

			<div class="col-md-12 text-center">
				<h5 style="font-weight: bold; padding-top: -25px;">Exam Fee Pay Slip</h5>
			</div>

			<div class="col-md-12">
				
				<table border="1" width="100%">
					

					<tr>
						<td width="50%">Employee Name</td>
						<td>{{$totalAttendGroupbyId[0]->user->name}}</td>
					</tr>

					

					<tr>
						<td width="50%">Basic Salary</td>
						<td>{{$totalAttendGroupbyId[0]->user->salary}}</td>
					</tr>

					<tr>
						<td width="50%">Total Absent for this Month</td>
						<td>{{$absentCount}}</td>
					</tr>

					<tr>
						<td width="50%">Month</td>
						<td>{{date('M Y',strtotime($totalAttendGroupbyId[0]->date))}}</td>
					</tr>

					<tr>
						<td width="50%">Salary for this Month</td>
						<td>{{round($totalSalary,2)}}</td>
					</tr>

					
					
				</table>
				<i style="font-size: 10px; float: right;">Print Date: {{ date('d M Y') }}</i>
			</div><br>
			<div class="col-md-12">
				<table border="0" width="100%">
					<tr>
						<td width="30%"></td>
						<td width="30%"></td>
						<td width="40%">
							<hr style="border: solid 1px; width: 60%; color: #000; margin-bottom: 0">
							<p class="text-center">Principal/Headmaste</p>
						</td> 
					</tr>
				</table>
			</div>


		</div>

		

	</div>
	
</body>
</html>