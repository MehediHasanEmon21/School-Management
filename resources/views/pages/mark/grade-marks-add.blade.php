@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ (@$editData)  ? 'Grade Edit' : 'Grade Add'}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Grade</li>
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
              <h2 class="card-title">All Grade List</h2>
              <a href="{{ route('grade.view') }}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-list"> All Grade</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{ (@$editData)  ? route('grade.update',$editData->id) : route('grade.store') }} " method="POST" id="myform">
                @csrf
             <div class="row">
                <div class="col-md-4">
                  
                  <div class="form-group">
                      <label for="grade_name">Grade Name</label>
                      <input type="text" class="form-control" name="grade_name" id="grade_name" placeholder="Enter grade name" value="{{ @$editData->grade_name }}">
                  </div>

                </div>

                <div class="col-md-4">
                  
                  <div class="form-group">
                      <label for="grade_point">Grade Point</label>
                      <input type="text" class="form-control" name="grade_point" id="grade_point" placeholder="Enter grade point" value="{{ @$editData->grade_point }}">
                  </div>

                </div>

                <div class="col-md-4">
                  
                  <div class="form-group">
                      <label for="start_mark">Start Mark</label>
                      <input type="text" class="form-control" name="start_mark" id="start_mark" placeholder="Enter start mark" value="{{ @$editData->start_mark }}">
                  </div>

                </div>

                <div class="col-md-4">
                  
                  <div class="form-group">
                      <label for="end_mark">End Mark</label>
                      <input type="text" class="form-control" name="end_mark" id="end_mark" placeholder="Enter end  mark" value="{{ @$editData->end_mark }}">
                  </div>

                </div>

                <div class="col-md-4">
                  
                  <div class="form-group">
                      <label for="start_point">Start Point</label>
                      <input type="text" class="form-control" name="start_point" id="start_point" placeholder="Enter start point" value="{{ @$editData->start_point }}">
                  </div>

                </div>

                <div class="col-md-4">
                  
                  <div class="form-group">
                      <label for="end_point">End Point</label>
                      <input type="text" class="form-control" name="end_point" id="end_point" placeholder="Enter end point" value="{{ @$editData->end_point }}">
                  </div>

                </div>

                <div class="col-md-4">
                  
                  <div class="form-group">
                      <label for="remark">Remark</label>
                      <input type="text" class="form-control" name="remark" id="remark" placeholder="Enter remark" value="{{ @$editData->remark }}">
                  </div>

                </div>

              

             




             

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{ (@$editData)  ? 'Update' : 'Submit'}}</button>
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
      grade_name: {
        required: true,
      },
      grade_point: {
        required: true,
      },
      start_mark: {
        required: true,
      },
      end_mark: {
        required: true,
      },
      start_point: {
        required: true,
      },
      end_point: {
        required: true,
      },

       remark: {
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