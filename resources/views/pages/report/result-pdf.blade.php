<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Result Report</title>
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
						<td width="30%">
							
						</td>
						
					</tr>
					
				</table>
				
			</div>

			<div class="col-md-12 text-center">
				<h5 style="font-weight: bold; padding-top: -25px;">Result of {{ $allResults[0]->exam->name }}</h5>
			</div>
			

			<div class="col-md-12">
				<hr style="border: solid 1px; width: 100%; color: #000; margin-bottom: 0">
				<table border="0" cellpadding="1" cellspacing="2" width="100%">
					<tr>
					<td><strong>Year/Session: </strong>{{ $allResults[0]->year->name }}</td>
					<td></td>
					<td></td>
					<td><strong>Class: </strong>{{ $allResults[0]->class->name }}</td>
					</tr>
				</table>

			</div><br>

			<div class="col-md-12">

				
				
				<table border="1" width="100%">

					
				<tr>
					<th>SL</th>
					<th>Student Name</th>
					<th>ID No</th>
					<th>Letter Grade</th>
					<th>Grade Point</th>
					<th>Remark</th>
				</tr>

				@foreach($allResults as $key=>$value)
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{$value->student->name}}</td>
					<td>{{$value->student->id_no}}</td>
					<td>@if($value->fail > 0) F @else {{$value->letter_grade}} @endif
				
					</td>
					<td>@if($value->fail > 0) 0.00 @else {{$value->grade_point}} @endif</td>
					<td>@if($value->fail > 0) Fail @else {{ $value->remark }} @endif</td>
				</tr>
				@endforeach	
					

					

					
					
				</table><br>
				<i style="font-size: 10px; float: right;">Print Date: {{ date('d M Y') }}</i>
			</div><br>
			<div class="col-md-12">
				<table border="0" width="100%">
					<tr>
						<td width="30%"></td>
						<td width="40%"></td>
						<td width="30%">
							<hr style="border: solid 1px; width: 100%; color: #000; margin-bottom: 0">
							<p style="text-align: center;">Principal/Headmaster</p>
						</td> 
					</tr>
				</table>
			</div>


		</div>
		

		

	</div>
	
</body>
</html>