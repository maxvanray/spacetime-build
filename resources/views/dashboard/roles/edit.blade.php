@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Edit Role
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
                Edit Role
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
                    <a href="{{route('dashboard.roles.index')}}"> Roles</a>
                </li>
                <li>
                    <a href="{{@route('dashboard.roles.index')}}"> Edit Role: </a><a href="#">{{$role->name}}</a>
                </li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
                    
                        <div class="panel-body">

                            {{ Form::model($role, array('route' => array('dashboard.roles.update', $role->id), 'method' => 'PUT')) }}

                            <div class="form-group">
                                {{ Form::label('name', 'Role Name') }}
                                {{ Form::text('name', null, array('class' => 'form-control')) }}
                            </div>

                            <h5><b>Assign Permissions</b></h5>
                            @foreach ($permissions as $permission)

                                {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
                                {{Form::label($permission->name, ucfirst($permission->name)) }}<br>

                            @endforeach
                            <br>
                            {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <!-- .modal-dialog -->

            </div>
            {{--end of row--}}
            @include('layouts.right_sidebar')
        </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/custom_js/datatables_custom.js')}}"></script>
@stop

