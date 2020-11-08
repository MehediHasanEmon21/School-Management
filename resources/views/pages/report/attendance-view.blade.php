@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Attendance Report</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Attendance</li>
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
              <h2 class="card-title">Select Criteria</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form method="GET" action="{{ route('report.attendance.result') }}" target="_blank" id="myform">
              @csrf
              <div class="form-row">
              
                <div class="col-md-3">
                  <div class="form-group">
                     <label for="address">Employee <font color="red">*</font></label>
                      <select id="employee_id" name="employee_id" class="form-control form-control-sm select2">
                      <option value="" selected="">Select Employee</option>

                        @foreach($employees as $employee)
                        <option  value="{{ $employee->id }}">{{$employee->name}}</option>
                        @endforeach
                   
                      </select>
                      
                  </div>
                </div>

             

                

                <div class="col-md-3">
                  <div class="form-group">
                      <label for="address">Date <font color="red">*</font></label>
                      <input type="text" class="form-control" name="date" id="date" placeholder="dd-mm-yyyy">
                      
                  </div>
                </div>

                <div class="col-md-2" style="margin-top: 35px">
                  <button type="submit" class="btn btn-primary btn-sm">Search</button>
                </div>
            
              </div>

          

              

            </form>
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
        employee_id: {
          required: true,
        },
        date: {
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
        $('#date').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
    </script>


@endsection