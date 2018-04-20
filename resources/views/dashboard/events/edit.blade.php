@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Events
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/datatables/css/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom_css/datatables_custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/alertmessage.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/colorpicker/css/bootstrap-colorpicker.min.css')}}" />
@stop

{{-- Page content --}}
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Event List
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">
                    <i class="fa fa-fw fa-home"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{route('dashboard.events.index')}}"> Events</a>
            </li>
            <li class="active">
                <a href="#"> Edit Event: {{$event->name}}</a>
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-lg-12">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-fw fa-info-circle"></i> Edit Event: {{ $event->name or "<None>" }}
                        </h3>
                    </div>
                    <table id="event" class="table table-bordered table-striped ">
                        <tbody>
                        <tr>
                            <td>Event Name:</td>
                            <td>
                                <a href="#"
                                    id="name"
                                    class="editable editable-click"
                                    name="name"
                                    data-type="text"
                                    data-url="{{route('dashboard.events.update', ['id'=>$event->id])}}"
                                    data-pk="{{ $event->id }}"
                                    data-title="Name">
                                        {{ $event->name or "<None>" }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Description:</td>
                            <td>
                                <a href="#"
                                   id="description"
                                   class="editable editable-click"
                                   name="description"
                                   data-type="text"
                                   data-url="{{route('dashboard.events.update', ['id'=>$event->id])}}"
                                   data-pk="{{ $event->id }}"
                                   data-title="Enter Event Description">
                                    {{ $event->address or "<None>" }}
                                </a>
                            </td>
                        </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        {{--end of row--}}
        @include('layouts.right_sidebar')
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript"  src="{{asset('assets/vendors/moment/js/moment.min.js')}}"></script>
    <script type="text/javascript"  src="{{asset('assets/vendors/x-editable/js/bootstrap-editable.js')}}"></script>
    <script type="text/javascript"  src="{{asset('assets/vendors/x-editable/js/typeahead.js')}}"></script>
    <script type="text/javascript"  src="{{asset('assets/vendors/x-editable/js/typeaheadjs.js')}}"></script>
    <script type="text/javascript"  src="{{asset('assets/vendors/x-editable/js/address.js')}}"></script>
    <script type="text/javascript"  src="{{asset('assets/vendors/iCheck/js/icheck.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/vendors/toastr/js/toastr.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/custom_js/toastr_notifications.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/vendors/editable-table/js/mindmup-editabletable.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/bootstrap-table/js/bootstrap-table.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/tableExport/tableExport.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/custom_js/bootstrap_tables.js')}}"></script>

    <script  type="text/javascript" src="{{asset('assets/vendors/timedropper/js/timedropper.js')}}" ></script>

<script>

    // DEFAULTS
    var tokenval = $("#_token").data("token");
    $.fn.editable.defaults.url = '/location';
    $.fn.editable.defaults.mode = 'inline';
    $.fn.editable.defaults.error = function(response, newValue) {
        if(response.status === 500) {
            return 'Service unavailable. Please try later.';
        } else {
            return response.responseText;
        }
    };
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': tokenval
        }
    });

    $('#name').editable({
        type: 'text',
        title: 'Enter Name',
        ajaxOptions: {
            type: 'put'
        }
    });

    $(".my-colorpicker1").colorpicker();

    $('.calendar .instance .start').each(function(){
        var date = $(this).text();
        var formatted = moment(date).format("dddd, MMMM Do YYYY, h:mm:ss a");
        if( formatted ){
            $(this).html('<strong>Start:</strong> '+formatted);
        }else{
            $(this).html('<span class="text-muted">-</span>');
        }
    });
    $('.calendar .instance .end').each(function(){
        var date = $(this).text();
        var formatted = moment(date).format("dddd, MMMM Do YYYY, h:mm:ss a");
        if( formatted ){
            $(this).html('<strong>End:</strong> '+formatted);
        }else{
            $(this).html('<span class="text-muted">-</span>');
        }
    });
</script>
    <!-- end of page level js -->
@stop

