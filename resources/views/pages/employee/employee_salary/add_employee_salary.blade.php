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
              <h2 class="card-title">Increment Employee Salary</h2>
              <a href="{{ route('employee.salary.view') }}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-list">All Employee</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{ route('employee.salary.update',$employee->id) }}" method="POST" id="myform">
                @csrf
             <div class="row">
                <div class="col-md-4">
                
                <div class="form-group">
                    <label for="name">Increment Salary</label>
                    <input type="number" class="form-control" name="increment_salary" id="increment_salary" placeholder="Enter increment salary">

                </div>

              </div>

               <div class="col-md-4">
                
                <div class="form-group">
                    <label for="name">Effected Date</label>
                    <input type="text" class="form-control" name="effected_date" id="effected_date" placeholder="Enter effected date">

                </div>

              </div>

              <div class="col-md-4">
                
                <div class="form-group" style="padding-top: 30px;">
                    <button type="submit"  class="btn btn-primary">Increment</button>

                </div>

              </div>




             

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
      increment_salary: {
        required: true,
      },
      effected_date: {
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
        $('#effected_date').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
        
    </script>

@endsection