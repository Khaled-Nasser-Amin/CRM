@extends('layouts.appLogged')
@section('title','TRACKS/CRM/Dashboard')
@push('css')
    <link href="{{asset('libs/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainerstack", {
                animationEnabled: true,
                title:{
                    text: ""
                },
                axisX: {
                    interval: 1,
                    intervalType: "year",
                    valueFormatString: "YYYY"
                },
                axisY: {
                    suffix: "%"
                },
                toolTip: {
                    shared: true
                },
                legend: {
                    reversed: true,
                    verticalAlign: "center",
                    horizontalAlign: "right"
                },
                data: [{
                    type: "stackedColumn100",
                    name: "Real-Time",
                    showInLegend: true,
                    xValueFormatString: "YYYY",
                    yValueFormatString: "#,##0'%'",
                    dataPoints: [
                        { x: new Date(2010,0), y: 40 },
                        { x: new Date(2011,0), y: 50 },
                        { x: new Date(2012,0), y: 60 },
                        { x: new Date(2013,0), y: 61 },
                        { x: new Date(2014,0), y: 63 },
                        { x: new Date(2015,0), y: 65 },
                        { x: new Date(2016,0), y: 67 }
                    ]
                },
                    {
                        type: "stackedColumn100",
                        name: "Web Browsing",
                        showInLegend: true,
                        xValueFormatString: "YYYY",
                        yValueFormatString: "#,##0'%'",
                        dataPoints: [
                            { x: new Date(2010,0), y: 28 },
                            { x: new Date(2011,0), y: 18 },
                            { x: new Date(2012,0), y: 12 },
                            { x: new Date(2013,0), y: 10 },
                            { x: new Date(2014,0), y: 10 },
                            { x: new Date(2015,0), y: 7 },
                            { x: new Date(2016,0), y: 5 }
                        ]
                    },
                    {
                        type: "stackedColumn100",
                        name: "File Sharing",
                        showInLegend: true,
                        xValueFormatString: "YYYY",
                        yValueFormatString: "#,##0'%'",
                        dataPoints: [
                            { x: new Date(2010,0), y: 15 },
                            { x: new Date(2011,0), y: 12 },
                            { x: new Date(2012,0), y: 10 },
                            { x: new Date(2013,0), y: 9 },
                            { x: new Date(2014,0), y: 7 },
                            { x: new Date(2015,0), y: 5 },
                            { x: new Date(2016,0), y: 1 }
                        ]
                    },
                    {
                        type: "stackedColumn100",
                        name: "Others",
                        showInLegend: true,
                        xValueFormatString: "YYYY",
                        yValueFormatString: "#,##0'%'",
                        dataPoints: [
                            { x: new Date(2010,0), y: 17 },
                            { x: new Date(2011,0), y: 20 },
                            { x: new Date(2012,0), y: 18 },
                            { x: new Date(2013,0), y: 20 },
                            { x: new Date(2014,0), y: 20 },
                            { x: new Date(2015,0), y: 23 },
                            { x: new Date(2016,0), y: 27 }
                        ]
                    }]
            });
        }
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                exportEnabled: true,
                animationEnabled: true,
                title:{
                    text: ""
                },
                legend:{
                    cursor: "pointer",
                    itemclick: explodePie
                },
                data: [{
                    type: "pie",
                    showInLegend: true,
                    toolTipContent: "{name}: <strong>{y}%</strong>",
                    indexLabel: "{name} - {y}%",
                    dataPoints: [
                        { y: 26, name: "project 1", exploded: true },
                        { y: 20, name: "project 2" },
                        { y: 5, name: "project 3" },
                        { y: 3, name: "project 4" },
                        { y: 7, name: "project 5" },
                        { y: 17, name: "project 6" },
                        { y: 22, name: "project 7"}
                    ]
                }]
            });
            chart.render();
        }

        function explodePie (e) {
            if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
                e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
            } else {
                e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
            }
            e.chart.render();

        }
    </script>

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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">TRACKS</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">CRM </a></li>
                                        <li class="breadcrumb-item active">Dashboard </li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Dashboard</h4>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="row">

                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-one border border-warning bg-dark">
                                    <div class="card-body">
                                        <div class="float-right avatar-lg rounded-circle mt-3">
                                            <i class="mdi mdi-account-group e font-30 widget-icon rounded-circle avatar-title text-warning"></i>
                                        </div>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-weight-bold text-muted  " title="Statistics"><span class="text-warning">All leads</span></p>
                                            <h2><span class="text-warning" data-plugin="counterup">34578</span> <i class="mdi mdi-arrow-up text-success font-24"></i></h2>
                                            <p class="text-muted m-0"><span class="font-weight-medium text-warning">Last:30.4k</span> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-one border border-warning bg-warning">
                                    <div class="card-body">
                                        <div class="float-right avatar-lg rounded-circle mt-3">
                                            <i class=" mdi mdi-account-plus  font-30 widget-icon rounded-circle avatar-title text-secondary"></i>
                                        </div>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-weight-bold text-muted" title="User This Month">New Leads</p>
                                            <h2><span data-plugin="counterup">52410 </span> <i class="mdi mdi-arrow-up text-success font-24"></i></h2>
                                            <p class="text-muted m-0"><span class="font-weight-medium">Last:</span> 40.33k</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->


                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-one border border-warning bg-dark">
                                    <div class="card-body">
                                        <div class="float-right avatar-lg rounded-circle mt-3">
                                            <i class="mdi mdi-account-star  e font-30 widget-icon rounded-circle avatar-title text-warning"></i>
                                        </div>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-weight-bold text-muted  " title="Statistics"><span class="text-warning">Interest </span></p>
                                            <h2><span class="text-warning" data-plugin="counterup">34578</span> <i class="mdi mdi-arrow-up text-success font-24"></i></h2>
                                            <p class="text-muted m-0"><span class="font-weight-medium text-warning">Last:30.4k</span> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-one border border-warning bg-warning">
                                    <div class="card-body">
                                        <div class="float-right avatar-lg rounded-circle mt-3">
                                            <i class=" mdi mdi-account-remove  font-30 widget-icon rounded-circle avatar-title text-secondary"></i>
                                        </div>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-weight-bold text-muted" title="User This Month">Not Interest</p>
                                            <h2><span data-plugin="counterup">52410 </span> <i class="mdi mdi-arrow-up text-success font-24"></i></h2>
                                            <p class="text-muted m-0"><span class="font-weight-medium">Last:</span> 40.33k</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-one border border-warning bg-dark">
                                    <div class="card-body">
                                        <div class="float-right avatar-lg rounded-circle mt-3">
                                            <i class="mdi mdi-account-switch  font-30 widget-icon rounded-circle avatar-title text-warning"></i>
                                        </div>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-weight-bold text-muted  " title="Statistics"><span class="text-warning">Meeting</span></p>
                                            <h2><span class="text-warning" data-plugin="counterup">34578</span> <i class="mdi mdi-arrow-up text-success font-24"></i></h2>
                                            <p class="text-muted m-0"><span class="font-weight-medium text-warning">Last:30.4k</span> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-one border border-warning bg-warning">
                                    <div class="card-body">
                                        <div class="float-right avatar-lg rounded-circle mt-3">
                                            <i class=" mdi mdi-account-off font-30 widget-icon rounded-circle avatar-title text-secondary"></i>
                                        </div>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-weight-bold text-muted" title="User This Month">No Answer</p>
                                            <h2><span data-plugin="counterup">52410 </span> <i class="mdi mdi-arrow-up text-success font-24"></i></h2>
                                            <p class="text-muted m-0"><span class="font-weight-medium">Last:</span> 40.33k</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->


                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-one border border-warning bg-dark">
                                    <div class="card-body">
                                        <div class="float-right avatar-lg rounded-circle mt-3">
                                            <i class=" mdi mdi-account-clock font-30 widget-icon rounded-circle avatar-title text-warning"></i>
                                        </div>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-weight-bold text-muted  " title="Statistics"><span class="text-warning">Pending Leads</span></p>
                                            <h2><span class="text-warning" data-plugin="counterup">34578</span> <i class="mdi mdi-arrow-up text-success font-24"></i></h2>
                                            <p class="text-muted m-0"><span class="font-weight-medium text-warning">Last:30.4k</span> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-one border border-warning bg-warning">
                                    <div class="card-body">
                                        <div class="float-right avatar-lg rounded-circle mt-3">
                                            <i class="mdi mdi-account-cash font-30 widget-icon rounded-circle avatar-title text-secondary"></i>
                                        </div>
                                        <div class="wigdet-one-content">
                                            <p class="m-0 text-uppercase font-weight-bold text-muted" title="User This Month">Invoices</p>
                                            <h2><span data-plugin="counterup">52410 </span> <i class="mdi mdi-arrow-up text-success font-24"></i></h2>
                                            <p class="text-muted m-0"><span class="font-weight-medium">Last:</span> 40.33k</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- end col -->
                            <!-- end col --><!---------------calendar------------------------>

                        </div>
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
                                                            <i class="mdi mdi-checkbox-blank-circle mr-2 vertical-middle"></i>Follow up
                                                        </div>
                                                        <div class="external-event bg-info" data-class="bg-info">
                                                            <i class="mdi mdi-checkbox-blank-circle mr-2 vertical-middle"></i>Call
                                                        </div>
                                                        <div class="external-event bg-warning" data-class="bg-warning">
                                                            <i class="mdi mdi-checkbox-blank-circle mr-2 vertical-middle"></i>Meeting
                                                        </div>
                                                        <div class="external-event bg-danger" data-class="bg-purple">
                                                            <i class="mdi mdi-checkbox-blank-circle mr-2 vertical-middle"></i>Create New Lead
                                                        </div>
                                                    </div>

                                                    <!-- checkbox -->
                                                    <div class="checkbox checkbox-secondary mt-4">
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
                                                                <option value="secondary">secondary</option>
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

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card-box">
                                <h4 class="header-title mb-4">SocialMedia Leads</h4>

                                <div id="website-stats" style="height: 320px;" class="flot-chart"></div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="card-box">
                                <h4 class="header-title mb-4">Over View Analytics</h4>

                                <div class="float-right">
                                    <div id="reportrange" class="form-control form-control-sm">
                                        <i class="far fa-calendar-alt mr-1"></i>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div id="donut-chart">
                                    <div id="donut-chart-container" class="flot-chart" style="height: 246px;">
                                    </div>
                                </div>

                                <p class="text-muted mb-0 mt-3 text-truncate"></p>
                            </div>

                        </div>

                    </div>
                    <!-- end row -->

                    <div class="row">

                        <div class="col-lg-6">
                            <div class="card-box">
                                <h4 class="header-title mb-4">Delay List</h4>

                                <div class="table-responsive">
                                    <table class="table table table-hover m-0">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>Today</th>
                                            <th></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th>
                                                <span class="avatar-sm-box bg-secondary">F</span>

                                            </th>
                                            <td>
                                                <h5 class="m-0 font-15">Follow Up</h5>
                                                <p class="m-0 text-muted font-13"><small></small></p>
                                            </td>
                                            <td>40</td>

                                        </tr>

                                        <tr>
                                            <th>
                                                <span class="avatar-sm-box bg-secondary">FM</span>
                                            </th>
                                            <td>
                                                <h5 class="m-0 font-15">Follow up after meeting</h5>
                                                <p class="m-0 text-muted font-13"><small></small></p>
                                            </td>
                                            <td>20</td>

                                        </tr>

                                        <tr>
                                            <th>
                                                <span class="avatar-sm-box bg-secondary">M</span>

                                            </th>
                                            <td>
                                                <h5 class="m-0 font-15">Meeting</h5>
                                                <p class="m-0 text-muted font-13"><small></small></p>
                                            </td>
                                            <td>60</td>

                                        </tr>

                                        <tr>
                                            <th>
                                                <span class="avatar-sm-box bg-secondary">T</span>
                                            </th>
                                            <td>
                                                <h5 class="m-0 font-15">Total</h5>
                                                <p class="m-0 text-muted font-13"><small></small></p>
                                            </td>
                                            <td>120</td>
                                        </tr>
                                        <td>
                                            <h5 class="m-0 font-15"></h5>
                                            <p class="m-0 text-muted font-13"><small></small></p>
                                        </td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <tr>
                                        </tr>
                                        <tr></tr>

                                        </tbody>
                                    </table>

                                </div>
                                <!-- table-responsive -->
                            </div>
                            <!-- end card -->
                        </div>

                        <div class="col-lg-6">
                            <div class="card-box">
                                <h4 class="header-title mb-4">TO Do List</h4>

                                <div class="table-responsive">
                                    <table class="table table table-hover m-0">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>Today</th>
                                            <th></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th>
                                                <span class="avatar-sm-box bg-secondary">F</span>

                                            </th>
                                            <td>
                                                <h5 class="m-0 font-15">Follow Up</h5>
                                                <p class="m-0 text-muted font-13"><small></small></p>
                                            </td>
                                            <td> <div class="progress">
                                                    <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div></td>

                                        </tr>

                                        <tr>
                                            <th>
                                                <span class="avatar-sm-box bg-secondary">FM</span>
                                            </th>
                                            <td>
                                                <h5 class="m-0 font-15">Follow up after meeting</h5>
                                                <p class="m-0 text-muted font-13"><small></small></p>
                                            </td>
                                            <td> <div class="progress">
                                                    <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div></td>

                                        </tr>

                                        <tr>
                                            <th>
                                                <span class="avatar-sm-box bg-secondary">M</span>

                                            </th>
                                            <td>
                                                <h5 class="m-0 font-15">Meeting</h5>
                                                <p class="m-0 text-muted font-13"><small></small></p>
                                            </td>
                                            <td> <div class="progress">
                                                    <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div></td>

                                        </tr>

                                        <tr>
                                            <th>
                                                <span class="avatar-sm-box bg-secondary">T</span>
                                            </th>
                                            <td>
                                                <h5 class="m-0 font-15">Total</h5>
                                                <p class="m-0 text-muted font-13"><small></small></p>
                                            </td>
                                            <td> <div class="progress">
                                                    <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div></td>

                                        </tr>
                                        <th>

                                        </th>
                                        <td>
                                            <h5 class="m-0 font-15"></h5>
                                            <p class="m-0 text-muted font-13"><small></small></p>
                                        </td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <tr>
                                        </tr>
                                        <tr></tr>

                                        </tbody>
                                    </table>

                                </div>
                                <!-- table-responsive -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->

                    </div>
                    <!-- end row -->

                    <div class="row">

                        <!-- end col -->
                        <div class="col-lg-8">
                            <div class="card-box">
                                <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
                                <script src="{{asset('js/canvasjs.min.js')}}"></script>
                            </div></div>   <div class="col-lg-4">
                            <div class="card-box">
                                <h4 class="header-title mb-4">Last Comment</h4>

                                <div class="inbox-widget slimscroll" style="max-height: 360px;">
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="{{asset('images/users/avatar-1.jpg')}}" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Ahmed Adell</p>
                                            <p class="inbox-item-text font-12">I like that</p>
                                            <p class="inbox-item-date">13:40 PM</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="{{asset('images/users/avatar-2.jpg')}}" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Said Badawy</p>
                                            <p class="inbox-item-text font-12">Contact Please</p>
                                            <p class="inbox-item-date">13:34 PM</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="{{asset('images/users/avatar-3.jpg')}}" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">محمد احمد</p>
                                            <p class="inbox-item-text font-12">ارجو التواصل</p>
                                            <p class="inbox-item-date">13:17 PM</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="{{asset('images/users/avatar-4.jpg')}}" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Hisham Ali</p>
                                            <p class="inbox-item-text font-12">Nice to meet you</p>
                                            <p class="inbox-item-date">12:20 PM</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="{{asset('images/users/avatar-5.jpg')}}" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Shahenda</p>
                                            <p class="inbox-item-text font-12">Hey! there I'm available...</p>
                                            <p class="inbox-item-date">10:15 AM</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="{{asset('images/users/avatar-6.jpg')}}" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Adham dannaway</p>
                                            <p class="inbox-item-text font-12">This is awesome!</p>
                                            <p class="inbox-item-date">9:56 AM</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                    </div>

                </div>
            </div>

@endsection
@push('scripts')
    <!-- Vendor js dashboard -->
    <script src="{{asset('js/canvasjs.min.js')}}"></script>
    <script src="{{asset('libs/flot-charts/jquery.flot.js')}}"></script>
    <script src="{{asset('libs/flot-charts/jquery.flot.time.js')}}"></script>
    <script src="{{asset('libs/flot-charts/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('libs/flot-charts/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('libs/flot-charts/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('libs/flot-charts/jquery.flot.crosshair.js')}}"></script>
    <script src="{{asset('libs/flot-charts/jquery.flot.selection.js')}}"></script>
    <script src="{{asset('libs/moment/moment.min.js')}}"></script>
    <script src="{{asset('js/pages/dashboard_2.init.js')}}"></script>
    <script src="{{asset('js/jquery.canvasjs.min.js')}}"></script>
    <!-- plugin js -->
    <script src="{{asset('libs/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('libs/fullcalendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('js/pages/flot.init.js')}}"></script>
    <!-- Calendar init -->
    <script src="{{asset('js/pages/calendar.init.js')}}"></script>
@endpush
