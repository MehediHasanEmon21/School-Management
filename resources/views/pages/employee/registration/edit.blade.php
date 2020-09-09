@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Employee</h1>
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
              <h2 class="card-title">Add Employee</h2>
              <a href="{{ route('employee.reg.view') }}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-list">All Registration</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{ route('employee.reg.update',$employee->id) }}" method="POST" id="myform" enctype="multipart/form-data">
                @csrf
             <div class="row">
                <div class="col-md-4">
                  
                  <div class="form-group">
                      <label for="name">Employee Name <font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm" name="name" id="name"  value="{{ $employee->name }}" placeholder="Enter name">
                      
                  </div>

                </div>

                <div class="col-md-4">
                  <div class="form-group">
                      <label for="fname">Father's Name <font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm" name="fname" id="fname" value="{{ $employee->fname }}" placeholder="Enter fname">
                      
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                      <label for="mname">Mother's Name <font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm" name="mname" id="mname" value="{{ $employee->mname }}" placeholder="Enter mname">
                      
                  </div>
                </div>

                 <div class="col-md-4">
                  <div class="form-group">
                      <label for="mobile">Mobile No <font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm" name="mobile" id="mobile" value="{{ $employee->mobile }}" placeholder="Enter mobile">
                      
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                      <label for="address">Address <font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm" name="address" id="address" value="{{ $employee->address }}" placeholder="Enter address">
                      
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="form-group">
                      <label for="address">Gender <font color="red">*</font></label>
                      <select name="gender" class="form-control form-control-sm">
                      <option value="" selected="">Select Gender</option>
                      <option value="Male" {{ $employee->gender == 'Male' ? 'selected' : '' }}>Male</option>
                      <option value="Female" {{ $employee->gender == 'Female' ? 'selected' : '' }}>Female</option>
                      </select>
                  </div>
                </div>

                 <div class="col-md-4">
                  <div class="form-group">
                      <label for="address">Religion <font color="red">*</font></label>
                      <select name="religion" class="form-control form-control-sm">
                      <option value="" selected="">Select Religion</option>
                      <option value="Muslim" {{ $employee->religion == 'Muslim' ? 'selected' : '' }}>Muslim</option>
                      <option value="Hindu" {{ $employee->religion == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                      <option value="Christian" {{ $employee->religion == 'Christian' ? 'selected' : '' }}>Christian</option>
                      </select>
                      
                  </div>
                </div>

                 <div class="col-md-4">
                  <div class="form-group">
                      <label for="dob">Date of Birth <font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm datepicker" name="dob" value="{{ $employee->dob }}" id="dob" placeholder="Enter dob">
                      
                  </div>
                </div>


                 <div class="col-md-4">
                    <div class="form-group">
                      <label for="address">Designation <font color="red">*</font></label>
                      <select name="designation_id" class="form-control form-control-sm">
                      <option value="" selected="">Select Designation</option>
                      @foreach($designations as $des)
                        <option {{ $employee->designation_id == $des->id ? 'selected' : '' }} value="{{ $des->id }}">{{$des->name}}</option>
                      @endforeach
                      </select>
                      
                  </div>
                </div>



               
                

                <div class="col-md-3">
                
                  <div class="form-group">
                      <label for="password_confirmation">Image</label>
                      <input type="file" id="image" class="form-control" name="image">
                  </div>
                

                </div>

                <div class="col-md-3">

                  <img id="show-image" class="img-fluid" src="{{  ($employee->image) ? URL::to($employee->image) : URL::to('public/assets/backend/dist/img/unnamed.jpg') }}" style="width: 100px; height: 100px;">
                  
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
      designation_id: {
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