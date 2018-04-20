@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Events
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')


@stop

{{-- Page content --}}
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add New Event
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">
                    <i class="fa fa-fw fa-home"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ @route('dashboard.events.index') }}"> Events </a>
            </li>
            <li class="active">
                <a href="#"> Add New Event</a>
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                {{  Form::open([
                    'route' => 'dashboard.events.store',
                    'class'=>'form-horizontal',
                    'id'=>'form_create',
                    'method'=>'post'
                ]) }}

                {{ csrf_field() }}

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
                    {{ Form::submit('Add Event', array('class' => 'btn btn-primary')) }}
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


@stop
