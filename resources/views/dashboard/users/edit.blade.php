@extends('layouts.default')

{{-- Page title --}}
@section('title')
    Guests
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

            <h1>Edit User</h1>

            <ol class="breadcrumb">
                <li>
                    <a href="{{route('dashboard')}}">
                        <i class="fa fa-fw fa-home"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{route('dashboard.users.index')}}"> Users </a>
                </li>
                <li>
                    <a href="#"> Edit User: {{ $user->name }}</a>
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

                                {{ Form::model($user, array(
                                    'route' => array('dashboard.users.update', $user->id),
                                    'method' => 'PUT')) }}

                                <div class="form-group">
                                    {{ Form::label('name', 'Name') }}
                                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('email', 'Email') }}
                                    {{ Form::email('email', null, array('class' => 'form-control')) }}
                                </div>

                                <h5><b>Give Role</b></h5>

                                <div class='form-group'>
                                    @foreach ($roles as $role)
                                        {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
                                        {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                                    @endforeach
                                </div>

                                <div class="form-group">
                                    {{ Form::label('password', 'Password') }}<br>
                                    {{ Form::password('password', array('class' => 'form-control')) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('password', 'Confirm Password') }}<br>
                                    {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
                                </div>

                                {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

                                {{ Form::close() }}


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
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/custom_js/datatables_custom.js')}}"></script>
@stop

