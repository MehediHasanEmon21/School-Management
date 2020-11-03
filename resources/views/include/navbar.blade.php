
@php

$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp

<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
   
          @if(Auth::user()->role == 'Admin')
          <li class="nav-item has-treeview {{ $prefix == '/user' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               User Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('user.view')}}" class="nav-link {{ $route == 'user.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          <li class="nav-item has-treeview {{ $prefix == '/profile' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                 Profile Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('profile.view')}}" class="nav-link {{ $route == 'profile.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Profile</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{ $prefix == '/setups' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                 Setup Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('student.class.view')}}" class="nav-link {{ $route == 'student.class.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Class</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('student.year.view')}}" class="nav-link {{ $route == 'student.year.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Year</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('student.group.view')}}" class="nav-link {{ $route == 'student.group.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Group</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('student.shift.view')}}" class="nav-link {{ $route == 'student.shift.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Shift</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('student.fee.category.view')}}" class="nav-link {{ $route == 'student.fee.category.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fee Category</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('student.fee.amount.view')}}" class="nav-link {{ $route == 'student.fee.amount.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fee Category Amount</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('exam.type.view')}}" class="nav-link {{ $route == 'exam.type.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Exam Type</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('subject.view')}}" class="nav-link {{ $route == 'subject.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Subject</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('assign.subject.view')}}" class="nav-link {{ $route == 'assign.subject.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Subject</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('designation.view')}}" class="nav-link {{ $route == 'designation.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Designation</p>
                </a>
              </li>
            </ul>

            
          </li>

            <li class="nav-item has-treeview {{ $prefix == '/student' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Student Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('student.reg.view')}}" class="nav-link {{ $route == 'student.reg.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Registration</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('student.roll.view')}}" class="nav-link {{ $route == 'student.roll.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roll Generate</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('student.reg.fee.view')}}" class="nav-link {{ $route == 'student.reg.fee.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registration Fee</p>
                </a>
              </li>
            </ul>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('student.exam.fee.view')}}" class="nav-link {{ $route == 'student.exam.fee.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Exam Fee</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{ $prefix == '/employee' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                 Employee Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('employee.reg.view')}}" class="nav-link {{ $route == 'employee.reg.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Registration</p>
                </a>
              </li>
            </ul>

              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('employee.salary.view')}}" class="nav-link {{ $route == 'employee.salary.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Salary</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('employee.leave.view')}}" class="nav-link {{ $route == 'employee.leave.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Leave</p>
                </a>
              </li>
            </ul>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('employee.attend.view')}}" class="nav-link {{ $route == 'employee.attend.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Attendance</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('monthly.salary.view')}}" class="nav-link {{ $route == 'monthly.salary.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Monthly Salary</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{ $prefix == '/marks' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                 Marks Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('marks.view')}}" class="nav-link {{ $route == 'marks.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mark Entry</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('marks.edit')}}" class="nav-link {{ $route == 'marks.edit' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mark Edit</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('grade.view')}}" class="nav-link {{ $route == 'grade.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mark Grade</p>
                </a>
              </li>
            </ul>

        
          </li>

           <li class="nav-item has-treeview {{ $prefix == '/accounts' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                 Accounts Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('acounts.fee.view')}}" class="nav-link {{ $route == 'acounts.fee.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Fee</p>
                </a>
              </li>
            </ul>

             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('acounts.salary.view')}}" class="nav-link {{ $route == 'acounts.fee.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Salary</p>
                </a>
              </li>
            </ul>

             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('other.cost.view')}}" class="nav-link {{ $route == 'other.cost.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Other Cost</p>
                </a>
              </li>
            </ul>

      

        
          </li>



       











 
          
            </ul>
          </li></ul>
      </nav>