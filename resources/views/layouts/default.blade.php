<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @section('title')
            | SpaceTime
        @show
    </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/app.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/dashboard.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/spacetime.css')}}">
@yield('header_styles')
<!-- end of global css -->
</head>
<body class="skin-coreplus">
    <?php /*
<div class="preloader">
    <div class="loader_img"><img src="{{asset('assets/img/loader.gif')}}" alt="loading..." height="64" width="64"></div>
</div> */ ?>
<!-- header logo-->
<header class="header">
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="{{ @url('/') }}" class="logo">
            <img src="{{asset('assets/img/logo.png')}}" alt="logo"/>
        </a>
        <div>
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <i class="fa fa-fw fa-bars"></i>
            </a>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i
                                class="fa fa-fw fa-envelope-o black"></i>
                        <span class="label label-success">2</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages table-striped">
                        <li class="dropdown-title">New Messages</li>
                        <li>
                            <a href="" class="message striped-col">
                                <img class="message-image img-circle" src="{{asset('assets/img/authors/avatar7.jpg')}}"
                                     alt="avatar-image">

                                <div class="message-body"><strong>Ernest Kerry</strong>
                                    <br>
                                    Can we Meet?
                                    <br>
                                    <small>Just Now</small>
                                    <span class="label label-success label-mini msg-lable">New</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="message">
                                <img class="message-image img-circle" src="{{asset('assets/img/authors/avatar6.jpg')}}"
                                     alt="avatar-image">

                                <div class="message-body"><strong>John</strong>
                                    <br>
                                    Dont forgot to call...
                                    <br>
                                    <small>5 minutes ago</small>
                                    <span class="label label-success label-mini msg-lable">New</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="message striped-col">
                                <img class="message-image img-circle" src="{{asset('assets/img/authors/avatar5.jpg')}}"
                                     alt="avatar-image">

                                <div class="message-body">
                                    <strong>Wilton Zeph</strong>
                                    <br>
                                    If there is anything else &hellip;
                                    <br>
                                    <small>14/10/2014 1:31 pm</small>
                                </div>

                            </a>
                        </li>
                        <li>
                            <a href="" class="message">
                                <img class="message-image img-circle" src="{{asset('assets/img/authors/avatar1.jpg')}}"
                                     alt="avatar-image">
                                <div class="message-body">
                                    <strong>Jenny Kerry</strong>
                                    <br>
                                    Let me know when you free
                                    <br>
                                    <small>5 days ago</small>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="message striped-col">
                                <img class="message-image img-circle" src="{{asset('assets/img/authors/avatar.jpg')}}"
                                     alt="avatar-image">
                                <div class="message-body">
                                    <strong>Tony</strong>
                                    <br>
                                    Let me know when you free
                                    <br>
                                    <small>5 days ago</small>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-footer"><a href="#">View All messages</a></li>
                    </ul>

                </li>
                <!--tasks-->
                <li class="dropdown tasks-menu hidden-xs">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-fw fa-edit black"></i>
                        <span class="label label-primary">4</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li class="dropdown-title">You Have 4 Tasks</li>
                        <li>
                            <a href="" class="message striped-col">
                                Design some buttons
                                <small class="pull-right">20%</small>
                                <div class="message-body">
                                    <div class="progress progress-xs progress_task">
                                        <div class="progress-bar progress-bar-primary" style="width: 20%"
                                             role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                             aria-valuemax="100">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="message">
                                Create a nice theme
                                <small class="pull-right">40%</small>
                                <div class="message-body">
                                    <div class="progress progress-xs progress_task">
                                        <div class="progress-bar progress-bar-success" style="width: 40%"
                                             role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                             aria-valuemax="100">
                                            <span class="sr-only">40% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="message striped-col">
                                Some task I need to do
                                <small class="pull-right">60%</small>
                                <div class="message-body">
                                    <div class="progress progress-xs progress_task">
                                        <div class="progress-bar progress-bar-danger" style="width: 60%"
                                             role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                             aria-valuemax="100">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="message">
                                Make beautiful transitions
                                <small class="pull-right">80%</small>
                                <div class="message-body">
                                    <div class="progress progress-xs progress_task">
                                        <div class="progress-bar progress-bar-warning" style="width: 80%"
                                             role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                             aria-valuemax="100">
                                            <span class="sr-only">80% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-footer"><a href="#"> View All Tasks</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle toggle-right">
                        <i class="fa fa-fw fa-comments-o black"></i>
                        <span class="label label-danger">9</span>
                    </a>
                </li>
                <!-- Notifications: style can be found in dropdown-->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-fw fa-bell-o black"></i>
                        <span class="label label-warning">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li class="dropdown-title">You have 8 notifications</li>

                        <li>
                            <a href="" class="message icon-not striped-col">
                                <img class="message-image img-circle" src="{{asset('assets/img/authors/avatar3.jpg')}}"
                                     alt="avatar-image">

                                <div class="message-body">
                                    <strong>John Doe</strong>
                                    <br>
                                    5 members joined today
                                    <br>
                                    <span class="noti-date">Just now</span>
                                </div>

                            </a>
                        </li>
                        <li>
                            <a href="" class="message icon-not">
                                <img class="message-image img-circle" src="{{asset('assets/img/authors/avatar.jpg')}}"
                                     alt="avatar-image">
                                <div class="message-body">
                                    <strong>Tony</strong>
                                    <br>
                                    likes a photo of you
                                    <br>
                                    <span class="noti-date">5 min</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="message icon-not striped-col">
                                <img class="message-image img-circle" src="{{asset('assets/img/authors/avatar6.jpg')}}"
                                     alt="avatar-image">

                                <div class="message-body">
                                    <strong>John</strong>
                                    <br>
                                    Dont forgot to call...
                                    <br>
                                    <span class="noti-date">11 min</span>

                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="message icon-not">
                                <img class="message-image img-circle" src="{{asset('assets/img/authors/avatar1.jpg')}}"
                                     alt="avatar-image">
                                <div class="message-body">
                                    <strong>Jenny Kerry</strong>
                                    <br>
                                    Very long description here...
                                    <br>
                                    <span class="noti-date">1 Hour</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="" class="message icon-not striped-col">
                                <img class="message-image img-circle" src="{{asset('assets/img/authors/avatar7.jpg')}}"
                                     alt="avatar-image">

                                <div class="message-body">
                                    <strong>Ernest Kerry</strong>
                                    <br>
                                    2 members joined today
                                    <br>
                                    <span class="noti-date">3 Days</span>

                                </div>
                            </a>
                        </li>
                        <li class="dropdown-footer"><a href="#"> View All Notifications</a></li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown-->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle padding-user" data-toggle="dropdown">
                        <img src="{{asset('assets/img/authors/avatar1.jpg')}}" width="35"
                             class="img-circle img-responsive pull-left"
                             height="35" alt="User Image">
                        <div class="riot">
                            <div>
                                @auth
                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                @endauth
                                <span>
                                        <i class="caret"></i>
                                    </span>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{asset('assets/img/authors/avatar1.jpg')}}" class="img-circle" alt="User Image">
                            <p> @auth
                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                @endauth</p>
                        </li>
                        <!-- Menu Body -->
                        <li class="p-t-3"><a href="{{ @route('dashboard.profile.index') }}"> <i class="fa fa-fw fa-user"></i> My
                                Profile </a>
                        </li>
                        <li role="presentation"></li>
                        <li><a href="{{ route('dashboard.profile.index') }}"> <i class="fa fa-fw fa-gear"></i> Account Settings
                            </a></li>
                        <li role="presentation" class="divider"></li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ URL :: to('lockscreen') }}">
                                    <i class="fa fa-fw fa-lock"></i>
                                    Lock
                                </a>
                            </div>
                            <div class="pull-right">
                                
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-fw fa-sign-out"></i>
                                    Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- For horizontal menu -->
@yield('horizontal_header')
<!-- horizontal menu ends -->
<div class="wrapper row-offcanvas row-offcanvas-left">
    @include('layouts.menu.leftmenu')

    <aside class="right-side">
        @include ('layouts.alerts.alerts')
        <!-- Content -->
        @yield('content')
    </aside>
    <!-- page wrapper-->
</div>
<!-- wrapper-->
<!-- global js -->
<script src="{{asset('assets/js/app.js')}}" type="text/javascript"></script>
<!-- end of global js -->
@yield('footer_scripts')
<!-- end page level js -->
</body>

</html>
