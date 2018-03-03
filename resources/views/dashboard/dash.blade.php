@extends('layouts/default')

{{-- Page title --}}
@section('title')
    {{ Route::currentRouteName() }}
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    
@stop

{{-- Page content --}}
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Dashboard</h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="index">
                    <i class="fa fa-fw fa-home"></i> Dashboard
                </a>
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            @foreach($locations as $location)
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="panel weather-widget">
                    <div class="row weather-data">
                        <div class="col-md-12 temperature">
                            <h2>19<sup><sup>o</sup><sub>c</sub></sup></h2>
                            <p class="location"><i class="fa fa-map-marker text-default" aria-hidden="true"></i>
                                <strong>{{$location->name}}</strong></p>
                            <p>{{$location->address}}<br>{{$location->city}}, {{$location->state}} {{$location->zip}}</p>
                            <p>Showers till tomorrow morning</p>
                            <i class="wi wi-night-rain icon"></i>
                        </div>
                    </div>
                    <div class="weather-footer">
                        <div class="text-center">
                            <div class="col-lg-3 col-xs-2 popup">
                                <h5>MON</h5>
                                <i class="wi wi-day-lightning"></i>
                                <p>21<sup>o<sub>c</sub></sup></p>
                            </div>
                            <div class="col-lg-3 col-xs-2 popup">
                                <h5>TUE</h5>
                                <i class="wi wi-cloudy"></i>
                                <p>28<sup>o<sub>c</sub></sup></p>
                            </div>
                            <div class="col-lg-3 col-xs-2 popup">
                                <h5>WED</h5>
                                <i class="wi wi-night-rain-mix"></i>
                                <p>26<sup>o<sub>c</sub></sup></p>
                            </div>
                            <div class="col-lg-3 col-xs-2 popup">
                                <h5>THU</h5>
                                <i class="wi wi-day-sunny"></i>
                                <p>31<sup>o<sub>c</sub></sup></p>
                            </div>
                            <div class="col-xs-2 hidden-lg popup">
                                <h5>FRI</h5>
                                <i class="wi wi-day-lightning"></i>
                                <p>24<sup>o<sub>c</sub></sup></p>
                            </div>
                            <div class="col-xs-2 hidden-lg popup">
                                <h5>SAT</h5>
                                <i class="wi wi-night-alt-snow"></i>
                                <p>25<sup>o<sub>c</sub></sup></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{--end of row--}}
        @include('layouts.right_sidebar')
    </section>
@stop

