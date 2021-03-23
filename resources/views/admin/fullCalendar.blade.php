@extends('layouts.appLogged')
@section('title','TRACKS/CRM/Calendar')
@push('css')
    <link href="{{asset('libs/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tracks</a></li>
                                <li class="breadcrumb-item active">Calendar</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Calendar</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">

                    <div class="card-box">
                        <div class="row">
                            <div class="col-xl-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="#" data-toggle="modal" data-target="#add-category" class="btn btn-lg btn-secondary btn-block waves-effect waves-light">
                                            <i class="fa fa-plus"></i> Create New
                                        </a>
                                        <div id="external-events" class="mt-3">
                                            <br>
                                            <p class="text-muted"></p>
                                            <div class="external-event bg-success" data-class="bg-success">
                                                <i class="mdi mdi-checkbox-blank-circle mr-2 vertical-middle"></i>Follow Up
                                            </div>
                                            <div class="external-event bg-info" data-class="bg-info">
                                                <i class="mdi mdi-checkbox-blank-circle mr-2 vertical-middle"></i>Call
                                            </div>
                                            <div class="external-event bg-warning" data-class="bg-warning">
                                                <i class="mdi mdi-checkbox-blank-circle mr-2 vertical-middle"></i>Meetingr
                                            </div>
                                            <div class="external-event bg-purple" data-class="bg-purple">
                                                <i class="mdi mdi-checkbox-blank-circle mr-2 vertical-middle"></i>Create New Lead
                                            </div>
                                        </div>

                                        <!-- checkbox -->
                                        <div class="checkbox checkbox-primary mt-4">
                                            <input id="drop-remove" type="checkbox">
                                            <label for="drop-remove">
                                                Remove after drop
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- end col-->
                            <div class="col-xl-9">
                                <div id="calendar"></div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>

                    <!-- BEGIN MODAL -->
                    <div class="modal fade none-border" id="event-modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title mt-0">Add New Event</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body p-4"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                    <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Add Category -->
                    <div class="modal fade none-border" id="add-category">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title mt-0">Add a category</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body p-4">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="control-label">Category Name</label>
                                                <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Choose Category Color</label>
                                                <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                    <option value="success">Success</option>
                                                    <option value="danger">Danger</option>
                                                    <option value="info">Info</option>
                                                    <option value="pink">Pink</option>
                                                    <option value="primary">Primary</option>
                                                    <option value="warning">Warning</option>
                                                    <option value="orange">Orange</option>
                                                    <option value="brown">Brown</option>
                                                    <option value="teal">Teal</option>
                                                    <option value="inverse">Inverse</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END MODAL -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->

        </div>
        <!-- end container-fluid -->

    </div>

@endsection
@push('script')
    <script src="{{asset('libs/moment/moment.min.js')}}"></script>
    <script src="{{asset('libs/fullcalendar/fullcalendar.min.js')}}"></script>

    <!-- Calendar init -->
    <script src="{{asset('js/pages/calendar.init.js')}}"></script>
    <script>
        $(document).ready(function () {

    $.ajaxSetup({
    headers:{
    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
    });

    var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
    left:'prev,next today',
    center:'title',
    right:'month,agendaWeek,agendaDay'
    },
    events:'/full-calender',
    selectable:true,
    selectHelper: true,
    select:function(start, end, allDay)
    {
    var title = prompt('Event Title:');

    if(title)
    {
    var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');

    var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

    $.ajax({
    url:"/full-calender/action",
    type:"POST",
    data:{
    title: title,
    start: start,
    end: end,
    type: 'add'
    },
    success:function(data)
    {
    calendar.fullCalendar('refetchEvents');
    alert("Event Created Successfully");
    }
    })
    }
    },
    editable:true,
    eventResize: function(event, delta)
    {
    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
    var title = event.title;
    var id = event.id;
    $.ajax({
    url:"/full-calender/action",
    type:"POST",
    data:{
    title: title,
    start: start,
    end: end,
    id: id,
    type: 'update'
    },
    success:function(response)
    {
    calendar.fullCalendar('refetchEvents');
    alert("Event Updated Successfully");
    }
    })
    },
    eventDrop: function(event, delta)
    {
    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
    var title = event.title;
    var id = event.id;
    $.ajax({
    url:"/full-calender/action",
    type:"POST",
    data:{
    title: title,
    start: start,
    end: end,
    id: id,
    type: 'update'
    },
    success:function(response)
    {
    calendar.fullCalendar('refetchEvents');
    alert("Event Updated Successfully");
    }
    })
    },

    eventClick:function(event)
    {
    if(confirm("Are you sure you want to remove it?"))
    {
    var id = event.id;
    $.ajax({
    url:"/full-calender/action",
    type:"POST",
    data:{
    id:id,
    type:"delete"
    },
    success:function(response)
    {
    calendar.fullCalendar('refetchEvents');
    alert("Event Deleted Successfully");
    }
    })
    }
    }
    });

    });
    </script>
@endpush
