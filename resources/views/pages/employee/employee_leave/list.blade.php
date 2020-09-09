@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Employee Leave</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Leave</li>
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
              <h2 class="card-title">Employee Leave List</h2>
              <a href="{{route('employee.leave.add')}}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-plus-circle">Add Employee Leave</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Id</th>
                  <th>Purpose</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($allData as $key=>$value)
                <tr>

                  <td>{{$key + 1}}</td>
                  <td>{{$value->user->name}}</td>
                  <td>{{$value->user->id_no}}</td>
                  <td>{{$value->leave->name}}</td>
  
                  <td>{{ date('jS M Y', strtotime($value->start_date)) }} To {{ date('jS M Y', strtotime($value->end_date)) }}</td>
                  <td>
                    <a class="btn btn-sm btn-primary" title="Edit" href="{{ route('employee.leave.edit',$value->id) }}"><i class="fa fa-edit"></i></a>
                 
                     
                 
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                 <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Id</th>
                  <th>Purpose</th>
                  <th>Date</th>
                  <th>Action</th>
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