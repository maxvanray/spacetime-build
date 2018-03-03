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
            Create Location
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index">
                    <i class="fa fa-fw fa-home"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ @route('location.index') }}"> Location</a>
            </li>
            <li class="active">
                Create Location
            </li>
        </ol>
    </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
<form id="create_location" class="form-horizontal" method="POST" action="{{ route('location.store') }}">
    {{ csrf_field() }}

    @if (session('status'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">&times;</button>
        <strong>{{ session('status') }}</strong> Create another location below or <a href="{{ route('location.index') }}">Click Here</a> to view all the locations
    </div>
    @endif

<!-- Text input : Location Name-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Location Name</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="Location Name" class="form-control input-md">
  </div>
</div>

<!-- Text input : Address-->
<div class="form-group">
  <label class="col-md-4 control-label" for="address">Address</label>  
  <div class="col-md-4">
  <input id="address" name="address" type="text" placeholder="Address" class="form-control input-md">
  </div>
</div>

<!-- Text input : City-->
<div class="form-group">
  <label class="col-md-4 control-label" for="city">City</label>  
  <div class="col-md-4">
  <input id="city" name="city" type="text" placeholder="City" class="form-control input-md">
  </div>
</div>

<!-- Text input : State-->
<div class="form-group">
    <label for="state" class="  col-md-4 control-label">State</label>
    <div class="col-md-4">
        <select class="select21 form-control" name="state" id="state">
            <optgroup label="Alaskan/Hawaiian Time Zone">
                <option>Select State</option>
                <option value="AK">Alaska</option>
                <option value="HI">Hawaii</option>
            </optgroup>
            <optgroup label="Pacific Time Zone">
                <option value="CA">California</option>
                <option value="NV">Nevada</option>
                <option value="OR">Oregon</option>
                <option value="WA">Washington</option>
            </optgroup>
            <optgroup label="Mountain Time Zone">
                <option value="AZ">Arizona</option>
                <option value="CO">Colorado</option>
                <option value="ID">Idaho</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NM">New Mexico</option>
                <option value="ND">North Dakota</option>
                <option value="UT">Utah</option>
                <option value="WY">Wyoming</option>
            </optgroup>
            <optgroup label="Central Time Zone">
                <option value="AL">Alabama</option>
                <option value="AR">Arkansas</option>
                <option value="IL">Illinois</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="OK">Oklahoma</option>
                <option value="SD">South Dakota</option>
                <option value="TX">Texas</option>
                <option value="TN">Tennessee</option>
                <option value="WI">Wisconsin</option>
            </optgroup>
            <optgroup label="Eastern Time Zone">
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="IN">Indiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="OH">Ohio</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WV">West Virginia</option>
            </optgroup>
        </select>
    </div>
</div>

<!-- Text input : Zip-->
<div class="form-group">
  <label class="col-md-4 control-label" for="zip">Zip</label>  
  <div class="col-md-4">
  <input id="zip" name="zip" type="text" placeholder="Zip" class="form-control input-md">
  </div>
</div>

<!-- Text input : Floor-->
<div class="form-group">
  <label class="col-md-4 control-label" for="floor">Floor</label>  
  <div class="col-md-4">
  <input id="floor" name="floor" type="text" placeholder="Floor" class="form-control input-md">
  </div>
</div>

<hr>

<!-- Text input : Location Contact-->
<div class="form-group">
  <label class="col-md-4 control-label" for="contact">Location Contact</label>  
  <div class="col-md-4">
  <input id="contact" name="contact" type="text" placeholder="Contact Name" class="form-control input-md">
  </div>
</div>

<!-- Text input : Contact Email-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Contact Email</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="email" placeholder="email" class="form-control input-md">
  </div>
</div>

<!-- Text input : Contact Phone-->
<div class="form-group">
  <label class="col-md-4 control-label" for="phone">Contact Phone</label>  
  <div class="col-md-4">
  <input id="phone" name="phone" type="text" placeholder="phone" class="form-control input-md">
  </div>
</div>
<hr>

<!-- Textarea : Business Info-->
<div class="form-group">
  <label class="col-md-4 control-label" for="description">Business Info</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="description" name="description" placeholder="Business Info: name, email, url, etc."></textarea>
  </div>
</div>

<!-- Hours of Operation -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Location Hours
                </h3>
            </div>
            <div class="panel-body">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_1" data-toggle="tab">
                                <span class="visible-xs visible-sm">Sun</span>
                                <span class="visible-md visible-lg">Sunday</span>
                            </a>
                        </li>
                        <li>
                            <a href="#tab_2" data-toggle="tab">
                                <span class="visible-xs visible-sm">Mon</span>
                                <span class="visible-md visible-lg">Monday</span>
                            </a>
                        </li>
                        <li>
                            <a href="#tab_3" data-toggle="tab">
                                <span class="visible-xs visible-sm">Tue</span>
                                <span class="visible-md visible-lg">Tuesday</span>
                            </a>
                        </li>
                        <li>
                            <a href="#tab_4" data-toggle="tab">
                                <span class="visible-xs visible-sm">Wed</span>
                                <span class="visible-md visible-lg">Wednesday</span>
                            </a>
                        </li>
                        <li>
                            <a href="#tab_5" data-toggle="tab">
                                <span class="visible-xs visible-sm">Thu</span>
                                <span class="visible-md visible-lg">Thursday</span>
                            </a>
                        </li>
                        <li>
                            <a href="#tab_6" data-toggle="tab">
                                <span class="visible-xs visible-sm">Fri</span>
                                <span class="visible-md visible-lg">Friday</span>
                            </a>
                        </li>
                        <li>
                            <a href="#tab_7" data-toggle="tab">
                                <span class="visible-xs visible-sm">Sat</span>
                                <span class="visible-md visible-lg">Saturday</span>
                            </a>
                        </li>
                        <li class="pull-right">
                            <a href="#" class="text-muted">
                                <i class="fa fa-gear"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="slim1">
                        <div class="tab-pane active" id="tab_1">
                            <br>
                            
                            <div class="col-md-12">
                                <div>
                                    <label>
                                        <input type="checkbox" name="closed_sunday" id="closed_sunday" value="closed_sunday" > Closed
                                    </label>
                                </div>
                            </div>

                            <div class="row" id="sunday_times">
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="sunday_from">Sunday From:</label>
                                    <div class="col-md-4 col-sm-4 col-xs-4 input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-fw fa-clock-o"></i>
                                        </div>
                                        <input type="text" class="form-control timeselect" placeholder="HH-MM" name="sunday_from" />
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="sunday_to">Sunday To:</label>
                                    <div class="col-md-4 col-sm-4 col-xs-4 input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-fw fa-clock-o"></i>
                                        </div>
                                        <input type="text" class="form-control timeselect" placeholder="HH-MM" name="sunday_to" />
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
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
                            <div class="col-md-12">
                                <div>
                                    <label>
                                        <input type="checkbox" name="closed_monday" id="closed_monday" value="closed_monday" > Closed
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="monday_from">Monday From:</label>
                                    <div class="col-md-4 input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-fw fa-clock-o"></i>
                                        </div>
                                        <input type="text" class="form-control timeselect" placeholder="HH-MM" name="monday_from" />
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="monday_to">Monday To:</label>
                                    <div class="col-md-4 input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-fw fa-clock-o"></i>
                                        </div>
                                        <input type="text" class="form-control timeselect" placeholder="HH-MM" name="monday_to" />
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
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
                            <div class="col-md-12">
                                <div>
                                    <label>
                                        <input type="checkbox" name="closed_tuesday" id="closed_tuesday" value="closed_tuesday" > Closed
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="tuesday_from">Tuesday From:</label>
                                    <div class="col-md-4 input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-fw fa-clock-o"></i>
                                        </div>
                                        <input type="text" class="form-control timeselect" placeholder="HH-MM" name="tuesday_from" />
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="tuesday_to">Tuesday To:</label>
                                    <div class="col-md-4 input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-fw fa-clock-o"></i>
                                        </div>
                                        <input type="text" class="form-control timeselect" placeholder="HH-MM" name="tuesday_to" />
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
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
                            <div class="col-md-12">
                                <div>
                                    <label>
                                        <input type="checkbox" name="closed_wednesday" id="closed_wednesday" value="closed_wednesday" > Closed
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="wednesday_from">Wednesday From:</label>
                                    <div class="col-md-4 input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-fw fa-clock-o"></i>
                                        </div>
                                        <input type="text" class="form-control timeselect" placeholder="HH-MM" name="wednesday_from" />
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="wednesday_to">Wednesday To:</label>
                                    <div class="col-md-4 input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-fw fa-clock-o"></i>
                                        </div>
                                        <input type="text" class="form-control timeselect" placeholder="HH-MM" name="wednesday_to" />
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
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
                            <div class="col-md-12">
                                <div>
                                    <label>
                                        <input type="checkbox" name="closed_thursday" id="closed_thursday" value="closed_thursday" > Closed
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="thursday_from">Thursday From:</label>
                                    <div class="col-md-4 input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-fw fa-clock-o"></i>
                                        </div>
                                        <input type="text" class="form-control timeselect" placeholder="HH-MM" name="thursday_from" />
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="thursday_to">Thursday To:</label>
                                    <div class="col-md-4 input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-fw fa-clock-o"></i>
                                        </div>
                                        <input type="text" class="form-control timeselect" placeholder="HH-MM" name="thursday_to" />
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
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
                            <div class="col-md-12">
                                <div>
                                    <label>
                                        <input type="checkbox" name="closed_friday" id="closed_friday" value="closed_friday" > Closed
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="friday_from">Friday From:</label>
                                    <div class="col-md-4 input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-fw fa-clock-o"></i>
                                        </div>
                                        <input type="text" class="form-control timeselect" placeholder="HH-MM" name="friday_from" />
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="friday_to">Friday To:</label>
                                    <div class="col-md-4 input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-fw fa-clock-o"></i>
                                        </div>
                                        <input type="text" class="form-control timeselect" placeholder="HH-MM" name="friday_to" />
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
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
                            <div class="col-md-12">
                                <div>
                                    <label>
                                        <input type="checkbox" name="closed_saturday" id="closed_saturday" value="closed_saturday" > Closed
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="saturday_from">Saturday From:</label>
                                    <div class="col-md-4 input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-fw fa-clock-o"></i>
                                        </div>
                                        <input type="text" class="form-control timeselect" placeholder="HH-MM" name="saturday_from" />
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-4 control-label" for="saturday_to">Saturday To:</label>
                                    <div class="col-md-4 input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-fw fa-clock-o"></i>
                                        </div>
                                        <input type="text" class="form-control timeselect" placeholder="HH-MM" name="saturday_to" />
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
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
                <!-- nav-tabs-custom -->
            </div>
        </div>
    </div>
</div>

<?php /*
<!-- Upload Images -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw fa-upload"></i> Upload Location Images
                </h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>
                            A picture says a thousand words.<br>Upload multiple pictures of this location.
                        </h4>
                        <form id="fileupload" method="POST" enctype="multipart/form-data">
                            <!-- Redirect browsers with JavaScript disabled to the origin page -->
                            <noscript>
                                <input type="hidden" name="redirect" value="">
                            </noscript>
                            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                            <div class="fileupload-buttonbar">
                                <div class="col-lg-7">
                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                    <span class="btn btn-success fileinput-button">
                                        <i class="glyphicon glyphicon-plus"></i>
                                        <span>Add files</span>
                                        <input type="file" name="files[]" multiple>
                                        </span>
                                    <button type="submit" class="btn btn-primary start">
                                        <i class="glyphicon glyphicon-upload"></i>
                                        <span>Start upload</span>
                                    </button>
                                    <button type="reset" class="btn btn-warning cancel">
                                        <i class="glyphicon glyphicon-ban-circle"></i>
                                        <span>Cancel upload</span>
                                    </button>
                                    <button type="button" class="btn btn-danger delete">
                                        <i class="glyphicon glyphicon-trash"></i>
                                        <span>Delete</span>
                                    </button>
                                    <input type="checkbox" class="toggle">
                                    <!-- The global file processing state -->
                                    <span class="fileupload-process"></span>
                                </div>
                                <!-- The global progress state -->
                                <div class="col-lg-5 fileupload-progress fade">
                                    <!-- The global progress bar -->
                                    <div class="progress progress-striped active" role="progressbar"
                                         aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar progress-bar-success"
                                             style="width:0%;"></div>
                                    </div>
                                    <!-- The extended global progress state -->
                                    <div class="progress-extended">&nbsp;</div>
                                </div>
                            </div>
                            <!-- The table listing the files available for upload/download -->
                            <div class="table-responsive">
                                <table role="presentation" class="table table-striped">
                                    <tbody class="files"></tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
*/ ?>

<div class="row">
    <div class="col-md-12">
        <button class="btn btn-success col-md-4" type="submit">Add</button>
    </div>
</div>

</form>


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
