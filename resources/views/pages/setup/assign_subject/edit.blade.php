@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Assign Subject</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Assign Subject v1</li>
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
              <h2 class="card-title">Edit Class {{$editDatas[0]->class->name}} Subject</h2>
              <a href="{{ route('assign.subject.view') }}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-list">All Assign subject </i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form action="{{ route('assign.subject.update',$editDatas[0]->class_id) }}" method="POST" id="myform">
                @csrf
              <div class="add_item">
                  
                  <div class="form-row">
                    
                    <div class="form-group col-md-4">
                         <label>Class</label>
                        <select name="class_id" class="form-control">
                          <option value="">Select Class</option>
                          @foreach($student_classes as $cls)
                            <option {{ $editDatas[0]->class_id == $cls->id ? 'selected' : '' }} value="{{ $cls->id }}">{{ $cls->name }}</option>
                          @endforeach
                        </select>
                    </div>

                  </div>
                  
                  @foreach($editDatas as $editData)
                  <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label>Subject</label>
                          <select name="subject_id[]" class="form-control">
                            <option value="">Select Subject</option>
                            @foreach($subjects as $subject)
                              <option {{ $editData->subject_id == $subject->id ? 'selected' : '' }} value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                          </select>
                      </div>

                      <div class="form-group col-md-2">
                        <label>Full Mark</label>
                        <input type="number" value="{{ $editData->full_mark }}" class="form-control" name="full_mark[]" placeholder="mark">
                      </div>
                      <div class="form-group col-md-2">
                        <label>Pass Mark</label>
                        <input type="number" value="{{ $editData->pass_mark }}" class="form-control" name="pass_mark[]" placeholder="pass mark">
                      </div>
                      <div class="form-group col-md-2">
                        <label>Subjective Mark</label>
                        <input type="number" value="{{ $editData->subjective_mark }}" class="form-control" name="subjective_mark[]" placeholder="sub mark">
                      </div>

                      <div class="form-group col-md-2" style="padding-top: 30px">
                          
                          <div class="form-row">
                            <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                            <span class="btn btn-danger removeventmore"><i class="fa fa-minus-circle"></i></span>
                          </div>

                      </div>

                    </div>
                  </div>
                  @endforeach

              </div>

              <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
             </div>
            </form>
            <!-- /.card-body -->
            
            </div>
          
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



  <div style="visibility: hidden">
    

      <div class="whole_extra_item_add" id="whole_extra_item_add">
        
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
          
          <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Subject</label>
                    <select name="subject_id[]" class="form-control">
                      <option value="">Select Subject</option>
                      @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                      @endforeach
                    </select>
                </div>

                <div class="form-group col-md-2">
                  <label>Full Mark</label>
                  <input type="number" class="form-control" name="full_mark[]" placeholder="mark">
                </div>
                <div class="form-group col-md-2">
                  <label>Pass Mark</label>
                  <input type="number" class="form-control" name="pass_mark[]" placeholder="pass mark">
                </div>
                <div class="form-group col-md-2">
                  <label>Subjective Mark</label>
                  <input type="number" class="form-control" name="subjective_mark[]" placeholder="sub mark">
                </div>

                <div class="form-group col-md-2" style="padding-top: 30px">
                    
                    <div class="form-row">
                      <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                      <span class="btn btn-danger removeventmore"><i class="fa fa-minus-circle"></i></span>
                    </div>

                </div>

            </div>

        </div>

      </div>


  </div>
  

  <script>
    
    $(document).ready(function(){

        var counter = 0;
        $(document).on('click','.addeventmore',function(){

            var whole_extra_item_add = $('#whole_extra_item_add').html();
            $(this).closest('.add_item').append(whole_extra_item_add)
            counter++

        })

        $(document).on('click','.removeventmore',function(){
          $(this).closest('.delete_whole_extra_item_add').remove()
          counter -= 1

        })


    })


  </script>



  <script type="text/javascript">
      

$(document).ready(function () {

  $("#myform").validate({
    rules: {
      "class_id": {
        required: true,
      },
      "subject_id[]": {
        required: true,
      },
      "full_mark[]": {
        required: true
      },
      "pass_mark[]": {
        required: true
      },
      "subjective_mark[]": {
        required: true
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