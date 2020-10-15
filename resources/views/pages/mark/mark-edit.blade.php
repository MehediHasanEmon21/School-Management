@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Student Marks</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Mark Edit</li>
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
            <form method="POST" action="{{ route('marks.update') }}" id="myform">
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
                      <label for="address">Subject <font color="red">*</font></label>
                      <select id="assign_subject_id" name="assign_subject_id" class="form-control form-control-sm select2">
                      <option value="" selected="">Select Subject</option>
   
                       

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

                <div class="col-md-2">
                  <a id="search" name="search" class="btn btn-primary btn-sm">Search</a>
                </div>
            
              </div><br>

              <div class="row d-none" id="mark-generate">
                <div class="col-md-12">
                  <table class="table table-bordered table-striped" style="width: 100%">
                    <thead>
                      <tr>
                        <td>Id No</td>
                        <td>Father's Name</td>
                        <td>Mother's Name</td>
                        <td>Gender</td>
                        <td>Marks</td>
                      </tr>
                    </thead>

                    <tbody id="mark-generate-tr">
                      
                    </tbody>
                    
                  </table>
                </div>
                <button type="submit" class="btn btn-success">Update Mark</button>
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
  
  <script>
    
    $(document).on('click','#search',function(){

        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        var assign_subject_id = $('#assign_subject_id').val();
        var exam_type_id = $('#exam_type_id').val();

        $('.notifyjs-corner').html('')

        if (year_id == '') {
          $.notify('Year required',{globalPosition: 'top right', className: 'error'})
          return false
        }

        if (class_id == '') {
          $.notify('Class required',{globalPosition: 'top right', className: 'error'})
          return false
        }

        if (assign_subject_id == '') {
          $.notify('Subject required',{globalPosition: 'top right', className: 'error'})
          return false
        }

        if (exam_type_id == '') {
          $.notify('Exam required',{globalPosition: 'top right', className: 'error'})
          return false
        }

        $.ajax({

          url: "{{ route('get-student-marks') }}",
          type: "GET",
          data: {
            year_id: year_id,
            class_id: class_id,
            assign_subject_id: assign_subject_id,
            exam_type_id: exam_type_id,
          },
          success:function(data){
            $('#mark-generate').removeClass('d-none')
            var html = ''
            $.each(data, function(key,v){
              html +=
              '<tr>'+
              '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"><input type="hidden" name="id_no[]" value="'+v.student.id_no+'"></td>'+
              '<td>'+v.student.fname+'</td>'+
              '<td>'+v.student.mname+'</td>'+
              '<td>'+v.student.gender+'</td>'+
              '<td><input type="text" class="form-control form-control-sm" name="marks[]" value="'+v.marks+'"></td>'+
              '</tr>'
            })
            $('#mark-generate-tr').html(html)
          }

        })

    })

  </script>

  <script>
    
      $(document).on('change','#class_id',function(){
         var class_id = $(this).val();
          $.ajax({
            url: "{{ route('get-subject') }}",
            data: {
              class_id: class_id
            },
            success:function(data){
              var html = '<option value="" selected="" disabled="">Select Subject</option>'
              $.each(data,function(key,v){
                html += '<option value="'+v.subject.id+'">'+v.subject.name+'</option>'
              })
              $('#assign_subject_id').html(html)
              
            }
          })
      })

  </script>

  <script type="text/javascript">
      

  $(document).ready(function () {

  $('#myform').validate({
    "marks[]": {
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