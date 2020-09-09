@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Salary</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Salary v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- /.row -->
        <!-- Main row -->
  
<section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h2 class="card-title">Salary Detail</h2>
              <a href="{{ route('employee.salary.view') }}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-list">All Employee</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            

              <strong>Employee Name:</strong> {{ $detail->name }}, <strong>Employee Id:</strong> {{ $detail->id_no }}
              <table class="table table-bordered table-striped">

                <thead>
                 <tr>
                    <th>Sl</th>
                    <th>Previous Salary</th>
                    <th>Increment Salary</th>
                    <th>Present Salary</th>
                    <th>Effected Date</th>
                 </tr>
                </thead>
                <tbody>

                  @foreach($salaries as $key=>$salary)
                  @if($key == 0)

                    <td colspan="5" style="text-align: center;"><strong>Joining Salary: {{ $salary->present_salary }}</strong></td>

                  @else

                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $salary->previous_salary }}</td>
                    <td>{{ $salary->increment_salary }}</td>
                    <td>{{ $salary->present_salary }}</td>
                    <td>{{ date('jS M Y', strtotime($salary->effected_date)) }}</td>
                  </tr>

                  @endif
                  
                  @endforeach

                </tbody>

              </table>
            </div>

          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
          <!-- /.Left col -->

        </div>

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->



@endsection