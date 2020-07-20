@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Student Fee Catagory Amount</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student Fee Category v1</li>
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
              <h2 class="card-title">Add Fee Category</h2>
              <a href="{{ route('student.fee.amount.view') }}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-list">All Fee Category</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form action="{{ route('student.fee.amount.store') }}" method="POST" id="myform">
                @csrf
              <div class="add_item">
                  
                  <div class="form-row">
                    
                    <div class="form-group col-md-5">
                        <label for="name">Fee Category</label>
                        <select name="fee_category_id" class="form-control">
                          <option value="">Select Category</option>
                          @foreach($fee_categories as $fee_category)
                            <option value="{{ $fee_category->id }}">{{ $fee_category->name }}</option>
                          @endforeach
                        </select>
                    </div>

                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-5">
                      <label>Class</label>
                        <select name="student_class_id[]" class="form-control">
                          <option value="">Select Class</option>
                          @foreach($student_classes as $cls)
                            <option value="{{ $cls->id }}">{{ $cls->name }}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-5">
                      <label>Amount</label>
                      <input type="number" class="form-control" name="amount[]" placeholder="Enter amount">
                    </div>

                    <div class="form-group col-md-2" style="padding-top: 30px">
                        
                        <div class="form-row">
                          <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                          {{-- <span class="btn btn-danger removeventmore"><i class="fa fa-minus-circle"></i></span> --}}
                        </div>

                    </div>

                  </div>

              </div>

              <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
              <div class="form-group col-md-5">
                <label>Class</label>
                  <select name="student_class_id[]" class="form-control">
                    <option value="">Select Class</option>
                    @foreach($student_classes as $cls)
                      <option value="{{ $cls->id }}">{{ $cls->name }}</option>
                    @endforeach
                  </select>
              </div>

              <div class="form-group col-md-5">
                <label>Amount</label>
                <input type="number" class="form-control" name="amount[]" placeholder="Enter amount">
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
      "fee_category_id": {
        required: true,
      },
      "student_class_id[]": {
        required: true,
      },
      "amount[]": {
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