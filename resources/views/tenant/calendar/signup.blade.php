@extends('layouts.app')

@section('header_styles')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/fullcalendar/css/fullcalendar.css')}}"/>
    <link rel="stylesheet" media='print' type="text/css" href="{{asset('assets/vendors/fullcalendar/css/fullcalendar.print.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/toastr/css/toastr.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/iCheck/css/all.css')}}"/>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Calendar: {{$location->name}}</h3></div>
                    <div class="panel-body">
                        <p><strong>Name:</strong> {{$calendar_event->title}}</p>
                        <p><strong>Description:</strong> {{$calendar_event->description}}</p>
                        <p><strong>Start:</strong> {{$calendar_event->start}}</p>
                        <p><strong>End:</strong> {{$calendar_event->description}}</p>
                        <p><strong>Price:</strong> {{$calendar_event->price/100}}</p>
                        @auth
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                            {!! Form::open(['route' => 'shop.store']) !!}
                                {{ Form::hidden('calendar_event', $calendar_event->id) }}
                                {{ Form::submit('Add to Cart', ['class' => 'btn btn-primary']) }}
                            {!! Form::close() !!}
                        @endauth

                    </div>
                </div>
                <div class="text-center">
                    &copy; {{ date('Y') }} Studio Name
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer_scripts')
    <script type="text/javascript" src="{{asset('assets/vendors/toastr/js/toastr.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/moment/js/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/fullcalendar/js/fullcalendar.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/iCheck/js/icheck.js')}}"></script>
@stop