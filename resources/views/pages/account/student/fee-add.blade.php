@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Student Fee</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student Fee</li>
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
              <h2 class="card-title">Add/Edit Student Fee</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
           
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
                      <label for="address">Fee Category Type <font color="red">*</font></label>
                      <select id="fee_category_id" name="fee_category_id" class="form-control form-control-sm select2">
                      <option value="" selected="">Select Fee category</option>
   
                        @foreach($fee_categories as $fee_category)
                        <option value="{{ $fee_category->id }}">{{$fee_category->name}}</option>
                        @endforeach

                      </select>
                      
                  </div>
                </div>

               <div class="col-md-3">
                 
                 <div class="form-group">
                  <label class="control-label">Date</label>
                  <input type="text" class="form-control" name="date" id="date"  autocomplete="off">
                </div>

               </div>

                <div class="col-md-3">
                  <a id="search" name="search" class="btn btn-primary btn-sm">Search</a>
                </div>
            
              </div><br>

              <div class="row">
                <div class="col-md-12">
                  <form method="POST" action="{{route('acounts.fee.store')}}">
                    @csrf
                  <table class="table table-bordered table-striped" style="width: 100%" id="tableData">
                    

                   
                    
                  </table>
                  <button type="submit" class="btn btn-primary btn-sm" style="margin-top: 10px; display: none" id="submit_btn">Submit</button>
                </form>
                </div>
                
              </div>

              
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
        var fee_category_id = $('#fee_category_id').val();
        var date = $('#date').val();

        $('.notifyjs-corner').html('')

        if (year_id == '') {
          $.notify('Year required',{globalPosition: 'top right', className: 'error'})
          return false
        }

        if (class_id == '') {
          $.notify('Class required',{globalPosition: 'top right', className: 'error'})
          return false
        }

        if (fee_category_id == '') {
          $.notify('Fee Category required',{globalPosition: 'top right', className: 'error'})
          return false
        }

        if (date == '') {
          $.notify('Date required',{globalPosition: 'top right', className: 'error'})
          return false
        }

        $.ajax({

          url: "{{ route('acounts.fee.getStudent') }}",
          type: "GET",
          data: {
            year_id: year_id,
            class_id: class_id,
            fee_category_id: fee_category_id,
            date: date,
          },
          beforeSend:function(){

          },
          success:function(data){

            if (data.length > 0) {

                  var html = ''
                
                  html +=`<thead>
                            <tr>
                              <th>Id No</th>
                              <th>Student Name</th>
                              <th>Father's Name</th>
                              <th>Original Fee</th>
                              <th>Discount Amount(%)</th>
                              <th>Fee(This Student)</th>
                              <th>Select</th>
                            </tr>
                          </thead>`


              html +=`<tbody>` 
              $.each(data, function(key, value){



                html +=`

                      <tr>
                      <input type="hidden" name="student_id[]" value="${value.student.id}">
                      <input type="hidden" name="class_id" value="${value.class_id}">
                      <input type="hidden" name="year_id" value="${value.year_id}">
                      <input type="hidden" name="fee_category_id" value="${value.fee_category_id}">
                      <input type="hidden" name="date" value="${value.date}">
                      <input type="hidden" name="amount[]" value="${value.finalFee}">
                      <td>${value.student.id_no}</td>
                      <td>${value.student.name}</td>
                      <td>${value.student.fname}</td>
                      <td>${value.origiNalFee}</td>
                      <td>${value.discount}</td>
                      <td>${value.finalFee}</td>
                      <td>
                      <input type="checkbox" name="checkManage[]" value="${key}" ${value.selectStatus} style="transform: scale(1.5); margin-left: 10px; ">
                      </td>
                      </tr>
                      
                   


                `
           
              });

              html +=`</tbody>`

              $('#tableData').html(html)
              $('#submit_btn').show() 

            }else{
              $('#submit_btn').hide()
              alert('No student found')
            }

           

        }
      

        })

    })

  </script>

   <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $('#date').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
    </script>




@endsection