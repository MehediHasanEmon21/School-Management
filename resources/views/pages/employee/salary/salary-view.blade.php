@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Registration Fee</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Registration Fee</li>
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
           
              <div class="form-row">
              
                <div class="col-md-4">
                  <div class="form-group">
                     <label for="date">Date <font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm datepicker" name="date" id="date" placeholder="Enter date">
                      
                  </div>
                </div>

               

                <div class="col-md-2">
                  <a id="search" name="search" class="btn btn-primary btn-sm" style="margin-top: 30px">Search</a>
                </div>
            
              </div><br>

             

              
            </div>

            <div class="card-body">
              <div id="DocumentResults"></div>
              <script id="document-template" type="text/x-handlebars-template">

                
              <table class="table-sm table-striped table-bordered" style="width: 100%">
                <thead>
                  <tr>
                    @{{{thsource}}}
                  </tr>
                </thead>
                <tbody>
                  @{{#each this}}
                  <tr>
                    @{{{tdsource}}}
                  </tr>
                  @{{/each}}
                </tbody>
              </table>
                
              </script>



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

        var date = $('#date').val();
  

        $('.notifyjs-corner').html('')

        if (date == '') {
          $.notify('Date is required',{globalPosition: 'top right', className: 'error'})
          return false
        }


        $.ajax({

          url: "{{ route('monthly.salary.get.employee') }}",
          type: "GET",
          data: {
            date: date,
          },
          beforeSend:function(){

          },
          success:function(data){

            var source = $('#document-template').html();
            var template = Handlebars.compile(source)
            var html = template(data)
            $('#DocumentResults').html(html)
            $('[data-toggle="tooltip"]').tooltip()

          }
      

        })

    })

  </script>

   <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
    </script>




@endsection