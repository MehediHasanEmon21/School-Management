@extends('master')

@section('content')

<style type="text/css">
  
  .select2-selection {
     height: 30px !important; 
   }

</style>
        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Employee Leave</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Leave</li>
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
              <h2 class="card-title">Add Employee Leave</h2>
              <a href="{{ route('employee.leave.view') }}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-list"> All Leave</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{ @$editData ? route('employee.leave.update',$editData->id) : route('employee.leave.store') }}" method="POST" id="myform">
                @csrf
             <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="address">Employee Name <font color="red">*</font></label>
                      <select name="employee_id" class="form-control form-control-sm select2">
                      <option value="" selected="">Select Employee</option>
                      @foreach($employees as $employee)
                        <option {{ (@$editData->employee_id == $employee->id) ? 'selected' : ''  }} value="{{ $employee->id }}">{{$employee->name}}</option>
                      @endforeach
                      </select>
                      
                  </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                      <label for="start_date">Join Date <font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm start_date" name="start_date" id="start_date" placeholder="Enter start date" value="{{ @$editData->start_date }}">
                      
                  </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                      <label for="end_date">End Date <font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm end_date" name="end_date" id="end_date" placeholder="Enter end date" value="{{ @$editData->end_date }}">
                      
                  </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                      <label for="address">Leave Purpose <font color="red">*</font></label>
                      <select name="leave_purpose_id" id="leave_purpose_id" class="form-control form-control-sm">
                      <option value="" selected="">Select Purpose</option>
                      @foreach($leave_purposes as $lp)
                        <option {{ (@$editData->leave_purpose_id == $lp->id) ? 'selected' : ''  }} value="{{ $lp->id }}">{{$lp->name}}</option>
                      @endforeach
                      <option value="0">New Purpose</option>
                      </select>
                      
                  </div>
                </div>

                <div class="col-md-4" style="display: none" id="new_purpose_column">
                <div class="form-group">
                      <label for="name">New Purpose <font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm name" name="name" id="name" placeholder="New Purpose">
                      
                  </div>
                </div>




             

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{ @$editData ? 'Update' : 'Submit' }}</button>
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
      employee_id: {
        required: true,
      },
      leave_purpose_id: {
        required: true,
      },
      start_date: {
        required: true,
      },
      end_date: {
        required: true,
      },
      name: {
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

    <script>
      
      $(document).ready(function(){

        $(document).on('change','#leave_purpose_id',function(){

            var value = $(this).val();
            if (value == 0) {
              $('#new_purpose_column').show()
            }else{
              $('#new_purpose_column').hide()
            }

        })

      })

    </script>

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $('.start_date').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
        $('.end_date').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
        });
    </script>

@endsection