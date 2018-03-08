<?php
    //$routename = Route::currentRouteName();
    $routename = \Request::route()->getName();
    $routeparams = \Request::route()->parameters();
    if(empty($routeparams)){
        $routeparams = 1;
    }
?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar-->
    <section class="sidebar">
        <div id="menu" role="navigation">
            <div class="nav_profile">
                <div class="media profile-left">
                    <a class="pull-left profile-thumb" href="#">
                        <img src="{{asset('assets/img/authors/avatar1.jpg')}}" class="img-circle" alt="User Image">
                    </a>
                    <div class="content-profile">
                        <h4 class="media-heading">
                            @auth
                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                            @endauth
                        </h4>
                        <ul class="icon-list">
                            <li>
                                <a href="{{ @route('profile') }} ">
                                    <i class="fa fa-fw fa-user"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('lockscreen') }} ">
                                    <i class="fa fa-fw fa-lock"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ @route('profile') }} ">
                                    <i class="fa fa-fw fa-gear"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('login') }} ">
                                    <i class="fa fa-fw fa-sign-out"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="navigation">

                <?php /*  // ROUTENAME ?>
                <li {!! (Request::is('location')|| Request::is('/')? 'class="active"':"") !!}>
                    <!-- {{ $routename==='login' ? 'class="active"':"" }} -->
                    <a href="{{ @route('dashboard') }} ">
                        <i class="menu-icon fa fa-fw fa-home"></i>
                        <span class="mm-text "><?php echo 'ROUTENAME: '.$routename ?></span>
                    </a>
                </li> */ ?>

                <?php // DASHBOARD ?>
                <li {!! ($routename===('dashboard')|| Request::is('/')? 'class="active"':"") !!}>
                    <a href="{{ @route('dashboard') }} ">
                        <i class="menu-icon fa fa-fw fa-home"></i>
                        <span class="mm-text ">Dashboard</span>
                    </a>
                </li>

                <?php // USER ?>
                <li {!! 
                ($routename===('guests')||$routename===('staff')||$routename===('users')||$routename===('users')||$routename===('adduser')||$routename===('profile')? 'class="active"':"") 

                !!}>
                    <a href="#">
                        <i class="menu-icon fa fa-fw fa-users"></i>
                        <span>Users</span> <span
                                class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li {!! ($routename===('guests')? 'class="active"':"") !!}>
                            <a href="{{ @route('guests') }} ">
                                <i class="fa fa-list" aria-hidden="true"></i> Users
                            </a>
                        </li>

                        <li {!! ($routename===('adduser')? 'class="active"':"") !!}>
                            <a href="{{ @route('adduser') }} ">
                                <i class="fa fa-fw fa-user"></i> Add New User
                            </a>
                        </li>
                        <li {!! ($routename===('profile')? 'class="active"':"") !!}>
                            <a href="{{ @route('profile') }} ">
                                <i class="fa fa-fw fa-user-md"></i> View My Profile
                            </a>
                        </li>
                    </ul>
                </li>

                <?php  // CALENDAR ?>
                <li {!! ($routename===('events.create')||$routename===('calendar.location')||$routename===('calendar')||$routename===('events')? 'class="active"':"") !!}>
                    <a href="#">
                        <i class="menu-icon fa fa-fw fa-calendar"></i>
                        <span>Scheduling  Events</span> <span
                                class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        @if (!empty($calendar_locations))
                        @foreach($calendar_locations as $cal_loc)
                            <li>
                             <?php
                               /* if( $routeparams['location_id']==$cal_loc->id ){
                                    echo '<li class="active" >';
                                }else{
                                    echo '<li>';
                                } */
                                    ?>

                                <a href="{{ @route('calendar') }}/{{$cal_loc->id}} ">
                                    <i class="fa fa-calendar-o" aria-hidden="true"></i> {{$cal_loc->name}}
                                </a>
                            </li>
                        @endforeach
                        @endif
                        <li {!! ($routename===('events')? 'class="active"':"") !!}>
                            <a href="{{ @route('events') }} ">
                                <i class="fa fa-list" aria-hidden="true"></i> Event List
                            </a>
                        </li>
                        <li {!! ($routename===('events.create')? 'class="active"':"") !!}>
                            <a href="{{ @route('events.create') }} ">
                                <i class="fa fa-list" aria-hidden="true"></i> Create Event
                            </a>
                        </li>
                    </ul>
                </li>

                <?php // LOCATION ?>
                <li {!! ($routename===('location.index')||$routename===('location.create')? 'class="active"':"") !!}>
                    <a href="#">
                        <i class="menu-icon fa fa-fw fa-location-arrow"></i>
                        <span>Location</span> <span
                                class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li {!! ($routename===('location.index')? 'class="active"':"") !!}>
                            <a href="{{ @route('location.index') }} ">
                                <i class="fa fa-list" aria-hidden="true"></i> Locations
                            </a>
                        </li>
                        <li {!! ($routename===('location.create')? 'class="active"':"") !!}>
                            <a href="{{ @route('location.create') }} ">
                                <i class="fa fa-map-marker" aria-hidden="true"></i> Create Location
                            </a>
                        </li>
                    </ul>
                </li>

                <?php // MEDIA ?>
                <li {!! ($routename===('media.index')||$routename===('media.create')? 'class="active"':"") !!}>
                    <a href="#">
                        <i class="menu-icon fa fa-fw fa-camera"></i>
                        <span>Media</span> <span
                                class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li {!! ($routename===('media.index')? 'class="active"':"") !!}>
                            <a href="{{ @route('media.index') }} ">
                                <i class="fa fa-list" aria-hidden="true"></i> Media Library
                            </a>
                        </li>
                        <li {!! ($routename===('media.create')? 'class="active"':"") !!}>
                            <a href="{{ @route('media.create') }} ">
                                <i class="fa fa-map-marker" aria-hidden="true"></i> Add Media
                            </a>
                        </li>
                    </ul>
                </li>

                <?php // TRAFFIC ?>
                <li {!! ($routename===('analytics')||$routename===('checkin')||$routename===('sales')? 'class="active"':"") !!}>
                    <a href="#">
                        <i class="menu-icon fa fa-fw fa-line-chart"></i>
                        <span>Traffic</span> <span
                                class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li {!! ($routename===('analytics')? 'class="active"':"") !!}>
                            <a href="{{ @route('analytics') }} ">
                                <i class="fa fa-tachometer" aria-hidden="true"></i> View Analytics
                            </a>
                        </li>
                        <li {!! ($routename===('checkin')? 'class="active"':"") !!}>
                            <a href="{{ @route('checkin') }} ">
                                <i class="fa fa-list" aria-hidden="true"></i> View Check-in List
                            </a>
                        </li>
                        <li {!! ($routename===('sales')? 'class="active"':"") !!}>
                            <a href="{{ @route('sales') }} ">
                                <i class="fa fa-barcode" aria-hidden="true"></i> Sales
                            </a>
                        </li>
                    </ul>
                </li>

                <?php // LOCKSCREEN ?>
                <li {{ ($routename===('login')? 'class="active"':"") }}>
                    <a href="{{ @route('login') }} ">
                        <i class="menu-icon fa fa-fw fa-lock"></i>
                        <span class="mm-text ">Lockscreen: {{Request::segment(2)}}</span>
                    </a>
                </li>

                <?php // LOGOUT ?>
                <li {!! ($routename===('login')? 'class="active"':"") !!}>
                    <a href="{{ @route('login') }} ">
                        <i class="menu-icon fa fa-fw fa-sign-out"></i>
                        <span class="mm-text ">Logout</span>
                    </a>
                </li>

                    <?php // TENANT ?>

                    <?php /*
                    <li>
                        <a href="{{ @route('tenant') }} ">
                            <i class="menu-icon fa fa-fw fa-sign-out"></i>
                            <span class="mm-text ">Tenant</span>
                        </a>
                    </li> */ ?>

            </ul>
            <!-- / .navigation -->
        </div>
        <!-- menu -->
    </section>
    <!-- /.sidebar -->
</aside>