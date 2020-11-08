@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Marksheet Generate</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">MarkSheet</li>
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
              <h2 class="card-title">MarkSheet</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <div style="border: solid 2px; padding: 7px">
                
                <div class="row">
                  
                  <div style="float: right" class="col-md-2 text-center">

                    <img src="{{ URL::to('public/assets/backend/images/sc.jpg') }}" style="width: 80px; height: 80px">
                    
                  </div>

                  <div class="col-md-2"></div>

                  <div class="col-md-4 text-center" style="float: left">
                    
                    <h4><strong>ABC School</strong></h4>
                    <h5><strong>Dhaka, Notunbazar</strong></h5>
                    <h6><strong>www.school.com</strong></h6>
                    <h6><strong>{{$allResults[0]->exam->name}}</strong></h6>

                  </div>

                </div>

                <div class="col-md-12">
                  <hr style="boder: solid 1px; width: 100%; color: #000; margin-bottom: 0">
                  <p style="text-align: right;"><u><i>Print Date: </i>{{ date('d M Y') }}</u></p>
                </div>

                <div class="row">
                  
                  <div class="col-md-6">
                    <table border="1" width="100%" cellpadding="9" cellspacing="2">
                    <tr>
                      <td width="50%">Student Id</td>
                      <td>{{$allResults[0]->student->id_no}}</td>
                    </tr>
                    <tr>
                      <td width="50%">Roll</td>
                      <td>{{$allResults[0]->roll}}</td>
                    </tr>
                    <tr>
                      <td width="50%">Name</td>
                      <td>{{$allResults[0]->student->name}}</td>
                    </tr>
                    <tr>
                      <td width="50%">Class/td>
                      <td>{{$allResults[0]->class->name}}</td>
                    </tr>
                    <tr>
                      <td width="50%">Session</td>
                      <td>{{$allResults[0]->year->name}}</td>
                    </tr>
                    </table>
                  </div>
                  <div class="col-md-6">
                    <table border="1" width="100%" cellpadding="1" cellspacing="1">
                      <thead>
                        <tr>
                          <th>Letter Grade</th>
                          <th>Mark Interval</th>
                          <th>Grade Point</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach($mark_grades as $value)
                        <tr>
                          <td>{{$value->grade_name}}</td>
                          <td>{{$value->start_mark}} - {{$value->end_mark}}</td>
                          <td>{{number_format((float)$value->start_point,2)}} - {{number_format((float)$value->end_point,2)}}</td>
                        </tr>
                        @endforeach

                      </tbody>
                    </table>
                  </div>

                </div><br>

                 <div class="col-md-12">
                    <table border="1" width="100%" cellpadding="1" cellspacing="1">
                      <thead>
                        <tr>
                          <th class="text-center">Sl</th>
                          <th class="text-center">Subject</th>
                          <th class="text-center">Full Marks</th>
                          <th class="text-center">Get Marks</th>
                          <th class="text-center">Letter Grade</th>
                          <th class="text-center">Grade Point</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach($allResults as $key => $value)
                        <tr>
                          <td class="text-center">{{$key + 1}}</td>
                          <td class="text-center">{{$value->assign_subject->subject->name}}</td>
                          <td class="text-center">{{$value->assign_subject->full_mark}}</td>
                          <td class="text-center">{{$value->grade_name}}</td>
                          <td class="text-center">{{$value->grade_point}}</td>
                          <td class="text-center">{{$value->marks}}</td>
                        </tr>
                        @endforeach

                        <tr>
                          <td colspan="5" style="text-align: right;"><b>Total Number: </b></td>
                          <td style="text-align: center;"><b>{{ $total_number }}</b></td>
                          
                        </tr>

                      </tbody>
                    </table>
                  </div><br>

                  <div class="row">
                    
                      <div class="col-md-12">
                      <table border="1" width="100%" cellpadding="1" cellspacing="1">
                      <tr>
                        <td width="50%">Grade Point Average</td>
                        <td>
                          @if($fail_count > 0)
                          0.00
                          @else
                          {{number_format((float)$grade_point_average,2)}}
                          @endif
                        
                      </td>
                      </tr>
                      <tr>
                        <td width="50%">Letter Grade</td>
                        <td>
                          @if($fail_count > 0)
                          F
                          @else
                          {{$letter_grade->grade_name}}
                          @endif
                          
                        </td>
                      </tr>

                      <tr>
                        <td width="50%">Total Marks with Fraction</td>
                        <td>{{$total_number}}</td>
                      </tr>

                      <tr>
                        <td width="50%">Remarks</td>
                        <td><b>{{$letter_grade->remark}}</b></td>
                      </tr>
                     
                      </table>
                    </div>

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
  




@endsection