@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Employee Salary</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Salary</li>
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
              <h2 class="card-title">Increment Salary</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Image</th>
                  <th>Join Date</th>
                  <th>Salary</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($users as $key=>$user)
                <tr>

                  <td>{{$key + 1}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->mobile}}</td>
  
                  <td><img src="{{URL::to($user->image)}}" style="width: 60px; height: 60px"></td>
                  <td>{{ date('jS M Y', strtotime($user->join_date)) }}</td>
                  <td>{{$user->salary}}</td>
                  <td>
                    <a class="btn btn-sm btn-primary" title="Salary Increment" href="{{ route('employee.salary.increment',$user->id) }}"><i class="fa fa-plus-circle"></i></a>
                    <a class="btn btn-sm btn-success" title="Details" href="{{ route('employee.salary.detail',$user->id) }}"><i class="fa fa-eye"></i></a>
                     
                 
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                 <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Image</th>
                  <th>Join Date</th>
                  <th>Salary</th>
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