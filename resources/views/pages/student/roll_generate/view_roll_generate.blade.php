@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Student Roll</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Roll Generation</li>
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
            <form method="POST" action="{{ route('student.roll.store') }}" id="myform">
              @csrf
              <div class="form-row">
              
                <div class="col-md-4">
                  <div class="form-group">
                     <label for="address">Year <font color="red">*</font></label>
                      <select id="year_id" name="year_id" class="form-control form-control-sm">
                      <option value="" selected="">Select Year</option>

                        @foreach($years as $year)
                        <option  value="{{ $year->id }}">{{$year->name}}</option>
                        @endforeach
                   
                      </select>
                      
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                      <label for="address">Class <font color="red">*</font></label>
                      <select id="class_id" name="class_id" class="form-control form-control-sm">
                      <option value="" selected="">Select Class</option>
   
                        @foreach($classes as $class)
                        <option value="{{ $class->id }}">{{$class->name}}</option>
                        @endforeach

                      </select>
                      
                  </div>
                </div>

                <div class="col-md-2">
                  <a id="search" name="search" class="btn btn-primary btn-sm" style="margin-top: 30px">Search</a>
                </div>
            
              </div><br>

              <div class="row d-none" id="roll-generate">
                <div class="col-md-12">
                  <table class="table table-bordered table-striped" style="width: 100%">
                    <thead>
                      <tr>
                        <td>Id No</td>
                        <td>Father's Name</td>
                        <td>Mother's Name</td>
                        <td>Gender</td>
                        <td>Roll</td>
                      </tr>
                    </thead>

                    <tbody id="roll-generate-tr">
                      
                    </tbody>
                    
                  </table>
                </div>
                
              </div>

              <button type="submit" class="btn btn-success">Roll Generate</button>

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
  
  <script>
    
    $(document).on('click','#search',function(){

        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();

        $('.notifyjs-corner').html('')

        if (year_id == '') {
          $.notify('Year required',{globalPosition: 'top right', className: 'error'})
          return false
        }

        if (class_id == '') {
          $.notify('Class required',{globalPosition: 'top right', className: 'error'})
          return false
        }

        $.ajax({

          url: "{{ route('get.student.roll.generation') }}",
          type: "GET",
          data: {
            year_id: year_id,
            class_id: class_id
          },
          success:function(data){
            $('#roll-generate').removeClass('d-none')
            var html = ''
            $.each(data, function(key,v){
              html +=
              '<tr>'+
              '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"></td>'+
              '<td>'+v.student.fname+'</td>'+
              '<td>'+v.student.mname+'</td>'+
              '<td>'+v.student.gender+'</td>'+
              '<td><input type="text" class="form-control form-control-sm" name="roll[]" value="'+v.roll+'"></td>'+
              '</tr>'
            })
            $('#roll-generate-tr').html(html)
          }

        })

    })

  </script>

  <script type="text/javascript">
      

  $(document).ready(function () {

  $('#myform').validate({
    "roll[]": {
      year_id: {
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