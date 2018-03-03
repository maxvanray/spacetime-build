@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Events
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/datatables/css/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom_css/datatables_custom.css')}}">
    <!--end of page level css-->
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
                    <a href="index">
                        <i class="fa fa-fw fa-home"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="#"> Event List</a>
                </li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
                    
                        <div class="panel-body">
                            <div class="table-responsive">

                                <table id="datatable" class="table table-striped table-bordered table-hover" width="100%" border="0" cellspacing="0" cellpadding="0" summary="This is a list of the events.">
                                    <thead>
                                      <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Type</th>
                                        <th>Created</th>
                                        <th></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($events as $event)
                                      <tr>
                                        <td>{{ $event->name }}</td>
                                        <td>{{ $event->description }}</td>
                                        <td>{{ $event->type }}</td>
                                        <td>{{ $event->pin }}</td>
                                        <td>
                                            <a href="events/{{ $event->id }}">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                            |
                                            <a href="#">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                        <?php /*<td>
                                          <button
                                                  class="btn btn-primary btn-xs userEditBtn"
                                                  data-user="{{ $staff_member->id }}"
                                                  data-target="#edit"
                                                  data-placement="top">
                                              <span class="glyphicon glyphicon-pencil"></span>
                                          </button>
                                          |
                                          <button
                                                  class="btn btn-danger btn-xs userDeleteBtn"
                                                  data-user="{{ $staff_member->id }}"
                                                  data-toggle="modal"
                                                  data-target="#delete"
                                                  data-placement="top">
                                              <span class="glyphicon glyphicon-trash"></span>
                                          </button>
                                        </td> */ ?>
                                      </tr>
                                       @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--end of row--}}
            @include('layouts.right_sidebar')
        </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- begining of page level js -->
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/custom_js/datatables_custom.js')}}"></script>
    <!-- end of page level js -->
@stop

