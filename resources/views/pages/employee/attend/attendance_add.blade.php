@extends('master')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/backend/css/attend.css') }}">

<style type="text/css">
  
  .switch-toggle{
    width: auto;

  }

  .switch-toggle label:not('.disabled'){
    cursor: pointer;
  }

  .switch-candy a {
    border: 1px solid #333;
    border-radius: 3px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2), inset 0 1px 1px rgba(255, 255, 255, 0.45);
    border-color: white;
    background-image: -webkit-linear-gradient(top, rgba(255, 255, 255, 0.2), transparent);
    background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.2), transparent);
  }

  .switch-toggle.switch-candy, .switch-light.switch-candy > span {
    background-color: #5a6268;
    border-radius: 3px;
    box-shadow: inset 0 2px 6px rgba(0, 0, 0, 0.3), 0 1px 0 rgba(255, 255, 255, 0.2);

  }

</style>


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Employee Attendance</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Attendance</li>
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
              <h2 class="card-title">Add Employee Attendance</h2>
              <a href="{{route('employee.attend.view')}}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-list"> Add Employee Attendance</i></h4></a>
            </div>
            <form action="{{route('employee.attend.store')}}" method="POST" id="myform">
              @csrf

            @if(isset($editData))

            <div class="card-body">

              <div class="form-group col-md-4">
                <label class="control-label">Attendance Date</label>
                <input type="text" class="checkdate form-control form-control-sm" value="{{ $editData[0]->date }}" name="date"  readonly="" autocomplete="off">
              </div>

              <table class="table-sm table-bordered table-striped dt-responsive" style="width: 100%">

                <thead>
                  <tr>
                    <th rowspan="2" class="tex-center" style="vertical-align: middle">SL.</th>
                    <th rowspan="2" class="tex-center" style="vertical-align: middle">Employee Name</th>
                    <th colspan="3" class="tex-center" style="vertical-align: middle; width: 25%">Attendance Status</th>
                  </tr>
                  <tr>
                    <th class="tex-center btn present_all" style="display: table-cell;background-color: #114190">Present</th>
                    <th class="tex-center btn leave_all" style="display: table-cell;background-color: #114190">Leave</th>
                    <th class="tex-center btn absent_all" style="display: table-cell;background-color: #114190">Absent</th>
                  </tr>
                </thead>

                <tbody>

                  @foreach($editData as $key=>$data)
                  <tr id="div{{$data->id}}" class="tex-center">
                    <input type="hidden" name="employee_id[]" value="{{ $data->employee_id }}" class="employee_id">
                    <td>{{ $key+1 }}</td>
                    <td>{{ $data->user->name }}</td>
                    <td colspan="3">
                      <div class="switch-toggle switch-3 switch-candy">
                        
                        <input type="radio" name="attend_status{{$key}}" id="present{{$key}}" value="Present" class="present" {{ ($data->attend_status == 'Present') ? 'checked' : '' }}>
                        <label for="present{{$key}}">Present</label>

                        <input type="radio" name="attend_status{{$key}}" id="leave{{$key}}" value="Leave" class="leave" {{ ($data->attend_status == 'Leave') ? 'checked' : '' }}>
                        <label for="leave{{$key}}" >Leave</label>

                        <input type="radio" name="attend_status{{$key}}" id="absent{{$key}}" value="Absent" class="absent" {{ ($data->attend_status == 'Absent') ? 'checked' : '' }}>
                        <label for="absent{{$key}}" >Absent</label>

                      </div>
                    </td>
                     
                  </tr>
                  @endforeach
                  
                </tbody>
                
              </table><br>

              <button type="submit" class="btn btn-sm btn-success">Update</button>
              
            </div>

            @else

            <div class="card-body">

              <div class="form-group col-md-4">
                <label class="control-label">Attendance Date</label>
                <input type="text" class="checkdate form-control form-control-sm date" name="date" id="date" placeholder="Enter attendance date" autocomplete="off">
              </div>

              <table class="table-sm table-bordered table-striped dt-responsive" style="width: 100%">

                <thead>
                  <tr>
                    <th rowspan="2" class="tex-center" style="vertical-align: middle">SL.</th>
                    <th rowspan="2" class="tex-center" style="vertical-align: middle">Employee Name</th>
                    <th colspan="3" class="tex-center" style="vertical-align: middle; width: 25%">Attendance Status</th>
                  </tr>
                  <tr>
                    <th class="tex-center btn present_all" style="display: table-cell;background-color: #114190">Present</th>
                    <th class="tex-center btn leave_all" style="display: table-cell;background-color: #114190">Leave</th>
                    <th class="tex-center btn absent_all" style="display: table-cell;background-color: #114190">Absent</th>
                  </tr>
                </thead>

                <tbody>

                  @foreach($employees as $key=>$employee)
                  <tr id="div{{$employee->id}}" class="tex-center">
                    <input type="hidden" name="employee_id[]" value="{{ $employee->id }}" class="employee_id">
                    <td>{{ $key+1 }}</td>
                    <td>{{ $employee->name }}</td>
                    <td colspan="3">
                      <div class="switch-toggle switch-3 switch-candy">
                        
                        <input type="radio" name="attend_status{{$key}}" id="present{{$key}}" value="Present" class="present" checked="checked">
                        <label for="present{{$key}}">Present</label>

                        <input type="radio" name="attend_status{{$key}}" id="leave{{$key}}" value="Leave" class="leave">
                        <label for="leave{{$key}}">Leave</label>

                        <input type="radio" name="attend_status{{$key}}" id="absent{{$key}}" value="Absent" class="absent">
                        <label for="absent{{$key}}">Absent</label>

                      </div>
                    </td>
                     
                  </tr>
                  @endforeach
                  
                </tbody>
                
              </table><br>

              <button type="submit" class="btn btn-sm btn-success">Take Attendance</button>
              
            </div>


            @endif

            


            </form>
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

    <script>
      
      $(document).on('click','.present',function(){
        $(this).parents(tr).find('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#495057')
      })

      $(document).on('click','.leave',function(){
        $(this).parents(tr).find('.datetime').css('pointer-events','').css('background-color','white').css('color','#495057')
      })

       $(document).on('click','.absent',function(){
        $(this).parents(tr).find('.datetime').css('pointer-events','none').css('background-color','white').css('color','#495057')
      })

    </script>


    <script>
      
      $(document).on('click','.present_all',function(){
        $("input[value=Present]").prop('checked',true)
        $('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#495057')
      })

      $(document).on('click','.leave_all',function(){
        $("input[value=Leave]").prop('checked',true)
        $('.datetime').css('pointer-events','').css('background-color','white').css('color','#495057')
      })

      $(document).on('click','.absent_all',function(){
        $("input[value=Absent]").prop('checked',true)
        $('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#495057')
      })

    </script>
    <script>
      

  $(document).ready(function () {

  $('#myform').validate({
    rules: {
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