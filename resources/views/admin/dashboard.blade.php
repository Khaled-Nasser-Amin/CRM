@extends('layouts.appLogged')
@section('title','TRACKS/CRM/Dashboard')
@push('css')
    <link href="{{asset('libs/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

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
                                    <h2><span class="text-warning" data-plugin="counterup">{{$leads->count()}}</span> </h2>
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
                                    <h2><span data-plugin="counterup">{{$leads->where('state',null)->count()}} </span> </h2>
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
                                    <p class="m-0 text-uppercase font-weight-bold text-muted  " title="Statistics"><span class="text-warning">Interest</span></p>
                                    <h2><span class="text-warning" data-plugin="counterup">{{$leads->where('state','Interest')->count()}}</span> </h2>
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
                                    <h2><span data-plugin="counterup">{{$leads->where('state','Not interest')->count()}} </span> </h2>
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
                                    <h2><span class="text-warning" data-plugin="counterup">{{$leads->where('state','Meeting')->count()}}</span> </h2>
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
                                    <p class="m-0 text-uppercase font-weight-bold text-muted" title="User This Month">Deal Done</p>
                                    <h2><span data-plugin="counterup">{{$leads->where('state','Deal Done')->count()}} </span> </h2>
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
                                    <p class="m-0 text-uppercase font-weight-bold text-muted  " title="Statistics"><span class="text-warning">Follow Up</span></p>
                                    <h2><span class="text-warning" data-plugin="counterup">{{$leads->where('state','Follow UP')->count()}}</span> </h2>
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
                                    <h2><span data-plugin="counterup">{{$invoices}} </span> </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container-fluid -->

            </div>
          {{--  <!-- end content -->
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
            <!-- end row -->--}}

            <div class="row">
                <!-- end col -->
                <div class="col-lg-8">
                    <div class="card-box">
                        <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
                    </div>
                </div>
                <div class="col-lg-4 h-auto">
                    <div class="card-box">
                        <h4 class="header-title mb-4">Last Comment</h4>

                        <div class="inbox-widget slimscroll h-100" id="tickets" style="max-height: 360px; overflow-y: scroll">

                            @forelse($tickets as $ticket)
                                <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-item-img">
                                            <img src="{{$ticket->user->image}}" class="rounded-circle" alt="">
                                        </div>
                                        <p class="inbox-item-author">{{ucfirst($ticket->user->name)}} ({{$ticket->name}} )</p>
                                        <p class="inbox-item-text font-12">{{$ticket->comment}}</p>
                                        <p class="inbox-item-date">{{$ticket->created_at->diffForHumans()}}</p>
                                    </div>
                                </a>
                            @empty
                                <p class="text-muted">there are no comments</p>
                            @endforelse


                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <!-- Vendor js dashboard -->
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
    <script src="{{asset('js/pages/flot.init.js')}}"></script>
    <!-- Calendar init -->


    <script>

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
                            @forelse($dataStatistic as $name => $percent )
                            { y: {{$percent}}, name: "{{$name}}",{{$loop->index == 0 ?  'exploded: true' : ''}} },

                            @empty
                            @endforelse
                            @if($sumOfOthers != 100)
                            { y: {{$sumOfOthers}}, name: "others" },
                            @endif


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
