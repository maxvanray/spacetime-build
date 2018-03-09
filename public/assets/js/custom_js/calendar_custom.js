"use strict";

$(document).ready(function () {
    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
        ele.each(function () {

            $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                stick: true // maintain when user navigates (see docs on the renderEvent method)
            });

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 1070,
                revert: true, // will cause the event to go back to its
                revertDuration: 0 //  original position after the drag
            });

        });
    }

    ini_events($('#external-events').find('div.external-event'));

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();

    function closePopovers() {
        $('.popover').not(this).popover('hide');
    }

    function event_object(event) {
        var event_data = {
            event: {
                allDay: event.allDay,
                id: event.id,
                start: event.start.format(),
                end: event.end.format()
            }
        };
        return event_data;
    }

    $('.calendar').each(function(){
        var location_id = $(this).data('location');
        $(this).fullCalendar({
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
            events: '/dashboard/calendarlist/'+location_id,
            drop: function (date, event, ui, resourceId) {
                var event_id = $(event.target).attr('data-event-id');
                var calendar_date = date.format();
                var calendar_time = date.format("hh:mm:ss a");
                var all_day = date._ambigTime;
                var bg_color = $(event.target).css('backgroundColor');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/dashboard/calendar',
                    data: {
                        location: location_id,
                        event: event_id,
                        date: calendar_date,
                        time: calendar_time,
                        all_day: all_day,
                        backgroundColor: bg_color
                    },
                    success: function (data) {
                        location.reload();
                    }
                });
                // var m = date.moment();
                // console.log(m);
                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }
            },
            eventDrop: function (event, delta, revertFunc, jsEvent, ui, view) {

                /*--------
                    alert(
                        " id " + event.id + " " +
                        event.title + " was moved " +
                        delta._days + " days and " +
                        delta._milliseconds + " minutes."
                    );
                */
                if (event.allDay) {
                    toastr["success"](event.title + " is now all-day", event.title);
                } else {
                    toastr["success"](event.title + " has a time-of-day", event.title);
                }
                //--------
                //     if (!confirm("Are you sure about this change?")) {
                //         revertFunc();
                //     }
                //--------
                // var calender_id = event.id;
                // var all_day = event.allDay;
                // var start = event.start.format();


                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/dashboard/calendar/update',
                    data: {
                        location: location_id,
                        id: event.id,
                        start: event.start.format(),
                        all_day: event.allDay
                    },
                    success: function (data) {
                        //location.reload();
                    },
                    fail: function (data) {
                        console.log("error");
                        console.log(data);
                    }
                });
            },
            eventRender: function (event, element) {
                var start_time = moment(event.start).calendar();
                var end_time = moment(event.start).calendar();
                var event_price = event.price;
                var event_id = event.event_id;
                element.popover({
                    animation: true,
                    content: '<div class="row"><div class="col-md-12"><b>Start</b>: ' + start_time + "<br><b>End</b>: " + end_time + " <br><b>Price:</b> $" + event_price + "<br><a href='/dashboard/events/" + event_id + "' class='btn btn-primary' style='width: 100%'>Edit</a></div></div>",
                    container: 'body',
                    delay: 800,
                    html: true,
                    placement: 'top',
                    title: event.title,
                    trigger: 'hover',
                });
            },
            eventResize: function (event, delta, revertFunc) {
                var end = event.end.format();
                console.log(end);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/dashboard/calendar/update',
                    data: {
                        id: event.id,
                        start: event.start.format(),
                        end: end,
                        all_day: event.allDay
                    },
                    success: function (data) {
                        //location.reload();
                    },
                    fail: function (data) {
                        alert("error");
                        console.log(data);
                    }
                });
            },
        });
    });


   /* $('.calendar').fullCalendar({
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
        events: '/dashboard/calendarlist/'+$(this).data('location'),
        drop: function (date, event, ui, resourceId) {
            var event_id = $(event.target).attr('data-event-id');
            var calendar_date = date.format();
            var calendar_time = date.format("hh:mm:ss a");
            var all_day = date._ambigTime;
            var bg_color = $(event.target).css('backgroundColor');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/dashboard/calendar',
                data: {
                    event: event_id,
                    date: calendar_date,
                    time: calendar_time,
                    all_day: all_day,
                    backgroundColor: bg_color
                },
                success: function (data) {
                    location.reload();
                }
            });
            // var m = date.moment();
            // console.log(m);
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove();
            }
        },
        eventDrop: function (event, delta, revertFunc, jsEvent, ui, view) {

            /!*--------
                alert(
                    " id " + event.id + " " +
                    event.title + " was moved " +
                    delta._days + " days and " +
                    delta._milliseconds + " minutes."
                );
            *!/
            if (event.allDay) {
                toastr["success"](event.title + " is now all-day", event.title);
            } else {
                toastr["success"](event.title + " has a time-of-day", event.title);
            }
        //--------
        //     if (!confirm("Are you sure about this change?")) {
        //         revertFunc();
        //     }
        //--------
        // var calender_id = event.id;
        // var all_day = event.allDay;
        // var start = event.start.format();


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/dashboard/calendar/update',
                data: {
                    id: event.id,
                    start: event.start.format(),
                    all_day: event.allDay
                },
                success: function (data) {
                    //location.reload();
                },
                fail: function (data) {
                    console.log("error");
                    console.log(data);
                }
            });
        },
        eventRender: function (event, element) {
            var start_time = moment(event.start).calendar();
            var end_time = moment(event.start).calendar();
            var event_price = event.price;
            var event_id = event.event_id;
            element.popover({
                animation: true,
                content: '<div class="row"><div class="col-md-12"><b>Start</b>: ' + start_time + "<br><b>End</b>: " + end_time + " <br><b>Price:</b> $" + event_price + "<br><a href='/dashboard/events/" + event_id + "' class='btn btn-primary' style='width: 100%'>Edit</a></div></div>",
                container: 'body',
                delay: 800,
                html: true,
                placement: 'top',
                title: event.title,
                trigger: 'hover',
            });
        },
        eventResize: function (event, delta, revertFunc) {
            var end = event.end.format();
            console.log(end);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/dashboard/calendar/update',
                data: {
                    id: event.id,
                    start: event.start.format(),
                    end: end,
                    all_day: event.allDay
                },
                success: function (data) {
                    //location.reload();
                },
                fail: function (data) {
                    alert("error");
                    console.log(data);
                }
            });
        },
    });*/


    /* ADDING EVENTS */
    var currColor = "#4FC1E9"; //default
    //Color chooser button
    var colorChooser = $("#color-chooser-btn");
    $("#color-chooser").find('li a').on('click', function (e) {
        e.preventDefault();
        //Save color
        currColor = $(this).css("background-color");
        //Add color effect to button
        colorChooser
            .css({
                "background-color": currColor,
                "border-color": currColor
            })
            .html($(this).text() + ' <span class="caret"></span>');
    });
    $("#add-new-event").on('click', function (e) {
        e.preventDefault();
        //Get values and make sure event title it is not null
        var val = $("#name").val();
        var description = $("#description").val();
        var type = $('#type').val();
        if (val.length == 0) {
            return;
        }
        //Create event
        var event = $("<div />");
        event.css({
            "background-color": currColor,
            "border-color": currColor,
            "color": "#fff"
        }).addClass("external-event");
        event.html(val);
        $('#external-events').prepend(event);
        //Save Event
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/dashboard/events',
            data: {name: val, description: description, type: type},
            success: function (data) {
                //alert(data.success);
                location.reload();
            }
        });

        //Add draggable funtionality
        ini_events(event);

        //Remove event from text input
        $("#new-event").val("");
    });
    $("#close_calendar_event").on('click', function (e) {
        $("#new-event").val("");
    });


    $('input[type="checkbox"].custom_icheck, input[type="radio"].custom_radio').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue',
        increaseArea: '20%'
    });

});