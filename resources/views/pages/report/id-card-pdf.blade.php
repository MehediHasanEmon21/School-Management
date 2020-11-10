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
		
		@foreach($allData as $data)
		<div class="row" style="margin-bottom: 20px">

			<div class="col-md-3" style="border: 1px solid #000; margin: 0 110px 0 110px">
				<table border="0" width="100%">
					<tbody>
						<tr>
							<td width="30%" style="padding: 10px">
								<img src="{{ URL::to('public/assets/backend/images/sc.jpg') }}" style="width: 73px; height: 63px">
							</td>
							<td width="40%" class="text-center">
								<p style="color: red; font-size: 20px; margin-bottom: 5px !important;"><strong>ABC School</strong></p><br>
								<p style="padding: 5px; font-size: 20px;" class="btn btn-primary">Student ID Card</p>
							</td>
							<td width="30%" style="padding: 10px" class="text-right">
								<img src="{{ URL::to($data->student->image) }}" style="width: 73px; height: 63px; border-radius: 5px" >
							</td>
						</tr>
						<tr>
							<td width="45%" style="padding: 10px 3px 10px 5px"><p style="font-size: 16px"><strong>Name: </strong>{{ $data->student->name }}</p></td>
							<td width="10%" style="padding: 10px 3px 10px 5px"><p style="font-size: 16px"></p></td>
							<td width="45%" style="padding: 10px 3px 10px 5px"><p style="font-size: 16px"><strong>ID No: </strong>{{ $data->student->id_no }}</p></td>
						</tr>

						<tr>
							<td width="45%" style="padding: 10px 3px 10px 5px"><p style="font-size: 16px"><strong>Session: </strong>{{ $data->year->name }}</p></td>
							<td width="10%" style="padding: 10px 3px 10px 5px"><p style="font-size: 16px"><strong>Class: </strong>{{ $data->class->name }}</p></td>
							<td width="45%" style="padding: 10px 3px 10px 5px"><p style="font-size: 16px"><strong>ID No: </strong>{{ $data->roll }}</p></td>
						</tr>
						<tr>
							<td width="33%" style="padding: 10px 3px 10px 5px"></td>
							<td width="33%" style="padding: 10px 3px 10px 5px"></td>
							<td width="33%" style="padding: 10px 3px 10px 5px"></td>
						</tr>
						<tr>
							<td width="45%" style="padding: 10px 3px 10px 5px"><p style="font-size: 16px"><strong>Mobile: </strong>{{ $data->student->mobile }}</p></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td class="text-center">
								<hr style="border: solid 1px; width: 50%; margin-bottom: 0px; margin-left: 290px; color:#000">
								<p style="text-align: center;">Headmaster</p>
								
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			


		</div>
		@endforeach
		

		

	</div>
	
</body>
</html>