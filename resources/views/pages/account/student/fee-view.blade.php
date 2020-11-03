@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Student Account Fee</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student Account Fee</li>
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
              <h2 class="card-title">Account Fee List</h2>
              <a href="{{route('acounts.fee.add')}}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-plus-circle"> Add/Edit Account Fee</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Id No</th>
                  <th>Name</th>
                  <th>Year</th>
                  <th>Class</th>
                  <th>Fee Type</th>
                  <th>Amount</th>
                  <th>Date</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($allData as $key=>$value)
                <tr>

                  <td>{{$key + 1}}</td>
                  <td>{{$value->student->id_no}}</td>
                  <td>{{$value->student->name}}</td>
                  <td>{{$value->year->name}}</td>
                  <td>{{$value->class->name}}</td>
                  <td>{{$value->fee_category->name}}</td>
                  <td>{{$value->amount}}</td>
                  <td>{{date('M Y',strtotime($value->date))}}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>SL</th>
                  <th>Id No</th>
                  <th>Name</th>
                  <th>Year</th>
                  <th>Class</th>
                  <th>Fee Type</th>
                  <th>Amount</th>
                  <th>Date</th>
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