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
                        <div id="calendar" class="calendar"></div>
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
    <script>
        $(document).ready(function () {
            var poptext = function(url, buttontext, start_time, end_time, event_price, event_id){
                var string = '<div class="row"><div class="col-md-12"><b>Start</b>: ' + start_time + '<br><b>End</b>: ' + end_time + ' <br><b>Price:</b> $' + event_price + '<br>'+
                    @hasrole('Admin')
                    '<a href="'+url+'" class="btn btn-primary" style="width: 100%">' + buttontext + '</a>'
                    @else
                        'Create an account to Sign-up'
                    @endhasrole

                    +'</div></div>'
                //console.log(string);
                return string;
            };
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                selectable: true,
                selectHelper: true,
                droppable: true,
                editable: true,
                eventLimit: true,
                defaultView: 'agendaWeek',
                defaultTimedEventDuration: '01:00:00',
                events: {!! $calendar  !!},
                eventRender: function (event, element) {
                    var start_time = moment(event.start).calendar();
                    var end_time = moment(event.start).calendar();
                    var event_price = event.price/100;
                    var event_id = event.id;
                    var buttontext = 'Sign-Up';
                    var url = '{{ @url('calendar/sign-up') }}/' + event_id;
                    element.popover({
                        animation: true,
                        content: poptext(url, buttontext, start_time, end_time, event_price, event_id),
                        container: 'body',
                        delay: 800,
                        html: true,
                        placement: 'top',
                        title: event.title,
                        trigger: 'hover',
                    });
                },
            });
        });
    </script>
@stop