@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Assign Subject</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Assign Subject v1</li>
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
              <h2 class="card-title">Class : {{$details[0]->class->name}} Subject</h2>
              <a href="{{route('assign.subject.view')}}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-list">All Assign Subject</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Subject</th>
                  <th>Full Mark</th>
                  <th>Pass Mark</th>
                  <th>Subjective Mark</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($details as $key=>$d)
                <tr>

                  <td>{{$key + 1}}</td>
                  <td>
                    {{$d->subject->name}}
                 
                  </td>
                  <td>{{$d->full_mark}}</td>
                  <td>{{$d->pass_mark}}</td>
                  <td>{{$d->subjective_mark}}</td>
                </tr>
                @endforeach
                </tbody>
            
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