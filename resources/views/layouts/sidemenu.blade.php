

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta http-equiv="cache-control" content="private, max-age=0, no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('/img/feulogo.png') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <!-- Font Awesome-->
    <script src="https://kit.fontawesome.com/6c4cf2d8a5.js"></script>

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

    <!-- Side Menu -->
    <link rel="stylesheet" href={{"/css/sidemenu.css"}}>



    <!-- DATA TABLES -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">





<!-- Font Awesome -->
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">









</head>

<style>
    #sticky-footer {
        flex-shrink: none;
    }

    .btns{
        background-color:gold;
    }

</style>

<body oncontextmenu="return false" >
    {{-- This comment will not be present in the rendered HTML --}}


    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm border border-dark shadow-lg btns">
            <img src={{url("img/feuTamaraw.png")}} height="90px;">
            <small style="color:green;"><strong>Tamaraw Menu</strong></small>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="{{ url('/home') }}" class="text-success text-center">Payroll System
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
                        <span class="user-name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
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
                            <span class="text-success">General</span>
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

                    


                    @can('CoAdmin')
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-users"></i>
                                <span class="text-white">Employee Management</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="{{('/AddEmployeeNF')}}" class="text-white"><i class="fas fa-user"></i> Non-Faculty </a>
                                    </li>
                                    <li>
                                        <a href="{{('/AddEmployeeF')}}" class="text-white"><i class="fas fa-user"></i> 
                                            Faculty </a>
                                    </li>
                                   

                                </ul>
                            </div>
                        </li>
                        @endcan


                        @can('CoAdmin')
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-calculator"></i>
                                <span class="text-white">Payroll Computation </span>

                                 <!--
                            <span class="badge badge-pill badge-warning">3</span>
                                 -->
                            </a>
                            <div class="sidebar-submenu">
                                <ul>




                                    <li>
                                        <a href="{{('/PayrollComputation')}}" class="text-white"><i
                                                class="fas fa-coins"></i>
                                           Monthly Pay </a>
                                    </li>                                    <!--
                                    <li>
                                        <a href="{{('/NonFacultyPayslip')}}" class="text-white"><i
                                                class="fas fa-file-invoice-dollar"></i>
                                           Non Faculty </a>
                                    </li>

                                    <li>
                                        <a href="{{('/PayrollFaculty')}}" class="text-white"><i
                                                class="fas fa-file-invoice-dollar"></i>
                                          Faculty </a>
                                    </li>
                                -->

                                </ul>
                            </div>
                        </li>
                        @endcan

                        @can('CoAdmin')
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-receipt"></i>
                                <span class="text-white">Payroll</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>

                                    <li>
                                        <a href="{{('/NonFacultyPayroll')}}" class="text-white"><i
                                                class="fas fa-file-invoice-dollar"></i>
                                           Generate Payslip </a>
                                    </li>

                           


                                </ul>
                            </div>
                        </li>
                        @endcan

                      


                        @can('CoAdmin')
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-receipt"></i>
                                <span class="text-white">Reports</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>

                                    <li>
                                        <a href="{{('/Reports')}}" class="text-white"><i
                                                class="fas fa-file-invoice-dollar"></i>
                                           Generate Reports </a>
                                    </li>

                           


                                </ul>
                            </div>
                        </li>
                        @endcan

                        

                        <!--
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

                    -->

                    @can('Admin')
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fas fa-file-signature"></i>
                            <span class="text-white">Payroll Computations</span>
                           
                            <!--
                            <span class="badge badge-pill badge-warning">3</span>
                            -->
                               
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="{{('/PayslipApproval')}}" class="text-white"><i class="fas fa-file-alt"></i>
                                       Computation Approval
                                        </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endcan

                    
                    @can('Admin')
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fas fa-file-signature"></i>
                            <span class="text-white">Payrolls</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>

                                <li>
                                    <a href="{{('/PayrollApproval')}}" class="text-white"><i class="fas fa-file-alt"></i>
                                       Payroll Approval
                                        </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endcan

                        @can('Admin')
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-file-signature"></i>
                                <span class="text-white">Reports</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>

                                    <li>
                                            <a href="{{('/ReportsApproval')}}" class="text-white"><i class="fas fa-file-alt"></i>
                                                Reports Approval</a>
                                        </li>

                                 <!--
                                    <li>
                                        <a href="{{('/masterfile')}}" class="text-white"><i class="fas fa-file-alt"></i>
                                            Employee Details</a>
                                    </li>

                                    <li>
                                            <a href="{{'/thirteenmonthpay'}}" class="text-white"><i
                                                    class="fas fa-file-invoice-dollar"></i>
                                                13th Month Pay</a>
                                        </li>
                                    -->
                                </ul>
                            </div>
                        </li>
                        @endcan

                      
                        @can('HR')
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-users"></i>
                                <span class="text-white">Employee Management</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>

                                    <li>
                                            <a href="{{('/HR/Employee')}}" class="text-white"><i class="fas fa-file-alt"></i>
                                               Employees </a>
                                        </li>
                                </ul>
                            </div>
                        </li>
                        @endcan

                        @can('HR')
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fas fa-file-signature"></i>
                                <span class="text-white">Configurations</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>

                                    <li>
                                            <a href="{{('/CC')}}" class="text-white"><i class="fas fa-file-alt"></i>
                                               Cost Center </a>
                                        </li>
                                        <li>
                                                <a href="{{('/ES')}}" class="text-white"><i class="fas fa-file-alt"></i>
                                                   Employment Status </a>
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

                        <li>

                            <a href="{{action('ChangePasswordController@form',[Crypt::encrypt(Auth::user()->id)]) }}"><i class="fas fa-key"></i>
                                <span class="text-white">Change Password</span></a>

                        </li>


                        <!--
                        @can('ticket_reports')
                        <li>

                            <a href="{{('/tickets')}}"><i class="fas fa-bug text-danger"></i>
                                <span class="text-white">Ticket Reports</span></a>

                        </li>
                        @endcan
                    -->
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
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
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



            
                    <div class="d-flex justify-content-center"><img src={{url("img/feulogo.png")}} height="80px;"></div>
                    <div class="d-flex justify-content-center"><img src={{url("img/feuname.png")}} height="40px;"></div>
            <hr>

                <br>
                @yield('content')


            </div>

        </main>
        <!-- page-content" -->

    </div>

    <footer id="sticky-footer" class="py-2 bg-dark text-white-50">
        <div class="container text-center">
            <small>Copyright &copy; Feu Cavite</small>
        </div>
    </footer>

    <!-- SIDE MENU -->
    <script src={{url('/js/sidemenu.js')}}></script>

</body>





<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>



<script>


$(document).ready(function () {
    const timeout = 900000;  // 900000 ms = 15 minutes
    var idleTimer = null;
    $('*').bind('mousemove click mouseup mousedown keydown keypress keyup submit change mouseenter scroll resize dblclick', function () {
        clearTimeout(idleTimer);

        idleTimer = setTimeout(function () {
            document.getElementById('logout-form').submit();
        }, timeout);
    });
    $("body").trigger("mousemove");
});

</script>

<!--AJAX -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="print.js"></script>

<script>
    shortcut = {
            all_shortcuts: {},
            add: function (e, t, n) {
                var r = {
                    type: "keydown",
                    propagate: !1,
                    disable_in_input: !1,
                    target: document,
                    keycode: !1
                };
                if (n)
                    for (var i in r) "undefined" == typeof n[i] && (n[i] = r[i]);
                else n = r;
                r = n.target, "string" == typeof n.target && (r = document.getElementById(n.target)), e = e
                    .toLowerCase(), i = function (r) {
                        r = r || window.event;
                        if (n.disable_in_input) {
                            var i;
                            r.target ? i = r.target : r.srcElement && (i = r.srcElement), 3 == i.nodeType && (i = i
                                .parentNode);
                            if ("INPUT" == i.tagName || "TEXTAREA" == i.tagName) return
                        }
                        r.keyCode ? code = r.keyCode : r.which && (code = r.which), i = String.fromCharCode(code)
                            .toLowerCase(), 188 == code && (i = ","), 190 == code && (i = ".");
                        var s = e.split("+"),
                            o = 0,
                            u = {
                                "`": "~",
                                1: "!",
                                2: "@",
                                3: "#",
                                4: "$",
                                5: "%",
                                6: "^",
                                7: "&",
                                8: "*",
                                9: "(",
                                0: ")",
                                "-": "_",
                                "=": "+",
                                ";": ":",
                                "'": '"',
                                ",": "<",
                                ".": ">",
                                "/": "?",
                                "\\": "|"
                            },
                            f = {
                                esc: 27,
                                escape: 27,
                                tab: 9,
                                space: 32,
                                "return": 13,
                                enter: 13,
                                backspace: 8,
                                scrolllock: 145,
                                scroll_lock: 145,
                                scroll: 145,
                                capslock: 20,
                                caps_lock: 20,
                                caps: 20,
                                numlock: 144,
                                num_lock: 144,
                                num: 144,
                                pause: 19,
                                "break": 19,
                                insert: 45,
                                home: 36,
                                "delete": 46,
                                end: 35,
                                pageup: 33,
                                page_up: 33,
                                pu: 33,
                                pagedown: 34,
                                page_down: 34,
                                pd: 34,
                                left: 37,
                                up: 38,
                                right: 39,
                                down: 40,
                                f1: 112,
                                f2: 113,
                                f3: 114,
                                f4: 115,
                                f5: 116,
                                f6: 117,
                                f7: 118,
                                f8: 119,
                                f9: 120,
                                f10: 121,
                                f11: 122,
                                f12: 123
                            },
                            l = !1,
                            c = !1,
                            h = !1,
                            p = !1,
                            d = !1,
                            v = !1,
                            m = !1,
                            y = !1;
                        r.ctrlKey && (p = !0), r.shiftKey && (c = !0), r.altKey && (v = !0), r.metaKey && (y = !0);
                        for (var b = 0; k = s[b], b < s.length; b++) "ctrl" == k || "control" == k ? (o++, h = !0) :
                            "shift" == k ? (o++, l = !0) : "alt" == k ? (o++, d = !0) : "meta" == k ? (o++, m = !
                            0) : 1 < k.length ? f[k] == code && o++ : n.keycode ? n.keycode == code && o++ : i ==
                            k ? o++ : u[i] && r.shiftKey && (i = u[i], i == k && o++);
                        if (o == s.length && p == h && c == l && v == d && y == m && (t(r), !n.propagate)) return r
                            .cancelBubble = !0, r.returnValue = !1, r.stopPropagation && (r.stopPropagation(), r
                                .preventDefault()), !1
                    }, this.all_shortcuts[e] = {
                        callback: i,
                        target: r,
                        event: n.type
                    }, r.addEventListener ? r.addEventListener(n.type, i, !1) : r.attachEvent ? r.attachEvent("on" +
                        n.type, i) : r["on" + n.type] = i
            },
            remove: function (e) {
                var e = e.toLowerCase(),
                    t = this.all_shortcuts[e];
                delete this.all_shortcuts[e];
                if (t) {
                    var e = t.event,
                        n = t.target,
                        t = t.callback;
                    n.detachEvent ? n.detachEvent("on" + e, t) : n.removeEventListener ? n.removeEventListener(e, t,
                        !1) : n["on" + e] = !1
                }
            }
        },
        shortcut.add("Ctrl+U", function () {
            alert('Sorry! Not allowed to do that!')
        }),
        shortcut.add("Meta+Alt+U", function () {
            alert('Sorry! Not allowed to do that!')
        }),
        shortcut.add("Ctrl+C", function () {
            alert('Sorry! Not allowed to do that!')
        }),
        shortcut.add("Meta+C", function () {
            alert('Sorry! Not allowed to do that!')
        });
        shortcut.add("Ctrl+Shift+i", function () {
            alert('Sorry! Not allowed to do that!')
        });

</script>


<script>
    var clickedOnScrollbar = function (mouseX) {
        if ($(window).outerWidth() <= mouseX) {
            return true;
        }
    }

    $(document).mousedown(function (e) {
        var isRightMB;
        e = e || window.event;

        if ("which" in e)
            isRightMB = e.which == 3;
        else if ("button" in e)
            isRightMB = e.button == 2;


        if (isRightMB) {
            if (clickedOnScrollbar(e.clientX)) {
                alert("Sorry! Not Allowed to do That!");
            }
        }
    });

</script>

<!-- DATA TABLES -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<!--
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
-->

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>



<!--DATA TABLE JS -->


<script>
        $(document).ready(function () {
            $('#FONE').DataTable({
                "order": [
                    [0, "desc"]
                ]
            });
        });
    
    </script>

<script>
        $(document).ready(function () {
            $('#FTWO').DataTable({
                "order": [
                    [0, "desc"]
                ]
            });
        });
    
    </script>

<script>
        $(document).ready(function () {
            $('#FTHREE').DataTable({
                "order": [
                    [0, "desc"]
                ]
            });
        });
    
    </script>

    
<script>
        $(document).ready(function () {
            $('#FFOUR').DataTable({
                "order": [
                    [0, "desc"]
                ]
            });
        });
    
    </script>

    
<script>
        $(document).ready(function () {
            $('#FFIVE').DataTable({
                "order": [
                    [0, "desc"]
                ]
            });
        });
    
    </script>

<script>
        $(document).ready(function () {
            $('#PONE').DataTable({
                "order": [
                    [0, "desc"]
                ]
            });
        });
    
    </script>





<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            "order": [
                [0, "desc"]
            ]
        });
    });

</script>

<script>
        $(document).ready(function () {
            $('#displayThree').DataTable({
                "order": [
                    [0, "desc"]
                ]
            });
        });
    
    </script>

<script>
        $(document).ready(function () {
            $('#displayFour').DataTable({
                "order": [
                    [0, "desc"]
                ]
            });
        });
    
    </script>

<!--DATA TABLE JS -->
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            "order": [
                [0, "desc"]
            ]
        });
    });

</script>

<!--DATA TABLE JS -->
<script>
    $(document).ready(function () {
        $('#NFMasterFile').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i> PDF',
                className:  'border border-danger',
                titleAttr: 'PDF',
                orientation: 'landscape',
                exportOptions: {columns: [1, 2,3,4,5,6,7,8,9,10]},
                title: 'Non-Faculty Details'
            },
        ]
        });
    });

</script>

<!--DATA TABLE JS -->
<script>
    $(document).ready(function () {
        $('#FMasterFile').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i> PDF',
                className:  'border border-danger',
                titleAttr: 'PDF', 
                orientation: 'landscape',
                exportOptions: {columns: [1, 2,3,4,5,6,7,8,9,10,11,12,13,14,15,16]},
                title: 'Faculty Details'
            },
        ]
        });
    });

</script>

<!--DATA TABLE JS -->
<script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    
    </script>

  

    <!--DATA TABLE JS -->
<script>
        $(document).ready(function () {
            $('#displayTwo').DataTable();
        });
    
    </script>


<script>

        $(document).ready(function() {
            $('#example').DataTable( {
                
                dom: 'Bfrtip',

                // Buttons
                buttons: [
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i> Excel',
                className:  'border border-success',
                titleAttr: 'Excel',
                exportOptions: {columns: [1, 2]}
                    
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i> CSV',
                className:  'border border-warning',
                titleAttr: 'CSV',
                exportOptions: {columns: [1, 2]}
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i> PDF',
                className:  'border border-danger',
                titleAttr: 'PDF',
                exportOptions: {columns: [1, 2]}
            },
           
            //{
            //text: 'Reload',
            //action: function ( e, dt, node, config ) {
            //    dt.ajax.reload();
            //}
       // },
        
                ]
//End of Button

                
            } );
            

           
            
        } );
        
        </script>
    





<script>
    $(document).ready(function () {
        $('#sss_table').DataTable({
            dom: 'Bfrtip',
            // Buttons
            buttons: [{
                    extend: 'excelHtml5',
                    text: '<i class="fa fa-file-excel-o"></i> Excel',
                    className: 'border border-success',
                    titleAttr: 'Excel',
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="fa fa-file-pdf-o"></i> PDF',
                    className: 'border border-danger',
                    titleAttr: 'PDF',
                },
                {
                    text: 'Reload',
                    action: function (e, dt, node, config) {
                        dt.ajax.reload();
                    }
                },
            ]
            //End of Button    
        });
    });

</script>












<uses-permission android:name="android.permission.INTERNET" />
<uses-permission android:name="android.permission.ACCESS_NETWORK_STATE" />


@include('sweetalert::alert')





</html>
