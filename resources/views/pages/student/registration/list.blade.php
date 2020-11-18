@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Student Registration</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student Redistration</li>
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
              <a href="{{route('student.reg.create')}}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-plus-circle">Add Registration</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="GET" action="{{ route('student.class.wise.search') }}" id="myform">
              <div class="form-row">
              
                <div class="col-md-4">
                  <div class="form-group">
                     <label for="address">Year <font color="red">*</font></label>
                      <select name="year_id" class="form-control form-control-sm">
                      <option value="" selected="">Select Year</option>
                      @foreach($years as $year)
                        <option {{ (@$year_id == $year->id) ? 'selected' : '' }} value="{{ $year->id }}">{{$year->name}}</option>
                      @endforeach
                      </select>
                      
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                      <label for="address">Class <font color="red">*</font></label>
                      <select name="class_id" class="form-control form-control-sm">
                      <option value="" selected="">Select Class</option>
                      @foreach($classes as $class)
                        <option {{ (@$class_id == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{$class->name}}</option>
                      @endforeach
                      </select>
                      
                  </div>
                </div>

                <div class="col-md-2">
                  <button type="submit" name="search" class="btn btn-primary btn-sm" style="margin-top: 30px">Search</button>
                </div>
            
              </div>
              </form>
            </div>
            <div class="card-body">
              @if(!@$search)
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Id</th>
                  <th>Year</th>
                  <th>Class</th>
                  <th>Roll</th>
                  <th>Image</th>
                  @if(Auth::user()->role == 'admin')
                  <th>Code</th>
                  @endif
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($students as $key=>$st)
                <tr>

                  <td>{{$key + 1}}</td>
                  <td>{{$st->student->name}}</td>
                  <td>{{$st->student->id_no}}</td>
                  <td>{{$st->year->name}}</td>
                  <td>{{$st->class->name}}</td>
                  <td>{{$st->roll}}</td>
                  <td>
                    <img class="profile-user-img img-fluid img-circle" src="{{ ($st->student->image) ? URL::to($st->student->image) : URL::to('public/assets/backend/dist/img/unnamed.jpg') }}" style="width: 70px; height: 70px" alt="User profile picture">
                  </td>
                  @if(Auth::user()->role == 'admin')
                  <td>{{$st->student->code}}</td>
                  @endif
                  <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('student.reg.edit',$st->student_id) }}"><i class="fa fa-edit"></i></a>
                     
          
                    <a href="{{ route('student.reg.promotion.edit',$st->student_id) }}" title="promotion" class="btn btn-sm btn-success" href=""><i class="fa fa-check"></i></a>

                      <a target="_blank" href="{{ route('student.reg.detail',$st->student_id) }}" title="details" class="btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a>
                 
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                 <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Id</th>
                  <th>Year</th>
                  <th>Class</th>
                  <th>Roll</th>
                  <th>Image</th>
                  @if(Auth::user()->role == 'admin')
                  <th>Code</th>
                  @endif
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
              @else
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Id</th>
                  <th>Year</th>
                  <th>Class</th>
                  @if(Auth::user()->role == 'Admin')
                  <th>Code</th>
                  @endif
                  <th>Image</th>
                  <th>Code</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($students as $key=>$st)
                <tr>

                  <td>{{$key + 1}}</td>
                  <td>{{$st->student->name}}</td>
                  <td>{{$st->student->id_no}}</td>
                  <td>{{$st->year->name}}</td>
                  <td>{{$st->class->name}}</td>
                  <td>{{$st->roll}}</td>
                  <td>
                    <img class="profile-user-img img-fluid img-circle" src="{{ ($st->student->image) ? URL::to($st->student->image) : URL::to('public/assets/backend/dist/img/unnamed.jpg') }}" style="width: 70px; height: 70px" alt="User profile picture">
                  </td>
                  @if(Auth::user()->role == 'Admin')
                  <td>{{$st->student->code}}</td>
                  @endif
                  <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('student.reg.edit',$st->student_id) }}"><i class="fa fa-edit"></i></a>
                     
          
                     <a href="{{ route('student.reg.promotion.edit',$st->student_id) }}" title="promotion" class="btn btn-sm btn-success" href=""><i class="fa fa-check"></i></a>

                     <a target="_blank" href="{{ route('student.reg.detail',$st->student_id) }}" title="details" class="btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a>
                 
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Id</th>
                  <th>Year</th>
                  <th>Class</th>
                  @if(Auth::user()->role == 'Admin')
                  <th>Code</th>
                  @endif
                  <th>Image</th>
                  <th>Code</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
              @endif
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


      <script type="text/javascript">
      

  $(document).ready(function () {

  $('#myform').validate({
    rules: {
      year_id: {
        required: true,
      },
      class_id: {
        required: true,
      },
    },
    messages: {
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});


    </script>


@endsection