@extends('layouts/default')

{{-- Page title --}}
@section('title')
    {{ Route::currentRouteName() }}
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <!--page level css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/daterangepicker/css/daterangepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/datedropper/datedropper.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/timedropper/css/timedropper.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/jquerydaterangepicker/css/daterangepicker.min.css')}}">
    <!--clock face css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/clockpicker/css/bootstrap-clockpicker.min.css')}}">
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/datepicker.css')}}"> -->
    <!--end of page level css-->

    <!--page level css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/iCheck/css/all.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/bootstrap-fileinput/css/fileinput.min.css')}}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/formelements.css')}}">
    <!--end of page level css-->

    <!--page level css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/alertmessage.css')}}">
    <!--end of page level css-->
    
@stop

{{-- Page content --}}
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
            Create Event
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">
                    <i class="fa fa-fw fa-home"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ @route('events') }}"> Events</a>
            </li>
            <li class="active">
                Create Event
            </li>
        </ol>
    </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
{{  Form::open(['route' => 'events.store', 'class'=>'form-horizontal', 'id'=>'create_location', 'method'=>'post']) }}

    {{ csrf_field() }}

    @if (session('status'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">&times;</button>
        <strong>{{ session('status') }}</strong> Create another location below or <a href="{{ route('location.index') }}">Click Here</a> to view all the locations
    </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', '', array('class' => 'form-control')) }}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('description', 'Description') }}
                {{ Form::textarea('description', '', array('class' => 'form-control')) }}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
        {{ Form::select('type', ['1' => 'Group 1', '2' => 'Group 2', '3' => 'Group 3', '4' => 'Group 4', '5' => 'Group 5'], 'Group 1', array('class' => 'form-control')) }}

            </div>
        </div>
    </div>
    <div class="row">
        {{ Form::submit('Create Event', array('class' => 'btn btn-primary')) }}
    </div>

{{ Form::close() }}


                </div>
            </div>
            {{--end of row--}}
            @include('layouts.right_sidebar')
        </section>
@stop

{{-- page level scripts --}}
    @section('footer_scripts')
<!-- begining of page level js -->
<!-- InputMask -->
<script  type="text/javascript" src="{{asset('assets/vendors/moment/js/moment.min.js')}}"></script>
<script  type="text/javascript" src="{{asset('assets/vendors/inputmask/inputmask/inputmask.js')}}"></script>
<script  type="text/javascript" src="{{asset('assets/vendors/inputmask/inputmask/jquery.inputmask.js')}}" ></script>
<script  type="text/javascript" src="{{asset('assets/vendors/inputmask/inputmask/inputmask.date.extensions.js')}}" ></script>
<script  type="text/javascript" src="{{asset('assets/vendors/inputmask/inputmask/inputmask.extensions.js')}}" ></script>
<!-- date-range-picker -->
<script  type="text/javascript" src="{{asset('assets/vendors/daterangepicker/js/daterangepicker.js')}}" ></script>
<!-- bootstrap time picker -->
<!-- <script  type="text/javascript" src="{{asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js')}}" ></script> -->
<script  type="text/javascript" src="{{asset('assets/vendors/clockpicker/js/bootstrap-clockpicker.min.js')}}" ></script>
<!-- <script  type="text/javascript" src="{{asset('assets/vendors/jquerydaterangepicker/js/jquery.daterangepicker.min.js')}}" ></script> -->
<!-- <script  type="text/javascript" src="{{asset('assets/vendors/datedropper/datedropper.js')}}" ></script> -->
<script  type="text/javascript" src="{{asset('assets/vendors/timedropper/js/timedropper.js')}}" ></script>
<!--<script  type="text/javascript" src="{{asset('assets/js/custom_js/datepickers.js')}}" ></script>-->
<script type="text/javascript">
    $(document).ready(function() {
        $(".timeselect").timeDropper({
            primaryColor: "#48CFAD",
            borderColor: "#48CFAD",
            textColor: "#48CFAD",
            meridians: true,
            format: "hh:mm A"
        });

/*
        $('#closed_sunday').on('check', function(event){
            if( $('#closed_sunday').is(':checked') ){
                console.log('check');
            }else{
                console.log('notchecked');
            }
        });
*/

        if ( $('#closed_sunday').is(':checked') ) {
            $('#sunday_times').hide();
        }else{
            $('#sunday_times').show();
        }

        

        $(".content").find('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
<!-- end of page level js -->

<!-- begining of page level js -->
<script type="text/javascript" src="{{asset('assets/vendors/iCheck/js/icheck.js')}}"></script>
<!-- <script type="text/javascript" src="{{asset('assets/vendors/bootstrap-fileinput/js/fileinput.min.js')}}"></script> -->
<!-- <script type="text/javascript" src="{{asset('assets/js/custom_js/form_elements.js')}}"></script> -->
<!-- end of page level js -->

@stop
