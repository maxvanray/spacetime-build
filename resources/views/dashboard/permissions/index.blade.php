@extends('layouts.default')

{{-- Page title --}}
@section('title')
    Permissions
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
                Permissions
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('dashboard')}}">
                        <i class="fa fa-fw fa-home"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{route('dashboard.users.index')}}"> Users</a>
                </li>
                <li>
                    <a href="{{route('dashboard.permissions.index')}}"> Permissions</a>
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
                                <table id="datatable" class="table table-striped table-bordered table-hover" width="100%" border="0" cellspacing="0" cellpadding="0" summary="This is a list of the user permissions.">
                                    <thead>
                                    <tr>
                                        <th>Permissions</th>
                                        <th>Operation</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->name }}</td>
                                            <td>
                                                <a href="{{ @route('dashboard.permissions.edit', $permission->id) }}" class="btn btn-primary btn-xs" style="margin-right: 3px;">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </a>
                                                |
                                                <button
                                                        class="btn btn-danger btn-xs userDeleteBtn"
                                                        data-id="{{ $permission->id }}"
                                                        data-name="{{ $permission->name }}"
                                                        data-url="{!! URL::route('dashboard.permissions.destroy', $permission->id) !!}"
                                                        data-toggle="modal"
                                                        data-target="#delete"
                                                        data-placement="top">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <a href="{{ @route('dashboard.permissions.create') }}" class="btn btn-success">Add New Permission</a>
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
    $('.userDeleteBtn').on('click', function(event){
        $('#formDelete').data("user", $(this).data('id'));
        $('#formDelete').attr("action", $(this).data('url'));
        $('#confirm').text('Are you sure you want to delete '+$(this).data('name')+'?');
    });
</script>
@stop

