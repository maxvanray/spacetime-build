<?php
    //$routename = Route::currentRouteName();
    $routename = \Request::route()->getName();
    $routeparams = \Request::route()->parameters();
    if(empty($routeparams)){
        $routeparams = 1;
    }

    //TODO: Replace PHP Comments with laravel comments
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
                                {{ Auth::user()->name }}
                            @endauth
                        </h4>
                        <ul class="icon-list">
                            <li>
                                <a href="{{ @route('dashboard.profile.index') }} ">
                                    <i class="fa fa-fw fa-user"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('lockscreen') }} ">
                                    <i class="fa fa-fw fa-lock"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ @route('dashboard.profile.index') }} ">
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
                (
                $routename===('dashboard.roles.index')||
                $routename===('dashboard.roles.create')||
                $routename===('dashboard.roles.edit')||
                $routename===('dashboard.permissions.index')||
                $routename===('dashboard.permissions.create')||
                $routename===('dashboard.permissions.edit')||
                $routename===('dashboard.users.index')||
                $routename===('dashboard.users.create')||
                $routename===('dashboard.users.show')||
                $routename===('dashboard.users.edit')||
                $routename===('dashboard.profile.index')? 'class="active"':""
                )
                !!}>
                    <a href="#">
                        <i class="menu-icon fa fa-fw fa-users"></i>
                        <span>Users</span> <span
                                class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li {!! ($routename===('dashboard.users.index')? 'class="active"':"") !!}>
                            <a href="{{ @route('dashboard.users.index') }} ">
                                <i class="fa fa-list" aria-hidden="true"></i> Users
                            </a>
                        </li>


                        <li {!! ($routename===('dashboard.permissions.edit')||$routename===('dashboard.permissions.index')||$routename===('dashboard.permissions.create')? 'class="active"':"") !!}>
                            <a href="{{ @route('dashboard.permissions.index') }} ">
                                <i class="fa fa-fw fa-user"></i> Permissions
                            </a>
                        </li>

                        <li {!! ($routename===('dashboard.roles.edit')||$routename===('dashboard.roles.create')||$routename===('dashboard.roles.index')? 'class="active"':"") !!}>
                            <a href="{{ @route('dashboard.roles.index') }} ">
                                <i class="fa fa-fw fa-user"></i> Roles
                            </a>
                        </li>

                        <li {!! ($routename===('dashboard.profile.index')? 'class="active"':"") !!}>
                            <a href="{{ @route('dashboard.profile.index') }} ">
                                <i class="fa fa-fw fa-user-md"></i> User Profile
                            </a>
                        </li>
                    </ul>
                </li>

                <?php  // CALENDAR ?>
                <li {!! (
                $routename===('dashboard.calendars.index')||
                $routename===('dashboard.calendars.show')||
                $routename===('dashboard.calendars.edit')||
                $routename===('dashboard.calendars.location')||

                $routename===('dashboard.events.index')||
                $routename===('dashboard.events.create')||
                $routename===('dashboard.events.show')
                ? 'class="active"':"") !!}>
                    <a href="#">
                        <i class="menu-icon fa fa-fw fa-calendar"></i>
                        <span>Events</span> <span
                                class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        @if (!empty($calendar_locations))
                        @foreach($calendar_locations as $cal_loc)
                             @php
                                if(is_array($routeparams) && array_key_exists('location_id', $routeparams)){
                                    if( $routeparams['location_id']==$cal_loc->id ){
                                        echo '<li class="active" >';
                                    }else{
                                        echo '<li>';
                                    }
                                }else{
                                    echo '<li>';
                                }
                             @endphp
                                <a href="{{ @route('dashboard.calendars.show', $cal_loc->id) }} ">
                                    <i class="fa fa-calendar-o" aria-hidden="true"></i> {{$cal_loc->name}}
                                </a>
                            </li>
                        @endforeach
                        @endif
                        <li {!! ($routename===('dashboard.events.index')||$routename===('dashboard.events.create')||$routename===('dashboard.events.show')? 'class="active"':"") !!}>
                            <a href="{{ @route('dashboard.events.index') }} ">
                                <i class="fa fa-list" aria-hidden="true"></i> Events
                            </a>
                        </li>
                    </ul>
                </li>

                <?php // LOCATION ?>
                <li {!! ($routename===('dashboard.locations.index')||$routename===('dashboard.locations.create')||$routename===('dashboard.locations.edit')? 'class="active"':"") !!}>
                    <a href="#">
                        <i class="menu-icon fa fa-fw fa-location-arrow"></i>
                        <span>Locations</span> <span
                                class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li {!! ($routename===('dashboard.locations.index')? 'class="active"':"") !!}>
                            <a href="{{ @route('dashboard.locations.index') }} ">
                                <i class="fa fa-list" aria-hidden="true"></i> Locations
                            </a>
                        </li>
                    </ul>
                </li>

                <?php // IMAGES ?>
                <li {!! ($routename===('dashboard.images.index')||$routename===('dashboard.images.create')? 'class="active"':"") !!}>
                    <a href="#">
                        <i class="menu-icon fa fa-fw fa-camera"></i>
                        <span>Images</span> <span
                                class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li {!! ($routename===('dashboard.images.index')? 'class="active"':"") !!}>
                            <a href="{{ @route('dashboard.images.index') }}">
                                <i class="fa fa-list" aria-hidden="true"></i> Image Library
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