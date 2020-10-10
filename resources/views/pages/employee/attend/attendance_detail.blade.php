@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Employee Attendance</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Attendance</li>
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
              <h2 class="card-title">Employee Attendance List</h2>
              <a href="{{route('employee.attend.add')}}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-plus-circle"> Add Employee Attendance</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="form-group col-md-4">
                <label class="control-label">Date</label>
                <input type="text" class="checkdate form-control form-control-sm" value="{{ $editData[0]->date }}" name="date"  readonly="" autocomplete="off">
              </div>
              <table id="example1" class="table table-bordered table-striped">

                <thead>
                <tr>
                  <th>SL</th>
          
                  <th>Name</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($editData as $key=>$value)
                <tr>

                  <td>{{$key + 1}}</td>
                  <td>{{$value->user->name}}</td>
                  <td><span @if($value->attend_status == 'Present') class="badge badge-info" @else class="badge badge-danger" @endif >{{$value->attend_status}}</span></td>
                 
                  
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                 <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Status</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
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