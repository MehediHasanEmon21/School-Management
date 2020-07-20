@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
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
              <h2 class="card-title">Profile Update</h2>
              <a href=""><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-eye">View Profile</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{ route('profile.update',$user->id) }}" method="POST" enctype="multipart/form-data" id="myform">
                @csrf
             <div class="row">
                <div class="col-md-4">
                
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" value="{{ $user->name }}" name="name" id="name" placeholder="Enter name">
                </div>

              </div>

              <div class="col-md-4">
                
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" class="form-control">
                      <option value="Admin" {{ ($user->userType == 'Admin' ? 'selected': '')}} >Admin</option>
                      <option value="User" {{ ($user->userType == 'User' ? 'selected': '')}}>User</option>
                    </select>
                </div>
                <input type="hidden" name="old_image" value="{{ $user->image }}">

              </div>

              <div class="col-md-4">
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" value="{{ $user->email }}" name="email" placeholder="Enter email">
                    <font style="color: red">{{ ($errors->has('email')) ? $errors->first('email') : '' }}</font>
                </div>

              </div>

              <div class="col-md-4">
                
                <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="number" class="form-control" id="mobile" value="{{ $user->mobile }}" name="mobile" placeholder="Enter mobile">
                </div>

              </div>

              <div class="col-md-4">
                
                <div class="form-group">
                    <label for="password_confirmation">Gender</label>
                    <select name="gender" class="form-control">
                      <option value="Male" {{ ($user->userType == 'Male' ? 'selected': '')}}>Male</option>
                      <option value="Female" {{ ($user->userType == 'Female' ? 'selected': '')}}>Female</option>
                    </select>
                </div>

              </div>

              <div class="col-md-4">
                
                <div class="form-group">
                    <label for="password_confirmation">Image</label>
                    <input type="file" id="image" class="form-control" name="image">
                </div>
                <img id="show-image" src="{{ ($user->image) ? URL::to($user->image) : URL::to('public/assets/backend/dist/img/unnamed.jpg') }}" style="width: 100px; height: 100px;">

              </div>



             

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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
      mobile: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      password_confirmation: {
        required: true,
        equalTo: '#password'
      },
    },
    messages: {
      name: {
        required: "Name is required",
      },
      role: {
        required: "Role is required",
      },
      email: {
        required: "Email is required",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Password is required",
        minlength: "Your password must be at least 5 characters long"
      },
      password_confirmation: {
        required: "Password confirmation is required",
        equalTo: "Password confirmation does not match"
      },
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