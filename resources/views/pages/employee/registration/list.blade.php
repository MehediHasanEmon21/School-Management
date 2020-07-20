@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Employee Registration</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Registration</li>
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
              <h2 class="card-title">Registration List</h2>
              <a href="{{route('employee.reg.create')}}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-plus-circle">Add Employee</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Address</th>
                  <th>Image</th>
                  @if(Auth::user()->role == 'Admin')
                  <th>Code</th>
                  @endif
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
                  <td>{{$user->address}}</td>
                  <td><img src="{{URL::to($user->image)}}" style="width: 60px; height: 60px"></td>
                   @if(Auth::user()->role == 'Admin')
                  <td>{{$user->code}}</td>
                  @endif
                  <td>{{$user->join_date}}</td>
                  <td>{{$user->salary}}</td>
                  <td>
                    <a class="btn btn-sm btn-primary" href="{{-- {{ route('employee.reg.edit',$user->id) }} --}}"><i class="fa fa-edit"></i></a>
                     
                 
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                 <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Address</th>
                  <th>Image</th>
                  @if(Auth::user()->role == 'Admin')
                  <th>Code</th>
                  @endif
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