<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page') - {{ config('app.name', 'Ticketit') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Side Menu -->
    <link rel="stylesheet" href={{"/css/sidemenu.css"}}>


</head>
<body oncontextmenu="return false">
{{-- This comment will not be present in the rendered HTML --}}


    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-warning">
            <img src={{url("img/feuTamaraw.png")}} height="90px;">
            <small style="color:#008349;"><strong>Tamaraw Menu</strong></small>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
                <div class="sidebar-content">
                    <div class="sidebar-brand">
                        <a href="{{ url('/') }}" class="text-success text-center">Payroll System
                            <div class="row justify-content-center"><small>Feu Cavite</small></div></a>
                        <div id="close-sidebar">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                    <div class="sidebar-header">
                        <div class="user-pic">
                            <img class="img-responsive img-rounded" src={{url("img/tamtam.png")}} alt="User picture">
                        </div>
                        <div class="user-info">
                            <span class="user-name">{{ Auth::user()->name }}
                            </span>
                            <span class="user-role">{{ Auth::user()->type }}</span>
                            <span class="user-status">
                                {{Auth::user()->emp_id}}
                            </span>
                            <!--
                            <span class="user-status">
                                <i class="fa fa-circle"></i>
                                <span>Online</span>
                            </span>
                        -->
    
                        </div>
                    </div>
                    <!-- sidebar-header  
                <div class="sidebar-search">
                    <div>
                        <div class="input-group">
                            <input type="text" class="form-control search-menu" placeholder="Search...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                -->
                    <!-- sidebar-search  -->
                    <div class="sidebar-menu">
                        <ul>
                            <li class="header-menu">
                                <span class="text-warning">General</span>
                            </li>
    
                            <li class="sidebar-dropdown">
                                <a href="{{'/home'}}">
                                    <i class="fa fa-tachometer-alt"></i>
                                    <span class="text-success">Dashboard</span>
                                </a>
                            </li>
    
                            @can('Developers_User_Manangement')
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fas fa-user-cog"></i>
                                    <span class="text-white">User Management</span>
                                    <!--
                                <span class="badge badge-pill badge-danger">3</span>
                                -->
                                </a>
    
                                <div class="sidebar-submenu">
                                    <ul>
    
                                        <li><a class="nav-link" href="{{ route('users.index') }}" class="text-white"><i
                                                    class="fas fa-user-shield"></i> Manage Users</a></li>
                                        @can('Developers_User_Roles')
                                        <li><a class="nav-link" href="{{ route('roles.index') }}" class="text-white"><i
                                                    class="fas fa-user-lock"></i> Manage Role</a></li>
                                        @endcan
                                    </ul>
                                </div>
                            </li>
                            @endcan
    
                            @can('SuperAdmin_User_Management')
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fas fa-users"></i>
                                    <span class="text-white">User Management</span>
                                    <!--
                                <span class="badge badge-pill badge-danger">3</span>
                                -->
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a href="{{('/employee/create')}}" class="text-white"><i
                                                    class="fas fa-user-plus"></i> Add Accounts
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{('/employee')}}" class="text-white"><i class="fas fa-user-cog"></i>
                                                Manage
                                                Accounts
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            @endcan
    
                            <!--
                            @can('department')
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fas fa-building"></i>
                                    <span class="text-white">Department</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        @can('department-create')
                                        <li>
                                            <a href="{{('/department/create')}}" class="text-white"><i
                                                    class="fas fa-plus-circle"></i> Create Department</a>
                                        </li>
                                        @endcan
                                        <li>
                                            <a href="{{('/department')}}" class="text-white"><i class="fas fa-tasks"></i>
                                                Manage Department</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            @endcan
    
                        -->
                            <!--
                            @can('position')
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fas fa-portrait"></i>
                                    <span class="text-white">Position</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a href="{{('/position/create')}}" class="text-white"><i
                                                    class="fas fa-plus-circle"></i> Create Position</a>
                                        </li>
                                        <li>
                                            <a href="{{('/position')}}" class="text-white"><i
                                                    class="fas fa-tasks"></i> Manage Position</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            @endcan
    
                        -->
                            <!--
                            @can('position')
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fas fa-user-clock"></i>
                                    <span class="text-white">Attendance</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a href="{{('/dailyAttendance')}}" class="text-white"><i
                                                    class="fas fa-clock"></i> Daily Attendance</a>
                                        </li>
                                        <li>
                                            <a href="{{('/attendanceReport')}}" class="text-white"><i
                                                    class="fas fa-history"></i> Attendance Report</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            @endcan
    
                        -->
                            <!--
                            <!--
                            @can('holidays')
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span class="text-white">Holidays</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        @can('holidays-create')
                                        <li>
                                            <a href="{{('/addHoliday')}}" class="text-white"><i
                                                    class="fas fa-calendar-plus"></i>
                                                Add Holiday</a>
                                        </li>
                                        @endcan
                                        @can('holidays-manage')
                                        <li>
                                            <a href="{{('/calendar')}}" class="text-white"><i
                                                    class="fas fa-calendar-check"></i> Manage Holiday</a>
                                        </li>
                                        @endcan
    
                                    </ul>
                                </div>
                            </li>
                            @endcan
                        -->
                            <!--
                            @can('leaves')
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fas fa-calendar-times"></i>
                                    <span class="text-white">Leaves</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        @can('leaves-create')
                                        <li>
                                            <a href="{{('/applyLeave')}}" class="text-white"><i
                                                    class="fas fa-calendar-minus"></i>
                                                Apply for Leave</a>
                                        </li>
                                        @endcan
                                        @can('leaves-manage')
                                        <li>
                                            <a href="{{('/manageLeaves')}}" class="text-white"><i
                                                    class="fas fa-calendar-check"></i>
                                                Manage Leaves</a>
                                        </li>
                                        @endcan
                                    </ul>
                                </div>
                            </li>
                            @endcan
                        -->
    
    
                            @can('Admin_Employee_Management')
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fas fa-users"></i>
                                    <span class="text-white">Employee Management</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
    
                                        <li>
                                            <a href="{{('/NonFaculty')}}" class="text-white"><i class="fas fa-user"></i> Non
                                                Faculty </a>
                                        </li>
                                        <li>
                                            <a href="{{('/Faculty')}}" class="text-white"><i class="fas fa-user"></i> 
                                                Faculty</a>
                                        </li>
    
                                    </ul>
                                </div>
                            </li>
                            @endcan
                            <!--
                            @can('payroll')
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fas fa-file-invoice-dollar"></i>
                                    <span class="text-white">Payroll</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        @can('payroll-create')
                                        <li>
                                            <a href="{{('/payroll/create')}}" class="text-white"><i
                                                    class="fas fa-calculator"></i> Create Payroll</a>
                                        </li>
                                        @endcan
                                        @can('payroll-manage')
                                        <li>
                                            <a href="{{('/payroll')}}" class="text-white"><i class="fas fa-list-ol"></i>
                                                Manange Payroll</a>
                                        </li>
                                        @endcan
                                    </ul>
                                </div>
                            </li>
                            @endcan
                        -->
    
                        @can('Admin_Employee_Management')
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-receipt"></i>
                                <span class="text-white">Payslip</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
    
                                    <li>
                                        <a href="{{('/payslip')}}" class="text-white"><i
                                                class="fas fa-file-invoice-dollar"></i>
                                            Non Faculty </a>
                                    </li>
    
                                    <li>
                                        <a href="{{('/payslipFaculty')}}" class="text-white"><i
                                                class="fas fa-file-invoice-dollar"></i>
                                            Faculty Payslip</a>
                                    </li>
    
    
    
                                </ul>
                            </div>
                        </li>
                        @endcan
    
    
                            @can('Admin_Employee_Management')
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fas fa-receipt"></i>
                                    <span class="text-white">Payroll</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
    
                                        <li>
                                            <a href="{{('/PayrollNonFaculty')}}" class="text-white"><i
                                                    class="fas fa-file-invoice-dollar"></i>
                                               Non Faculty </a>
                                        </li>
    
                                        <li>
                                            <a href="{{('/PayrollFaculty')}}" class="text-white"><i
                                                    class="fas fa-file-invoice-dollar"></i>
                                              Faculty </a>
                                        </li>
    
    
                                    </ul>
                                </div>
                            </li>
                            @endcan
    
                            
    
                            @can('Payroll_Management')
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fas fa-file-signature"></i>
                                    <span class="text-white">Reports</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
    
                                        <li>
                                            <a href="{{('/masterfile')}}" class="text-white"><i class="fas fa-file-alt"></i>
                                                Employee Details</a>
                                        </li>
    
                                        <li>
                                                <a href="{{'/thirteenmonthpay'}}" class="text-white"><i
                                                        class="fas fa-file-invoice-dollar"></i>
                                                    13th Month Pay</a>
                                            </li>
    
    
                                    </ul>
                                </div>
                            </li>
                            @endcan
    
                            @can('Payroll_Management')
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fas fa-file-signature"></i>
                                    <span class="text-white">Payslips</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
    
                                        <li>
                                            <a href="{{('/NASPayslip')}}" class="text-white"><i class="fas fa-file-alt"></i>
                                                Non Faculty Payslip</a>
                                        </li>
    
                                        <li>
                                            <a href="{{('/FSPayslip')}}" class="text-white"><i class="fas fa-file-alt"></i>
                                                Faculty Payslip</a>
                                        </li>
    
                                    </ul>
                                </div>
                            </li>
                            @endcan
    
    
    
    
    
    
    
                            @can('profile')
                            <li>
                                <a href="{{('/profile')}}"><i class="fas fa-user"></i>
                                    <span class="text-white">Profile</span> </a>
                            </li>
                            @endcan
                            @can('payslip')
                            <li>
    
                                <a href="{{('/mypayslip')}}"><i class="fas fa-receipt"></i>
                                    <span class="text-white">Payslips</span></a>
    
                            </li>
                            @endcan
                            @can('time_logs')
                            <li>
    
                                <a href="{{('/mylogs')}}"><i class="fas fa-user-clock"></i>
                                    <span class="text-white">Time Logs</span></a>
    
                            </li>
                            @endcan
                            @can('audit-trail')
                            <li>
    
                                <a href="{{('/audit')}}"><i class="fas fa-server"></i>
                                    <span class="text-white">Audit Trail</span></a>
    
                            </li>
                            @endcan
                            @can('database')
                            <li>
    
                                <a href="{{('/backup')}}"><i class="fas fa-database"></i>
                                    <span class="text-white">Database</span></a>
    
                            </li>
                            @endcan
                            @can('ticket_reports')
                            <li>
    
                                <a href="{{('/tickets')}}"><i class="fas fa-bug text-danger"></i>
                                    <span class="text-white">Ticket Reports</span></a>
    
                            </li>
                            @endcan
                        </ul>
                    </div>
                    <!-- sidebar-menu  -->
    
                </div>
    
                <!-- sidebar-content  -->
                <div class="sidebar-footer">
                    <!--
                    <a href="#">
                        <i class="fa fa-bell"></i>
                       <span class="badge badge-pill badge-warning notification">3</span>
                    </a>
                -->
                    <!--
                    <a href="#">
                        <i class="fa fa-envelope"></i>
                        <span class="badge badge-pill badge-success notification">7</span>
                    </a>
                    -->
                    <!--
                    <a href="#">
                        <i class="fa fa-cog"></i>
                        <span class="badge-sonar"></span>
                    </a>
                -->
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off"></i> Logout
                    </a>
    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
    
                </div>
            </nav>

        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid">

                

                <nav class="shadow-lg p-1 border border-warning" style="background-color:#01582D;">
                <div class="d-flex justify-content-center"><img src={{url("img/feulogo.png")}} height="80px;"></div>
                </nav>

                <br>
               

                <div id="app">
                        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"  style="display: none;">
                            <div class="container">
                                <a class="navbar-brand" href="{{ url('/') }}">
                                    Ticket Report
                                </a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <!-- Left Side Of Navbar -->
                                    <ul class="navbar-nav mr-auto">
                
                                    </ul>
                
                                    <!-- Right Side Of Navbar -->
                                    <ul class="navbar-nav ml-auto">
                                        <!-- Authentication Links -->
                                        @guest
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            </li>
                                            @if (Route::has('register'))
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                                </li>
                                            @endif
                                        @else
                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    {{ Auth::user()->name }} <span class="caret"></span>
                                                </a>
                
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>
                
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </li>
                                        @endguest
                                    </ul>
                                </div>
                            </div>
                        </nav>
                
                        <div class="py-2"></div>
                        @yield('auth_content')
                        @yield('content')
                    </div>
                

            </div>

        </main>
        <!-- page-content" -->

    </div>

    <footer id="sticky-footer" class="py-2 bg-dark text-white-50">
        <div class="container text-center">
            <small>Copyright &copy; Feu Cavite</small>
        </div>
    </footer>

    <script src="/js/jquery.min.js"></script>


   

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
      <!-- SIDE MENU -->
      <script src={{url('/js/sidemenu.js')}}></script>

      
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>


    @yield('footer')
</body>
</html>
