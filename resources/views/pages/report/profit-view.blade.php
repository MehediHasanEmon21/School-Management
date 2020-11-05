@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Profit</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profit</li>
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
            <form method="POST" action="{{ route('marks.add') }}" id="myform">
              @csrf
              <div class="form-row">
              
               

               

              

                <div class="col-md-5">
                  <div class="form-group">
                      <label class="control-label">Start Date</label>
                      <input type="text" class="form-control form-control-sm" name="start_date" id="start_date"  autocomplete="off">
                      
                  </div>
                </div>

                 <div class="col-md-5">
                  <div class="form-group">
                      <label class="control-label">End Date</label>
                      <input type="text" class="form-control form-control-sm" name="end_date" id="end_date"  autocomplete="off">
                      
                  </div>
                </div>

                <div class="col-md-2">
                  <a id="search" name="search" style="margin-top: 29px" class="btn btn-primary btn-sm">Search</a>
                </div>
            
              </div><br>

              <div class="row" id="mark-generate">
                <div class="col-md-12">
                  <table class="table table-bordered table-striped" style="width: 100%" id="tableData">
                    

                    
                  </table>
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


<input type="hidden" value="{{route('profit.view.pdf')}}" id="pdfRoute">
        </div>

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  
  <script>
    
    $(document).on('click','#search',function(){

        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();

        $('.notifyjs-corner').html('')

        if (start_date == '') {
          $.notify('Start Date required',{globalPosition: 'top right', className: 'error'})
          return false
        }

        if (end_date == '') {
          $.notify('End Date required',{globalPosition: 'top right', className: 'error'})
          return false
        }


        $.ajax({

          url: "{{ route('profit.getProfit') }}",
          type: "GET",
          data: {
            start_date: start_date,
            end_date: end_date,
      
          },
          success:function(data){

            var route = $('#pdfRoute').val() 

            var html = '';

            html +=`<thead>
                      <tr>
                        <th>Students Fees</th>
                        <th>Other Cost</th>
                        <th>Employee Salary</th>
                        <th>Total Cost</th>
                        <th>Profit</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                        <tr>
                        <td>${data.student_fee}</td>
                        <td>${data.other_cost}</td>
                        <td>${data.salary_cost}</td>
                        <td>${data.total_cost}</td>
                        <td>${data.profit}</td>
                        <td><a href="${route}?start_date=${data.start_date}&end_date=${data.end_date}" class="btn btn-sm btn-success" target="_blank" title="PDF"><i class="fa fa-file"></i></a></td>
                        </tr>
                      
                    </tbody>
                    `
              $('#tableData').html(html);


        
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

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $('#start_date').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
        $('#end_date').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
    </script>


@endsection