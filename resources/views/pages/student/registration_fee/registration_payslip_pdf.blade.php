<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration Pay Slip</title>
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
						<td class="text-center" width="30%"> 
							<img src="{{ URL::to($detail->student->image) }}" style="width: 80px; height: 80px">
						</td>
					</tr>
					
				</table>
				
			</div>

			<div class="col-md-12 text-center">
				<h5 style="font-weight: bold; padding-top: -25px;">Ragestration Pay Slip</h5>
			</div>

			<div class="col-md-12">
				@php

					$registrationFee = App\Model\FeeCategoryAmount::where('fee_category_id',5)->where('student_class_id',$detail->class_id)->first();
					$originalFee = $registrationFee->amount;
		    		$discount = $detail['discount_student']['discount'];
		    		$discountFee = $discount/100*$originalFee;
		    		$finalFee = (float)$originalFee - (float)$discountFee;

				@endphp
				<table border="1" width="100%">
					

					<tr>
						<td width="50%">Id No</td>
						<td>{{$detail->student->id_no}}</td>
					</tr>

					<tr>
						<td width="50%">Roll</td>
						<td>{{$detail->roll}}</td>
					</tr>

					<tr>
						<td width="50%">Student Name</td>
						<td>{{$detail->student->name}}</td>
					</tr>

					<tr>
						<td width="50%">Father's Name</td>
						<td>{{$detail->student->fname}}</td>
					</tr>

					<tr>
						<td width="50%">Mother's Name</td>
						<td>{{$detail->student->mname}}</td>
					</tr>

					<tr>
						<td width="50%">Year</td>
						<td>{{$detail->year->name}}</td>
					</tr>

					<tr>
						<td width="50%">Class</td>
						<td>{{$detail->class->name}}</td>
					</tr>

					<tr>
						<td width="50%">Registration Fee</td>
						<td>{{$originalFee}}</td>
					</tr>

					<tr>
						<td width="50%">Discount Fee</td>
						<td>{{$discount}} %</td>
					</tr>

					<tr>
						<td width="50%">Fee (This Student)</td>
						<td>{{$finalFee}} Tk</td>
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
							<img src="{{ URL::to($detail->student->image) }}" style="width: 80px; height: 80px">
						</td>
					</tr>
					
				</table>
				
			</div>

			<div class="col-md-12 text-center">
				<h5 style="font-weight: bold; padding-top: -25px;">Ragestration Pay Slip</h5>
			</div>

			<div class="col-md-12">
				@php

					$registrationFee = App\Model\FeeCategoryAmount::where('fee_category_id',5)->where('student_class_id',$detail->class_id)->first();
					$originalFee = $registrationFee->amount;
		    		$discount = $detail['discount_student']['discount'];
		    		$discountFee = $discount/100*$originalFee;
		    		$finalFee = (float)$originalFee - (float)$discountFee;

				@endphp
				<table border="1" width="100%">
					

					<tr>
						<td width="50%">Id No</td>
						<td>{{$detail->student->id_no}}</td>
					</tr>

					<tr>
						<td width="50%">Roll</td>
						<td>{{$detail->roll}}</td>
					</tr>

					<tr>
						<td width="50%">Student Name</td>
						<td>{{$detail->student->name}}</td>
					</tr>

					<tr>
						<td width="50%">Father's Name</td>
						<td>{{$detail->student->fname}}</td>
					</tr>

					<tr>
						<td width="50%">Mother's Name</td>
						<td>{{$detail->student->mname}}</td>
					</tr>

					<tr>
						<td width="50%">Year</td>
						<td>{{$detail->year->name}}</td>
					</tr>

					<tr>
						<td width="50%">Class</td>
						<td>{{$detail->class->name}}</td>
					</tr>

					<tr>
						<td width="50%">Registration Fee</td>
						<td>{{$originalFee}}</td>
					</tr>

					<tr>
						<td width="50%">Discount Fee</td>
						<td>{{$discount}} %</td>
					</tr>

					<tr>
						<td width="50%">Fee (This Student)</td>
						<td>{{$finalFee}} Tk</td>
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