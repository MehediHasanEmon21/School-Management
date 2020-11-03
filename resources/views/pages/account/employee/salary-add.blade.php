@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Employee Salary</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Salary</li>
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
              <h2 class="card-title">Add Employee Salary</h2>
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
            
              

              <form method="POST" action="{{route('acounts.salary.store')}}">
              @csrf  
              <table class="table-sm table-striped table-bordered" style="width: 100%" id="tableData">
                
              </table>

              <button type="submit" class="btn btn-primary btn-sm" style="margin-top: 10px; display: none" id="submit_btn">Submit</button>
                
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

        var date = $('#date').val();
  

        $('.notifyjs-corner').html('')

        if (date == '') {
          $.notify('Date is required',{globalPosition: 'top right', className: 'error'})
          return false
        }


        $.ajax({

          url: "{{ route('acounts.salary.getEmployee') }}",
          type: "GET",
          data: {
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
                              <th>Employee Name</th>
                              <th>Basic Salary</th>
                              <th>Salary(This Month)</th>
                              <th>Select</th>
                            </tr>
                          </thead>`


              html +=`<tbody>` 
              $.each(data, function(key, value){



                html +=`

                      <tr>
                      <input type="hidden" name="date" value="${value.date}">
                      
                      <td><input type="hidden" name="employee_id[]" value="${value.user.id}">${value.user.id_no}</td>
                      <td>${value.user.name}</td>
                      <td>${value.user.salary}</td>
                      <td><input type="hidden" name="amount[]" value="${value.total}">${value.total}</td>
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
              alert('No Employee found')
            }

            

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