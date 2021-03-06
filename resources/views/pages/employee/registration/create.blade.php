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
              <form action="{{ route('employee.reg.store') }}" method="POST" id="myform" enctype="multipart/form-data">
                @csrf
             <div class="row">
                <div class="col-md-4">
                  
                  <div class="form-group">
                      <label for="name">Employee Name <font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm" name="name" id="name" placeholder="Enter name">
                      
                  </div>

                </div>

                <div class="col-md-4">
                  <div class="form-group">
                      <label for="fname">Father's Name <font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm" name="fname" id="fname" placeholder="Enter fname">
                      
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                      <label for="mname">Mother's Name <font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm" name="mname" id="mname" placeholder="Enter mname">
                      
                  </div>
                </div>

                 <div class="col-md-4">
                  <div class="form-group">
                      <label for="mobile">Mobile No <font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm" name="mobile" id="mobile" placeholder="Enter mobile">
                      
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                      <label for="address">Address <font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm" name="address" id="address" placeholder="Enter address">
                      
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="form-group">
                      <label for="address">Gender <font color="red">*</font></label>
                      <select name="gender" class="form-control form-control-sm">
                      <option value="" selected="">Select Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      </select>
                  </div>
                </div>

                 <div class="col-md-4">
                  <div class="form-group">
                      <label for="address">Religion <font color="red">*</font></label>
                      <select name="religion" class="form-control form-control-sm">
                      <option value="" selected="">Select Religion</option>
                      <option value="Muslim">Muslim</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Christian">Christian</option>
                      </select>
                      
                  </div>
                </div>

                 <div class="col-md-4">
                  <div class="form-group">
                      <label for="dob">Date of Birth <font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm datepicker" name="dob" id="dob" placeholder="Enter dob">
                      
                  </div>
                </div>


                 <div class="col-md-4">
                    <div class="form-group">
                      <label for="address">Designation <font color="red">*</font></label>
                      <select name="designation_id" class="form-control form-control-sm">
                      <option value="" selected="">Select Designation</option>
                      @foreach($designations as $des)
                        <option value="{{ $des->id }}">{{$des->name}}</option>
                      @endforeach
                      </select>
                      
                  </div>
                </div>



                <div class="col-md-3">
                <div class="form-group">
                      <label for="dob">Join Date <font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm join_date" name="join_date" id="join_date" placeholder="Enter join date">
                      
                  </div>
                </div>

                 <div class="col-md-3">
                <div class="form-group">
                      <label for="dob">Salary <font color="red">*</font></label>
                      <input type="number" class="form-control form-control-sm" name="salary" id="salary" placeholder="Enter salary">
                      
                  </div>
                </div>

                <div class="col-md-3">
                
                  <div class="form-group">
                      <label for="password_confirmation">Image</label>
                      <input type="file" id="image" class="form-control" name="image">
                  </div>
                

                </div>

                <div class="col-md-3">

                  <img id="show-image" src="{{ URL::to('public/assets/backend/dist/img/unnamed.jpg') }}" style="width: 100px; height: 100px;">
                  
                </div>




             

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-sm">Submit</button>
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
        $('.join_date').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
        });
    </script>

@endsection