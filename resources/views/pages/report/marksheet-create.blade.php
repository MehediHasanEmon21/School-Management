@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Marksheet Generate</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">MarkSheet</li>
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
            <form method="GET" action="{{ route('report.marksheet.result') }}" target="_blank" id="myform">
              @csrf
              <div class="form-row">
              
                <div class="col-md-3">
                  <div class="form-group">
                     <label for="address">Year <font color="red">*</font></label>
                      <select id="year_id" name="year_id" class="form-control form-control-sm select2">
                      <option value="" selected="">Select Year</option>

                        @foreach($years as $year)
                        <option  value="{{ $year->id }}">{{$year->name}}</option>
                        @endforeach
                   
                      </select>
                      
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                      <label for="address">Class <font color="red">*</font></label>
                      <select id="class_id" name="class_id" class="form-control form-control-sm select2">
                      <option value="" selected="">Select Class</option>
   
                        @foreach($classes as $class)
                        <option value="{{ $class->id }}">{{$class->name}}</option>
                        @endforeach

                      </select>
                      
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                      <label for="address">Exam <font color="red">*</font></label>
                      <select id="exam_type_id" name="exam_type_id" class="form-control form-control-sm select2">
                      <option value="" selected="">Select Exam</option>
   
                        @foreach($exams as $exam)
                        <option value="{{ $exam->id }}">{{$exam->name}}</option>
                        @endforeach

                      </select>
                      
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                      <label for="address">ID <font color="red">*</font></label>
                      <input type="text" class="form-control" name="id_no" id="id_no" placeholder="ID no">
                      
                  </div>
                </div>

                <div class="col-md-2">
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
        exam_type_id: {
          required: true,
        },
        year_id: {
          required: true,
        },
        class_id: {
          required: true,
        },
        id_no: {
          required: true,
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