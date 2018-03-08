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

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom_css/advanced_modals.css')}}">

    <meta name="csrf-token" id="_token" data-token="{{ csrf_token() }}" content="{!! csrf_token() !!}" >
    
@stop

{{-- Page content --}}
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->

        <h1>Update Location</h1>

        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">
                    <i class="fa fa-fw fa-home"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{route('location.index')}}"> Location</a>
            </li>
            <li class="active">
                Update Location
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
                            <i class="fa fa-fw fa-info-circle"></i> Location Name and Address
                        </h3>
                    </div>
                    <table id="user" class="table table-bordered table-striped m-t-10">
                        <tbody>
                        <tr>
                            <td class="table_simple">Location Name:</td>
                            <td class="table_superuser">
                                <a 
                                href="#" 
                                id="name"
                                class="editable editable-click"
                                name="name" 
                                data-type="text" 
                                data-url="{{route('location.update', ['id'=>$location->id])}}"
                                data-pk="{{ $location->id }}"
                                data-title="Name">{{ $location->name or "<None>" }}</a>
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
                                    data-url="{{route('location.update', ['id'=>$location->id])}}"
                                    data-pk="{{ $location->id }}"
                                    data-title="Enter Location Address">{{ $location->address or "<None>" }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="table_simple">Floor:</td>
                            <td class="table_superuser">
                                <a href="#" 
                                    id="floor" 
                                    class="editable editable-click"
                                    name="floor" 
                                    data-type="text" 
                                    data-url="{{route('location.update', ['id'=>$location->id])}}"
                                    data-pk="{{ $location->id }}"
                                    data-title="Enter Location Floor">{{ $location->floor or "<None>" }}</a>
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
                                    data-url="{{route('location.update', ['id'=>$location->id])}}"
                                    data-pk="{{ $location->id }}"
                                    data-title="Enter Location Name">{{ $location->city or "<None>" }}</a>
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
                                    data-url="{{route('location.update', ['id'=>$location->id])}}"
                                    data-pk="{{ $location->id }}"
                                    data-title="Start typing State..">{{ $location->state or "<None>" }}</a>
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
                                    data-url="{{route('location.update', ['id'=>$location->id])}}"
                                    data-pk="{{ $location->id }}"
                                    data-title="Enter Location Zipcode">{{ $location->zip or "<None>" }}</a>
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
                            <i class="fa fa-fw fa-info-circle"></i> Images
                        </h3>
                    </div>
                    <table id="user" class="table table-bordered table-striped m-t-10">
                        <tbody>
                            <tr>
                                <td class="table_simple">
                                    Images:<br>
                                    <a href="#" data-toggle="modal"
                                       data-target="#sidebar_modal">Add | Edit</a>

                                    <div id="sidebar_modal" class="modal fade animated" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form class="location_images">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Media Library</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">

                                                        @if(count($media)<1)
                                                            <div class="col-md-6">
                                                                <h3>No Media</h3>
                                                            </div>
                                                        @else
                                                            @foreach($media as $m)
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>
                                                                            <input type="checkbox" name="image_{{$m->id}}" value="{{$m->id}}"
                                                                                   <?php
                                                                                   $media_id = $m->id;
                                                                                   ?>
                                                                                   @if( in_array($media_id, $used_images) )
                                                                                   checked
                                                                                    @endif
                                                                            > {{$m->name}}
                                                                        </label>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <img class="img-responsive" src="{{url($m->location)}}/{{ $m->filename }}" class="img-responsive" style="padding: 5px" title="{{ $m->name }}">
                                                                </div>
                                                            @endforeach


                                                        @endif
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" id="media_save" class="btn btn-primary">Save
                                                        </button>
                                                        <button type="button" id="media_close" class="btn btn-default" data-dismiss="modal">Close
                                                        </button>
                                                        <br>
                                                        <a href="{{route('media.create')}}" class="btn btn-danger">New</a>
                                                    </div>

                                                </form>
                                        </div>
                                    </div>
                                </div>

                            </td>
                            <td class="table_superuser">
                                @if( !empty($location->images) )
                                @foreach( $location->images_full as $image)
                                    <img src="{{url($image->location)}}/{{ $image->filename }}" class="img-responsive" style="padding: 5px">
                                @endforeach
                                @endif
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
                            <i class="fa fa-fw fa-info-circle"></i> Location Contact
                        </h3>
                    </div>
                
                <table id="user" class="table table-bordered table-striped m-t-10">
                    <tbody>
                    <tr>
                        <td class="table_simple">Location Contact:</td>
                        <td class="table_superuser">
                            <a href="#" 
                                id="contact" 
                                class="editable editable-click"
                                name="contact" 
                                data-type="text" 
                                data-url="{{route('location.update', ['id'=>$location->id])}}"
                                data-pk="{{ $location->id }}"
                                data-title="Enter Location Contact Name">{{ $location->contact or "<None>" }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_simple">Location Email:</td>
                        <td class="table_superuser">
                            <a href="#" 
                                id="email" 
                                class="editable editable-click"
                                name="email" 
                                data-type="text" 
                                data-url="{{route('location.update', ['id'=>$location->id])}}"
                                data-pk="{{ $location->id }}"
                                data-title="Enter Location Contact Email">{{ $location->email or "<None>" }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_simple">Location Phone:</td>
                        <td class="table_superuser">
                            <a href="#" 
                                id="phone" 
                                class="editable editable-click"
                                name="phone" 
                                data-type="text" 
                                data-url="{{route('location.update', ['id'=>$location->id])}}"
                                data-pk="{{ $location->id }}"
                                data-title="Enter Location Phone">{{ $location->phone or "<None>" }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="table_simple">Location Description:</td>
                        <td class="table_superuser">
                            <a href="#" 
                                id="description" 
                                class="editable editable-click"
                                name="description" 
                                data-type="text" 
                                data-url="{{route('location.update', ['id'=>$location->id])}}"
                                data-pk="{{ $location->id }}"
                                data-title="Enter Business Description">{{ $location->description or "<None>" }}</a>
                        </td>
                    </tr>

                    </tbody>
                </table>

                </div>
            </div>
                
        </div>

        <!--fourth table start-->
        <div class="row">
                
            <div class="col-lg-12">
                <div class="panel panel-default" id="hours-of-operation" data-id="{{ $location->id }}">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-fw fa-info-circle"></i> Hours of Operation
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1" data-toggle="tab">
                                        <span class="visible-xs">S</span>
                                        <span class="visible-sm">Sun</span>
                                        <span class="visible-md visible-lg">Sunday</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab_2" data-toggle="tab">
                                        <span class="visible-xs">M</span>
                                        <span class="visible-sm">Mon</span>
                                        <span class="visible-md visible-lg">Monday</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab_3" data-toggle="tab">
                                        <span class="visible-xs">T</span>
                                        <span class="visible-sm">Tue</span>
                                        <span class="visible-md visible-lg">Tuesday</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab_4" data-toggle="tab">
                                        <span class="visible-xs">W</span>
                                        <span class="visible-sm">Wed</span>
                                        <span class="visible-md visible-lg">Wednesday</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab_5" data-toggle="tab">
                                        <span class="visible-xs">T</span>
                                        <span class="visible-sm">Thu</span>
                                        <span class="visible-md visible-lg">Thursday</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab_6" data-toggle="tab">
                                        <span class="visible-xs">F</span>
                                        <span class="visible-sm">Fri</span>
                                        <span class="visible-md visible-lg">Friday</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab_7" data-toggle="tab">
                                        <span class="visible-xs">S</span>
                                        <span class="visible-sm">Sat</span>
                                        <span class="visible-md visible-lg">Saturday</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" id="slim1">
                                <div class="tab-pane active" id="tab_1">

                                    <br>
                                    
                                    <div class="row" id="sunday_times">
                                        <div class="col-md-12">
                                            <label>
                                                <input type="checkbox" name="closed_sunday" id="closed_sunday" value="closed_sunday" 
                                                @if ($location->closed_sunday === 'closed_sunday')
                                                    checked
                                                @endif
                                                    > Closed Sunday
                                            </label>
                                        </div>

                                        <div class="form-group from">
                                            <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="sunday_from">Sunday From:</label>
                                            <div class="col-md-4 col-sm-4 col-xs-4 input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-fw fa-clock-o"></i>
                                                </div>
                                                <input type="text" class="form-control timeselect" placeholder="HH-MM" name="sunday_from" value="{{ $location->sunday_from }}" />
                                            </div>
                                            <!-- /.input group -->
                                        </div>

                                        <div class="form-group to">
                                            <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="sunday_to">Sunday To:</label>
                                            <div class="col-md-4 col-sm-4 col-xs-4 input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-fw fa-clock-o"></i>
                                                </div>
                                                <input type="text" class="form-control timeselect" placeholder="HH-MM" name="sunday_to" value="{{ $location->sunday_to }}" />
                                            </div>
                                            <!-- /.input group -->
                                        </div>

                                        <div class="form-group notes">
                                          <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="sunday_notes">Sunday Notes</label>
                                          <div class="col-md-4">                     
                                            <textarea class="form-control" id="sunday_notes" name="sunday_notes"></textarea>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">

                                    <br>

                                    <div class="row" id="monday_times">
                                        <div class="col-md-12">
                                            <label>
                                                <input type="checkbox" name="closed_monday" id="closed_monday" value="closed_monday" 
                                                @if ($location->closed_ === 'closed_')
                                                    checked
                                                @endif > Closed Monday
                                            </label>
                                        </div>

                                        <div class="form-group from">
                                            <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="monday_from">Monday From:</label>
                                            <div class="col-md-4 input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-fw fa-clock-o"></i>
                                                </div>
                                                <input type="text" class="form-control timeselect" placeholder="HH-MM" name="monday_from" value="{{ $location->monday_from }}" />
                                            </div>
                                            <!-- /.input group -->
                                        </div>

                                        <div class="form-group to">
                                            <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="monday_to">Monday To:</label>
                                            <div class="col-md-4 input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-fw fa-clock-o"></i>
                                                </div>
                                                <input type="text" class="form-control timeselect" placeholder="HH-MM" name="monday_to" value="{{ $location->monday_to }}" />
                                            </div>
                                            <!-- /.input group -->
                                        </div>

                                        <div class="form-group notes">
                                          <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="monday_notes">Monday Notes</label>
                                          <div class="col-md-4">                     
                                            <textarea class="form-control" id="monday_notes" name="monday_notes"></textarea>
                                          </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_3">
                                    <br>
                                    <div class="row" id="tuesday_times">
                                        <div class="col-md-12">
                                            
                                            <label>
                                                <input type="checkbox" name="closed_tuesday" id="closed_tuesday" value="closed_tuesday" 
                                                @if ($location->closed_tuesday === 'closed_tuesday')
                                                    checked
                                                @endif > Closed Tuesday
                                            </label>
                                            
                                        </div>

                                        <div class="form-group from">
                                            <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="tuesday_from">Tuesday From:</label>
                                            <div class="col-md-4 input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-fw fa-clock-o"></i>
                                                </div>
                                                <input type="text" class="form-control timeselect" placeholder="HH-MM" name="tuesday_from" value="{{ $location->tuesday_from }}" />
                                            </div>
                                            <!-- /.input group -->
                                        </div>

                                        <div class="form-group to">
                                            <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="tuesday_to">Tuesday To:</label>
                                            <div class="col-md-4 input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-fw fa-clock-o"></i>
                                                </div>
                                                <input type="text" class="form-control timeselect" placeholder="HH-MM" name="tuesday_to" value="{{ $location->tuesday_to }}" />
                                            </div>
                                            <!-- /.input group -->
                                        </div>

                                        <div class="form-group notes">
                                          <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="tuesday_notes">Tuesday Notes</label>
                                          <div class="col-md-4">                     
                                            <textarea class="form-control" id="tuesday_notes" name="tuesday_notes"></textarea>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_4">
                                    <br>
                                    <div class="row" id="wednesday_times">
                                        <div class="col-md-12">
                                            <label>
                                                <input type="checkbox" name="closed_wednesday" id="closed_wednesday" value="closed_wednesday" 
                                                @if ($location->closed_wednesday === 'closed_wednesday')
                                                    checked
                                                @endif > Closed Wednesday
                                            </label>
                                        </div>

                                        
                                        <div class="form-group from">
                                            <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="wednesday_from">Wednesday From:</label>
                                            <div class="col-md-4 input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-fw fa-clock-o"></i>
                                                </div>
                                                <input type="text" class="form-control timeselect" placeholder="HH-MM" name="wednesday_from" value="{{ $location->wednesday_from }}" />
                                            </div>
                                            <!-- /.input group -->
                                        </div>

                                        <div class="form-group to">
                                            <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="wednesday_to">Wednesday To:</label>
                                            <div class="col-md-4 input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-fw fa-clock-o"></i>
                                                </div>
                                                <input type="text" class="form-control timeselect" placeholder="HH-MM" name="wednesday_to" value="{{ $location->wednesday_to }}" />
                                            </div>
                                            <!-- /.input group -->
                                        </div>

                                        <div class="form-group notes">
                                          <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="wednesday_notes">Wednesday Notes</label>
                                          <div class="col-md-4">                     
                                            <textarea class="form-control" id="wednesday_notes" name="wednesday_notes"></textarea>
                                          </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_5">
                                    <br>
                                    <div class="row" id="thursday_times">

                                        <div class="col-md-12">
                                            <label>
                                                <input type="checkbox" name="closed_thursday" id="closed_thursday" value="closed_thursday" @if ($location->closed_thursday === 'closed_thursday')
                                                    checked
                                                @endif > Closed Thursday
                                            </label>
                                        </div>
                                   
                                        <div class="form-group from">
                                            <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="thursday_from">Thursday From:</label>
                                            <div class="col-md-4 input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-fw fa-clock-o"></i>
                                                </div>
                                                <input type="text" class="form-control timeselect" placeholder="HH-MM" name="thursday_from" value="{{ $location->thursday_from }}" />
                                            </div>
                                            <!-- /.input group -->
                                        </div>

                                        <div class="form-group to">
                                            <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="thursday_to">Thursday To:</label>
                                            <div class="col-md-4 input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-fw fa-clock-o"></i>
                                                </div>
                                                <input type="text" class="form-control timeselect" placeholder="HH-MM" name="thursday_to" value="{{ $location->thursday_to }}" />
                                            </div>
                                            <!-- /.input group -->
                                        </div>

                                        <div class="form-group notes">
                                          <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="thursday_notes">Thursday Notes</label>
                                          <div class="col-md-4">                     
                                            <textarea class="form-control" id="thursday_notes" name="thursday_notes"></textarea>
                                          </div>
                                        </div>
                                    
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_6">
                                    <br>
                                    <div class="row" id="friday_times">
                                        <div class="col-md-12">
                                            <label>
                                                <input type="checkbox" name="closed_friday" id="closed_friday" value="closed_friday" 
                                                @if ($location->closed_friday === 'closed_friday')
                                                    checked
                                                @endif > Closed Friday
                                            </label>
                                        </div>
                                    
                                        <div class="form-group from">
                                            <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="friday_from">Friday From:</label>
                                            <div class="col-md-4 input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-fw fa-clock-o"></i>
                                                </div>
                                                <input type="text" class="form-control timeselect" placeholder="HH-MM" name="friday_from" value="{{ $location->friday_from }}" />
                                            </div>
                                            <!-- /.input group -->
                                        </div>

                                        <div class="form-group to">
                                            <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="friday_to">Friday To:</label>
                                            <div class="col-md-4 input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-fw fa-clock-o"></i>
                                                </div>
                                                <input type="text" class="form-control timeselect" placeholder="HH-MM" name="friday_to" value="{{ $location->friday_to }}" />
                                            </div>
                                            <!-- /.input group -->
                                        </div>

                                        <div class="form-group notes">
                                          <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="friday_notes">Friday Notes</label>
                                          <div class="col-md-4">                     
                                            <textarea class="form-control" id="friday_notes" name="friday_notes"></textarea>
                                          </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_7">
                                    <br>
                                    <div class="row" id="saturday_times">
                                        <div class="col-md-12">
                                            <label>
                                                <input type="checkbox" name="closed_saturday" id="closed_saturday" value="closed_saturday" 
                                                @if ($location->closed_saturday === 'closed_saturday')
                                                    checked
                                                @endif > Closed Saturday
                                            </label>
                                        </div>
                                    
                                        <div class="form-group from">
                                            <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="saturday_from">Saturday From:</label>
                                            <div class="col-md-4 input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-fw fa-clock-o"></i>
                                                </div>
                                                <input type="text" class="form-control timeselect" placeholder="HH-MM" name="saturday_from" value="{{ $location->saturday_from }}" />
                                            </div>
                                            <!-- /.input group -->
                                        </div>

                                        <div class="form-group to">
                                            <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="saturday_to">Saturday To:</label>
                                            <div class="col-md-4 input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-fw fa-clock-o"></i>
                                                </div>
                                                <input type="text" class="form-control timeselect" placeholder="HH-MM" name="saturday_to" value="{{ $location->saturday_to }}"/>
                                            </div>
                                            <!-- /.input group -->
                                        </div>

                                        <div class="form-group notes">
                                          <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="saturday_notes">Saturday Notes</label>
                                          <div class="col-md-4">                     
                                            <textarea class="form-control" id="saturday_notes" name="saturday_notes"></textarea>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button id="update-hours" class="btn btn-primary">Update</button>
                    </div>
                </div>

<?php /*
                    <div class="panel-body">
                        <table>
                            <thead>
                            <tr>
                                <th data-field="Sunday" data-sortable="true">
                                    <span class="visible-xs visible-sm">Sun</span>
                                    <span class="visible-md visible-lg">Sunday</span>
                                </th>
                                <th data-field="Monday" data-sortable="true">
                                    <span class="visible-xs visible-sm">Mon</span>
                                    <span class="visible-md visible-lg">Monday</span>
                                </th>
                                <th data-field="Tuesday" data-sortable="true">
                                    <span class="visible-xs visible-sm">Tue</span>
                                    <span class="visible-md visible-lg">Tuesday</span>
                                </th>
                                <th data-field="Wednesday" data-sortable="true">
                                    <span class="visible-xs visible-sm">Wed</span>
                                    <span class="visible-md visible-lg">Wednesday</span>
                                </th>
                                <th data-field="Thursday" data-sortable="true">
                                    <span class="visible-xs visible-sm">Thu</span>
                                    <span class="visible-md visible-lg">Thursday</span>
                                </th>
                                <th data-field="Friday" data-sortable="true">
                                    <span class="visible-xs visible-sm">Fri</span>
                                    <span class="visible-md visible-lg">Friday</span>
                                </th>
                                <th data-field="Saturday" data-sortable="true">
                                    <span class="visible-xs visible-sm">Sat</span>
                                    <span class="visible-md visible-lg">Saturday</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                           
                            <tr>
                                <td>
                                    {{ $location->sunday_from }} 
                                    <br>to<br>
                                    {{ $location->sunday_from }} 
                                </td>

                                <td>{{ $location->monday_from }} 
                                    <br>to<br>
                                    {{ $location->monday_from }} 
                                </td>

                                <td>{{ $location->tuesday_from }} 
                                    <br>to<br>
                                    {{ $location->tuesday_to }} 
                                </td>
                                
                                <td>{{ $location->wednesday_from }} 
                                    <br>to<br>
                                    {{ $location->wednesday_to }} 
                                </td>

                                <td>{{ $location->thursday_from }} 
                                    <br>to<br>
                                    {{ $location->thursday_to }}
                                </td>

                                <td>{{ $location->friday_from }} 
                                    <br>to<br>
                                    {{ $location->friday_to }}
                                </td>
                                
                                <td>{{ $location->saturday_from }} 
                                    <br>to<br>
                                    {{ $location->saturday_to }}
                                </td>
                                
                            </tr>
                            
                            
                            </tbody>
                        </table>
                    </div> */ ?>

            </div> 
        </div>
        <!--fourth table end-->




                    
        {{--end of row--}}
        @include('layouts.right_sidebar')
    </section>
@stop

{{-- page level scripts --}}
    @section('footer_scripts')
<!-- begining of page level js -->
<!-- <script type="text/javascript"  src="{{asset('assets/vendors/jquery-mockjax/js/jquery.mockjax.js')}}"></script> -->
<script type="text/javascript"  src="{{asset('assets/vendors/moment/js/moment.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('assets/vendors/x-editable/js/bootstrap-editable.js')}}"></script>
<script type="text/javascript"  src="{{asset('assets/vendors/x-editable/js/typeahead.js')}}"></script>
<script type="text/javascript"  src="{{asset('assets/vendors/x-editable/js/typeaheadjs.js')}}"></script>
<script type="text/javascript"  src="{{asset('assets/vendors/x-editable/js/address.js')}}"></script>
<script type="text/javascript"  src="{{asset('assets/vendors/iCheck/js/icheck.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/vendors/toastr/js/toastr.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/custom_js/toastr_notifications.js')}}"></script>

<!-- end of page level js -->

<!-- begining of page level js -->
<script type="text/javascript" src="{{asset('assets/vendors/editable-table/js/mindmup-editabletable.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/bootstrap-table/js/bootstrap-table.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/tableExport/tableExport.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/custom_js/bootstrap_tables.js')}}"></script>

<!-- end of page level js -->

<script  type="text/javascript" src="{{asset('assets/vendors/timedropper/js/timedropper.js')}}" ></script>
<!--<script  type="text/javascript" src="{{asset('assets/js/custom_js/datepickers.js')}}" ></script>-->
<script type="text/javascript" src="{{asset('assets/js/location-update.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('input').each(function(){
            $(this).iCheck({
                checkboxClass: 'icheckbox_minimal',
                radioClass: 'iradio_minimal',
                increaseArea: '20%' // optional
            });
        });


        $('#media_save').on('click', function (event) {
            event.preventDefault();
            var form = $('form.location_images').serialize();
            $.ajax({
                url:'{{url('/dashboard/location/'.$location->id.'/media')}}',
                type: 'POST',
                data: form,
                success: function(msg){
                    console.log(msg);
                    location.reload();
                }
            });
            console.log({{ $location->id }});
        });

        $('.icheckbox_square-blue').on('click', function (event) {
            alert('x');
        })
    });
</script>

    @stop
