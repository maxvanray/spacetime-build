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
        <section class="content-header">
            <h1>
                Events
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
                                        <th>Operation</th>
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
                                            <a href="{{ @route('dashboard.events.edit', $event->id) }}" class="btn btn-primary btn-xs" style="margin-right: 3px;">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                            @if (!\App\Calendar::where('event_id', '=', $event->id)->exists())
                                            |
                                            <button
                                                    class="btn btn-danger btn-xs deleteBtn"
                                                    data-id="{{ $event->id }}"
                                                    data-name="{{ $event->name }}"
                                                    data-url="{!! URL::route('dashboard.events.destroy', $event->id) !!}"
                                                    data-toggle="modal"
                                                    data-target="#delete"
                                                    data-placement="top">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                            @endif
                                        </td>
                                      </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                                <a href="{{ @route('dashboard.events.create') }}" class="btn btn-success">Add New Event</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .modal-dialog -->
                <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true" data-location="0">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title custom_align" id="Heading5">Delete this entry</h4>
                            </div>
                            <div class="modal-body">
                                <div id="confirm" class="alert alert-info" data-location="0" >
                                    <span class="glyphicon glyphicon-info-sign"></span>&nbsp;  this record ?
                                </div>
                            </div>
                            <div class="modal-footer ">
                                {!! Form::open([
                                    'method' => 'DELETE',
                                    'id' => 'formDelete',
                                    'class' => 'form-inline',
                                    'data-user' => '0',
                                    ]) !!}
                                {!! Form::button( '
                                        <span class="glyphicon glyphicon-ok-sign confirm"></span> Yes',
                                    [ 'type' => 'submit',
                                    'class' => 'btn btn-danger delete',
                                ] ) !!}
                                <button type="button" class="btn btn-success" data-dismiss="modal">
                                    <span class="glyphicon glyphicon-remove"></span> No
                                </button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                </div>
            </div>
            @include('layouts.right_sidebar')
        </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/custom_js/datatables_custom.js')}}"></script>
<script type="text/javascript">
    $('.deleteBtn').on('click', function(event){
        $('#formDelete').data("user", $(this).data('id'));
        $('#formDelete').attr("action", $(this).data('url'));
        $('#confirm').text('Are you sure you want to delete '+$(this).data('name')+'?');
    });
</script>
@stop

