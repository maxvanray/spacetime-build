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

    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/x-editable/css/bootstrap-editable.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/x-editable/css/typeahead.js-bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/iCheck/css/all.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/inlinedit.css')}}"/>


    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/bootstrap-table/css/bootstrap-table.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom_css/bootstrap_tables.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/toastr/css/toastr.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom_css/toastr_notificatons.css')}}">

    <meta name="csrf-token" id="_token" data-token="{{ csrf_token() }}" content="{!! csrf_token() !!}" >
    
@stop

{{-- Page content --}}
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->

        <h1>Update User</h1>

        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">
                    <i class="fa fa-fw fa-home"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#"> User</a>
            </li>
            <li class="active">
                Update User
            </li>
        </ol>
    </section>

@include('layouts/alerts/alerts')

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-lg-12">
                <div class="panel panel-default">
                    
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-fw fa-info-circle"></i> User Name
                        </h3>
                    </div>
                    <table id="user" class="table table-bordered table-striped m-t-10">
                        <tbody>
                        <tr>
                            <td class="table_simple">User Name:</td>
                            <td class="table_superuser">
                                <a 
                                href="#" 
                                id="name"
                                class="editable editable-click"
                                name="name"
                                data-type="text" 
                                data-url="{{route('user.update', ['id'=>$user->id])}}"
                                data-pk="{{ $user->id }}"
                                data-title="Enter User Name">{{ $user->name or "<None>" }}</a>
                            </td>
                        </tr>

                        </tbody>
                    </table>

                </div><!-- .panel -->
            </div>

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-fw fa-info-circle"></i> User Contact
                        </h3>
                    </div>
                
                <table id="user" class="table table-bordered table-striped m-t-10">
                    <tbody>
                    <tr>
                            <td class="table_simple">Email:</td>
                            <td class="table_superuser">
                                <a href="#" 
                                    id="email" 
                                    class="editable editable-click"
                                    name="email" 
                                    data-type="text" 
                                    data-url="{{route('user.update', ['id'=>$user->id])}}"
                                    data-pk="{{ $user->id }}"
                                    data-title="Enter User Email">{{ $user->email or "<None>" }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="table_simple">Phone:</td>
                            <td class="table_superuser">
                                <a href="#" 
                                    id="phone" 
                                    class="editable editable-click"
                                    name="phone" 
                                    data-type="text" 
                                    data-url="{{route('userattributes.update', ['id'=>$user_attributes->id])}}"
                                    data-pk="{{ $user_attributes->id }}"
                                    data-title="Enter a Phone Number">{{ $user_attributes->phone or "<None>" }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="table_simple">Address:</td>
                            <td class="table_superuser">
                                <a href="#" 
                                    id="address" 
                                    class="editable editable-click"
                                    name="address" 
                                    data-type="text" 
                                    data-url="{{route('userattributes.update', ['id'=>$user_attributes->id])}}"
                                    data-pk="{{ $user_attributes->id }}"
                                    data-title="Enter a street Address.">{{ $user_attributes->address or "<None>" }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="table_simple">City:</td>
                            <td class="table_superuser">
                                <a href="#" 
                                    id="city" 
                                    class="editable editable-click"
                                    name="city" 
                                    data-type="text" 
                                    data-url="{{route('userattributes.update', ['id'=>$user_attributes->id])}}"
                                    data-pk="{{ $user_attributes->id }}"
                                    data-title="Start typing City.">{{ $user_attributes->city or "<None>" }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="table_simple">State:</td>
                            <td class="table_superuser">
                                <a href="#" 
                                    id="state" 
                                    class="editable editable-click"
                                    name="state" 
                                    data-type="typeaheadjs" 
                                    data-url="{{route('userattributes.update', ['id'=>$user_attributes->id])}}"
                                    data-pk="{{ $user_attributes->id }}"
                                    data-title="Start typing State.">{{ $user_attributes->state or "<None>" }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="table_simple">Zip:</td>
                            <td class="table_superuser">
                                <a href="#" 
                                    id="zip" 
                                    class="editable editable-click"
                                    name="zip" 
                                    data-type="text" 
                                    data-url="{{route('userattributes.update', ['id'=>$user_attributes->id])}}"
                                    data-pk="{{ $user_attributes->id }}"
                                    data-title="Enter User Zipcode">{{ $user_attributes->zip or "<None>" }}</a>
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
<script type="text/javascript" src="{{asset('assets/vendors/editable-table/js/mindmup-editabletable.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/bootstrap-table/js/bootstrap-table.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/tableExport/tableExport.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/custom_js/bootstrap_tables.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/user-update.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        
    });
</script>

    @stop
