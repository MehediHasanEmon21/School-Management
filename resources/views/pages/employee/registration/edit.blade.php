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
              <li class="breadcrumb-item active">Registration v1</li>
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
              <h2 class="card-title">Edit Student</h2>
              <a href="{{ route('student.reg.view') }}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-list">All Registration</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{ route('student.reg.update',$student->student_id) }}" method="POST" id="myform" enctype="multipart/form-data">
                @csrf
             <div class="row">
              <input type="hidden" value="{{ $student->id }}" name="id">
                <div class="col-md-4">
                  
                  <div class="form-group">
                      <label for="name">Student Name <font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm" value="{{ $student->student->name }}" name="name" id="name" placeholder="Enter name">
                      
                  </div>

                </div>

                <div class="col-md-4">
                  <div class="form-group">
                      <label for="fname">Father's Name <font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm" value="{{ $student->student->fname }}" name="fname" id="fname" placeholder="Enter fname">
                      
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                      <label for="mname">Mother's Name <font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm" value="{{ $student->student->mname }}" name="mname" id="mname" placeholder="Enter mname">
                      
                  </div>
                </div>

                 <div class="col-md-4">
                  <div class="form-group">
                      <label for="mobile">Mobile No <font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm" value="{{ $student->student->mobile }}" name="mobile" id="mobile" placeholder="Enter mobile">
                      
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                      <label for="address">Address <font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm" value="{{ $student->student->address }}" name="address" id="address" placeholder="Enter address">
                      
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="form-group">
                      <label for="address">Gender <font color="red">*</font></label>
                      <select name="gender" class="form-control form-control-sm">
                      <option value="" selected="">Select Gender</option>
                      <option value="Male" {{ $student->student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                      <option {{ $student->student->gender == 'Female' ? 'selected' : '' }} value="Female">Female</option>
                      </select>
                  </div>
                </div> 

                 <div class="col-md-4">
                  <div class="form-group">
                      <label for="address">Religion <font color="red">*</font></label>
                      <select name="religion" class="form-control form-control-sm">
                      <option value="" selected="">Select Religion</option>
                      <option value="Muslim" {{ $student->student->religion == 'Muslim' ? 'selected' : '' }}>Muslim</option>
                      <option value="Hindu" {{ $student->student->religion == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                      <option value="Christian" {{ $student->student->religion == 'Christian' ? 'selected' : '' }}>Christian</option>
                      </select>
                      
                  </div>
                </div>

                 <div class="col-md-4">
                  <div class="form-group">
                      <label for="dob">Date of Birth <font color="red">*</font></label>
                      <input type="text" value="{{ $student->student->dob }}" class="form-control form-control-sm datepicker" name="dob" id="dob" placeholder="Enter dob">
                      
                  </div>
                </div>


                 <div class="col-md-4">
                  <div class="form-group">
                      <label for="discount">Discount</label>
                      <input type="number" value="{{ $student->discount_student->discount }}" class="form-control form-control-sm" name="discount" id="discount" placeholder="Enter discount">
                      
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                     <label for="address">Year <font color="red">*</font></label>
                      <select name="year_id" class="form-control form-control-sm">
                      <option value="" selected="">Select Year</option>
                      @foreach($years as $year)
                        <option {{ (@$student->year_id == $year->id) ? 'selected' : '' }} value="{{ $year->id }}">{{$year->name}}</option>
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
                        <option {{ (@$student->class_id == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{$class->name}}</option>
                      @endforeach
                      </select>
                      
                  </div>
                </div>

                 <div class="col-md-4">
                  <div class="form-group">
                      <label for="address">Group</label>
                      <select name="group_id" class="form-control form-control-sm">
                      <option value="" selected="">Select Group</option>
                      @foreach($groups as $group)
                        <option {{ (@$student->shift_id == $group->id) ? 'selected' : '' }} value="{{ $group->id }}">{{$group->name}}</option>
                      @endforeach
                      </select>
                      
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                      <label for="address">Shift</label>
                      <select name="shift_id" class="form-control form-control-sm">
                      <option value="" selected="">Select Shift</option>
                      @foreach($shifts as $shift)
                        <option {{ (@$student->shift_id == $shift->id) ? 'selected' : '' }} value="{{ $shift->id }}">{{$shift->name}}</option>
                      @endforeach
                      </select>
                      
                  </div>
                </div>

                <div class="col-md-4">
                
                  <div class="form-group">
                      <label for="password_confirmation">Image</label>
                      <input type="file" id="image" class="form-control" name="image">
                  </div>
                

                </div>

                <div class="col-md-4">

                  <img id="show-image" src="{{ (@$student->student->image) ? URL::to($student->student->image) : URL::to('public/assets/backend/dist/img/unnamed.jpg') }}" style="width: 100px; height: 100px;">
                  
                </div>




             

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </div>
            </div>
          </form>
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
      name: {
        required: true,
      },
      fname: {
        required: true,
      },
      mname: {
        required: true,
      },
      address: {
        required: true,
      },
      dob: {
        required: true,
      },
      gender: {
        required: true,
      },
      religion: {
        required: true,
      },
      year_id: {
        required: true,
      },
      class_id: {
        required: true,
      },
      mobile: {
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

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
    </script>

@endsection