@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Other Cost</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Other Cost</li>
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
              <h2 class="card-title">@if(@$editData)Edit @else Edit @endif Other Cost</h2>
              <a href="{{ route('other.cost.view')}}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-list">All Costs</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{ (@$editData) ? route('other.cost.update',$editData->id) :  route('other.cost.store')}}" method="POST" id="myform" enctype="multipart/form-data">
                @csrf
             <div class="row">

               <div class="col-md-6">
                  <div class="form-group">
                      <label for="date">Date <font color="red">*</font></label>
                      <input type="text" class="form-control datepicker" name="date" value="{{ @$editData->date }}" id="date" placeholder="Enter date">
                      
                  </div>
                </div>
                <div class="col-md-6">
                  
                  <div class="form-group">
                      <label for="amount">Amount <font color="red">*</font></label>
                      <input type="number" class="form-control" name="amount" id="amount" value="{{ @$editData->amount }}" placeholder="Enter amount">
                      
                  </div>

                </div>

                <div class="col-md-12">
                  <div class="form-group">
                      <label for="fname">Description <font color="red">*</font></label>
                      <textarea name="description" class="form-control" cols="10"  rows="5">{{ @$editData->description }}</textarea>
                      
                  </div>
                </div>

            


                

                 


                



                


               




             

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-sm">{{ @$editData ? 'Update' : 'Submit' }}</button>
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
      date: {
        required: true,
      },
      amount: {
        required: true,
      },
      description: {
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
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
    </script>

@endsection