<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />


</head>
<body>
<div class="container">

    <h1>Laravel FullCalender</h1>

    <div id='calendar'></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>

        $(document).ready(function () {

            var SITEURL = "{{ url('/') }}";

            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });

            var calendar = $('#calendar').fullCalendar({

                editable: false,

                events: SITEURL + "/show/calendar",

                displayEventTime: false,

                editable: false,

                eventRender: function (event, element, view) {

                    if (event.allDay === 'true') {

                        event.allDay = true;

                    } else {

                        event.allDay = false;

                    }

                },

                selectable: true,

                selectHelper: true,

                select: function (start, end, allDay) {

                    var title = '';

                    if (title) {

                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD");

                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD");

                        $.ajax({

                            url: SITEURL + "/fullcalenderAjax",

                            data: {

                                title: title,

                                start: start,

                                end: end,

                                type: 'add'

                            },

                            type: "POST",

                            success: function (data) {

                                displayMessage("Event Created Successfully");



                                calendar.fullCalendar('renderEvent',

                                    {

                                        id: data.id,

                                        title: title,

                                        start: start,

                                        end: end,

                                        allDay: allDay

                                    },true);



                                calendar.fullCalendar('unselect');

                            }

                        });

                    }

                },

                eventDrop: function (event, delta) {

                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");

                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");



                    $.ajax({

                        url: SITEURL + '/fullcalenderAjax',

                        data: {

                            title: event.title,

                            start: start,

                            end: end,

                            id: event.id,

                            type: 'update'

                        },

                        type: "POST",

                        success: function (response) {

                            displayMessage("Event Updated Successfully");

                        }

                    });

                },

                eventClick: function (event) {

                    var deleteMsg = confirm("Do you really want to delete?");

                    if (deleteMsg) {

                        $.ajax({

                            type: "POST",

                            url: SITEURL + '/fullcalenderAjax',

                            data: {

                                id: event.id,

                                type: 'delete'

                            },

                            success: function (response) {

                                calendar.fullCalendar('removeEvents', event.id);

                                displayMessage("Event Deleted Successfully");

                            }

                        });

                    }

                }



            });



        });



        function displayMessage(message) {

            toastr.success(message, 'Event');

        }

    </script>

</div>
</body>
</html>
