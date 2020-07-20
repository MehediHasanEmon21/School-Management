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

          url: "{{ route('student.reg.fee.get.student') }}",
          type: "GET",
          data: {
            year_id: year_id,
            class_id: class_id
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




@endsection