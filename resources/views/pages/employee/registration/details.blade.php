<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Employee Details</title>
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
							<img src="{{ URL::to('public/assets/backend/images/sc.jpg') }}" style="width: 100px; height: 100px">
						</td>
						<td width="40%" class="text-center">
							<h4><strong>ABC School</strong></h4>
							<h5><strong>Dhaka, Notunbazar</strong></h5>
							<h6><strong>www.school.com</strong></h6>
						</td>
						<td class="text-center" width="30%"> 
							<img src="{{ URL::to($detail->image) }}" style="width: 100px; height: 100px">
						</td>
					</tr>
					
				</table>
				
			</div>

			<div class="col-md-12 text-center">
				<h5 style="font-weight: bold; padding-top: -25px;">Employee Info</h5>
			</div>

			<div class="col-md-12">
				<table border="1" width="100%">

					<tr>
						<td width="50%">Employee Name</td>
						<td>{{$detail->name}}</td>
					</tr>

					<tr>
						<td width="50%">Father's Name</td>
						<td>{{$detail->fname}}</td>
					</tr>

					<tr>
						<td width="50%">Mother's Name</td>
						<td>{{$detail->mname}}</td>
					</tr>

					<tr>
						<td width="50%">Mobile</td>
						<td>{{$detail->mobile}}</td>
					</tr>

					<tr>
						<td width="50%">Address</td>
						<td>{{$detail->address}}</td>
					</tr>

					<tr>
						<td width="50%">Gender</td>
						<td>{{$detail->gender}}</td>
					</tr>

					<tr>
						<td width="50%">Designation</td>
						<td>{{$detail->designation->name}}</td>
					</tr>


					<tr>
						<td width="50%">Religion</td>
						<td>{{$detail->religion}}</td>
					</tr>

					<tr>
						<td width="50%">BirthDay</td>
						<td>{{$detail->dob}}</td>
					</tr>

					<tr>
						<td width="50%">Joining Date</td>
						<td>{{$detail->join_date}}</td>
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