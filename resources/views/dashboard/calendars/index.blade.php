@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Calendar
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/fullcalendar/css/fullcalendar.css')}}"/>
    <link rel="stylesheet" media='print' type="text/css" href="{{asset('assets/vendors/fullcalendar/css/fullcalendar.print.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/toastr/css/toastr.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/iCheck/css/all.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/calendar_custom.css')}}"/>
@stop

{{-- Page content --}}
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Calendar</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">
                    <i class="fa fa-fw fa-home"></i> Dashboard
                </a>
            </li>
            <li class="active">
                Calendar
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box">
                    <div class="box-title">
                        <h3>Draggable Events</h3>
                        <div class="pull-right box-toolbar">
                            <a href="#" class="btn btn-link btn-xs" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div id='external-events'>

                            @foreach($events as $event)

                            <div data-event-id='{{ $event->id }}' class='external-event 
                            <?php 
                            switch($event->type){
                                case '1 - primary': 
                                case'1':
                                     echo 'palette-primary';
                                break;
                                case '2 - success': 
                                case'2':
                                    echo 'palette-success';
                                break;
                                case '3 - info': 
                                case'3':
                                    echo 'palette-info';
                                break;
                                case '4 - warning': 
                                case'4':
                                    echo 'palette-warning';
                                break;
                                case '5 - danger': 
                                case'5':
                                    echo 'palette-danger';
                                break;
                                default:
                                    echo 'palette-default';
                            } ?>
                            ' title="{{ $event->name }}">{{ $event->name }}</div>

                            @endforeach

                            <p class="well no-border no-radius">
                                <input type='checkbox' class="custom_icheck" id='drop-remove'/>
                                <label for='drop-remove'>remove after drop</label>
                            </p>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal">Create
                            event</a>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-9">
                <div class="box">
                    <div class="box-body">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-fw fa-columns"></i> Calendar
                                </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                            </span>
                            </div>
                            <div class="panel-body">
                                <div class="bs-example">
                                    <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                                        @for ($i = 0; $i < count($locations); $i++)
                                        <li class="{{ $i===0 ? 'active' : '' }}" data-location="{{$locations[$i]['id']}}">
                                            <a href="#location_{{$locations[$i]['id']}}" data-toggle="tab">{{$locations[$i]['name']}}</a>
                                        </li>
                                        @endfor
                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        @for ($i = 0; $i < count($locations); $i++)
                                        <div class="tab-pane fade {{ $i===0 ? 'active in' : '' }}" id="location_{{$locations[$i]['id']}}">
                                            <div class="calendar" data-location="{{$locations[$i]['id']}}"></div>
                                        </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        
        @include('layouts.right_sidebar')
    </section>
     @include('layouts.modals.event')
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- begining of page level js -->
    <script type="text/javascript" src="{{asset('assets/vendors/toastr/js/toastr.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/moment/js/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/fullcalendar/js/fullcalendar.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/iCheck/js/icheck.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/custom_js/calendar_custom.js')}}"></script>
    <!-- end of page level js -->
@stop
