@extends('layouts.appLogged')
@section('title','TRACKS/CRM/LEADS')
@push('css')
    <link href="{{asset('libs/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
@endpush
@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
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
                                    <li class="breadcrumb-item active">Leads</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Leads</h4>
                        </div>
                    </div>
                </div>

                <!-- End row -->

                <br>
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
                                indexLabel: "{name} - {y}",
                                dataPoints: [

                                        @forelse($statistic as $name => $percent )
                                            { y: {{$percent}}, name: "{{$name}}",{{$loop->index == 0 ?  'exploded: true' : ''}} },

                                        @empty
                                        @endforelse

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
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- sample modal content -->
                                    {{--statistics--}}
                                    <div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-full">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0">Modal Heading</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-lg-12">
                                                        <div class="card-box">
                                                            <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
                                                            <script src="canvasjs.min.js"></script>
                                                        </div></div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-secondary waves-effect waves-light">Save changes</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title mt-0"></h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('addNewLead')}}" method="post" id="AddNewLead">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="field-1" class="control-label">Name</label>
                                                                    <input type="text" name="name" class="form-control" id="field-1" placeholder="John">
                                                                </div>
                                                            </div>
                                                            @can('create',App\Models\User::class) {{--Assign--}}
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="field-2" class="control-label">Assign</label>
                                                                    <input type="text" name="assignedEmail" class="form-control" id="field-2" placeholder="Assign By Email">
                                                                </div>
                                                            </div>
                                                            @endcan
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="field-1" class="control-label">1st Numbe</label>
                                                                    <input type="text" name="firstPhone" class="form-control" id="field-1" placeholder="002020">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="field-2" class="control-label">Second Number</label>
                                                                    <input type="text" name="secondPhone" class="form-control" id="field-2" placeholder="02020">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="field-3" class="control-label">Address</label>
                                                                    <input type="text" name="address" class="form-control" id="field-3" placeholder="Address">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="field-4" class="control-label">City</label>
                                                                    <input type="text" name="city" class="form-control" id="field-4" placeholder="cairo">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="field-5" class="control-label">Country</label>
                                                                    <input type="text" name="country" class="form-control" id="field-5" placeholder=" Egypt">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="field-6" class="control-label">Best Time</label>
                                                                    <input type="text" name="bestTime" class="form-control" id="field-6" placeholder="123456">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group no-margin">
                                                                    <label for="field-7" class="control-label">comment</label>
                                                                    <textarea class="form-control autogrow" name="comment" id="field-7" placeholder="Write something about yourself" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="field-2" class="control-label">Project</label>
                                                                    <select class="selectpicker show-tick" name="project" data-style="btn-secondary">
                                                                        @forelse($projects as $project)
                                                                            <option value="{{$project->id}}">{{$project->name}}</option>
                                                                        @empty
                                                                            <option value="">No Projects Yet</option>
                                                                        @endforelse
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="field-1" class="control-label">Developer</label>
                                                                    <select class="selectpicker show-tick" name="developer" data-style="btn-secondary">
                                                                        @forelse($developers as $developer)
                                                                            <option value="{{$developer->id}}">{{$developer->name}}</option>
                                                                        @empty
                                                                            <option value="">No Developer Yet</option>
                                                                        @endforelse
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--ajax--}}
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="button" onclick="document.getElementById('AddNewLead').submit()" class="btn btn-info waves-effect waves-light">Save</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Custom width modal -->
                                    <!-- Full width modal -->
                                    <button class="btn btn-secondary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Add New</button>
                                    <button class="btn btn-secondary waves-effect waves-light" data-toggle="modal" data-target="#full-width-modal"><i class=" mdi mdi-signal "></i> </button>
                                    <!-- Responsive modal -->
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <!-- End row -->
                    </div>
                </div>

                <div class="row">
                     <div class="col-md-12">
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box row table-responsive">
                                    <table id="datatable-responsive"  class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>1st Num</th>
                                            <th>2nd Num</th>
                                            <th>Project</th>
                                            @can('create',App\Models\User::class)
                                                <th>Assign</th>
                                            @endcan
                                            <th>Stage date</th>
                                            <th>State</th>
                                            <th>Developer</th>
                                            <th>Best Call Time</th>
                                            <th>Last Comment</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($leads as $lead)
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <input id="checkbox5" type="checkbox">
                                                        <label for="checkbox5">
                                                            {{$lead->name}}
                                                        </label>
                                                        <button class="btn-xs  btn-secondary waves-effect waves-light"   data-toggle="modal" data-target="#custom-width-modal-{{$lead->id}}">preview</button>
                                                    </div>
                                                </td>
                                                <td><button class="btn-rounded btn-success waves-effect"> <i class=" fab fa-whatsapp "></i> <span></span> </button>{{$lead->firstPhone}}</td>
                                                <td>{{$lead->secondPhone}}</td>
                                                <td>{{$lead->project->name}}</td>
                                                @can('create',App\Models\User::class)
                                                    <td><img src="{{asset('images/users/avatar-7.jpg')}}" alt="user" class="avatar-sm rounded-circle" />{{$lead->user->email}}</td>
                                                @endcan
                                                <td>{{$lead->stageDate}} <span class="badge badge-primary rounded-circle noti-icon-badge">{{$lead->time}}&nbsp;&nbsp;&nbsp;</span></td>
                                                <td>{{$lead->state}}</td>
                                                <td>{{$lead->project->name}}</td>
                                                <th>{{$lead->bestTime}}</th>
                                                <td>{{$lead->comment}}</td>
                                                <td><!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#edit-lead-{{$lead->id}}">
                                                        Edit
                                                    </button>
                                                </td>
                                                <td> <a href="#" onclick="event.preventDefault();document.getElementById('deleteLead').submit()" class="btn btn-danger waves-effect waves-light btn-sm" id="sa-params">Delete</a></td>
                                                <form method="post" action="{{route('deleteLead',$lead->id)}}" id="deleteLead">
                                                    @csrf
                                                </form>
                                            </tr>

                                            <div id="custom-width-modal-{{$lead->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog" style="width:55%; max-width: none;">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mt-0">Lead Preview</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5 class="font-18"></h5>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="card">
                                                                        <div class="card-header bg-light">
                                                                            <h3 class="card-title mb-0"></h3>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <button class="btn btn-secondary waves-effect waves-light" data-toggle="modal" data-target="#myModal-{{$lead->id}}"><i class=" far fa-clock"></i></button>
                                                                            <div class="col-md-12">

                                                                                <!-- sample modal content -->
                                                                                <div id="myModal-{{$lead->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title mt-0">Modal Heading</h5>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <form action="{{route('lastConnection',$lead->id)}}" method="post" id="lastConnection-{{$lead->id}}">
                                                                                                    @csrf
                                                                                                    <hr>
                                                                                                    <h5 class="font-18"></h5>
                                                                                                    <div class="col-sm-6 col-md-4">
                                                                                                        <div class="form-group">
                                                                                                            Next Action
                                                                                                            <select name="state" name="state"  class="form-control w-100 show-tick" data-style="btn-secondary">
                                                                                                                <option></option>
                                                                                                                @php
                                                                                                                    $stats=['Not interest','Interest','Meeting','Deal Done','Follow UP','Reservation'];
                                                                                                                @endphp
                                                                                                                @foreach ($stats as $state)
                                                                                                                    <option value="{{$state}}" {{$state == $lead->state ? 'selected' : ''}}>{{$state}}</option>
                                                                                                                @endforeach
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="form-group">
                                                                                                        <br>
                                                                                                        <label>stage date</label>
                                                                                                        <div>
                                                                                                            <div class="input-group">
                                                                                                                <input name="stageDate" type="text" class="form-control" value="{{$lead->statgeDate}}" id="datepicker-autoclose">
                                                                                                                <div class="input-group-append">
                                                                                                                    <span class="input-group-text bg-primary text-white b-0"><i class="mdi mdi-calendar"></i></span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <!-- input-group -->

                                                                                                            <div class="form-group">
                                                                                                                <label>Time</label>
                                                                                                                <div class="input-group">
                                                                                                                    <input id="timepicker" value="{{$lead->time}}" name="time" type="text" class="form-control">
                                                                                                                    <div class="input-group-append">
                                                                                                                        <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <!-- input-group -->
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </form>

                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                                                                <button type="button" onclick="document.getElementById('lastConnection-{{$lead->id}}').submit()" class="btn btn-primary waves-effect waves-light">Save changes</button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!-- /.modal-content -->
                                                                                    </div>
                                                                                    <!-- /.modal-dialog -->
                                                                                </div>
                                                                                <!-- /.modal -->



                                                                            </div>
                                                                            <p class="mb-0">Name : {{$lead->name}}<br>

                                                                                First Phone : {{$lead->firstPhone}}
                                                                                <br>
                                                                                Second Phone : {{$lead->secondPhone}}
                                                                                <br>
                                                                                Project : {{$lead->project->name}}
                                                                                <br>
                                                                                Channel : Leed
                                                                                <br>
                                                                                Salesman : {{$lead->user->name}}
                                                                                <br>
                                                                                Creation Date : {{$lead->created_at}}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <div class="card">
                                                                                <div class="card-header bg-dark">
                                                                                    <h3 class="card-title text-white mb-0">Updates</h3>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    @foreach($lead->updates as $update)
                                                                                        <p class="mb-0 row justify-content-between">
                                                                                            <span>{{$loop->index+1}}</span>
                                                                                            <span>State : {{$update->state}}</span>
                                                                                            <span>Stage Date: {{$update->stageDate}}</span>
                                                                                            <span>Time: {{$update->time}}</span>
                                                                                        </p>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end col -->
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-secondary waves-effect waves-light">Save changes</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                            <div id="edit-lead-{{$lead->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title mt-0"></h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('updateLead',$lead->id)}}" method="post" id="updateLead-{{$lead->id}}">
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="field-1" class="control-label">Name</label>
                                                                            <input type="text" name="name" class="form-control" id="field-1" value="{{$lead->name}}">
                                                                        </div>
                                                                    </div>
                                                                    @can('create',App\Models\User::class) {{--Assign--}}
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="field-2" class="control-label">Assign</label>
                                                                            <input type="text" name="assignedEmail" class="form-control" id="field-2" value="{{$lead->user->email}}">
                                                                        </div>
                                                                    </div>
                                                                    @endcan
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="field-1" class="control-label">1st Numbe</label>
                                                                            <input type="text" name="firstPhone" class="form-control" id="field-1" value="{{$lead->firstPhone}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="field-2" class="control-label">Second Number</label>
                                                                            <input type="text" name="secondPhone" class="form-control" id="field-2" value="{{$lead->secondPhone}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="field-3" class="control-label">Address</label>
                                                                            <input type="text" name="address" class="form-control" id="field-3" value="{{$lead->address}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="field-4" class="control-label">City</label>
                                                                            <input type="text" name="city" class="form-control" id="field-4" value="{{$lead->city}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="field-5" class="control-label">Country</label>
                                                                            <input type="text" name="country" class="form-control" id="field-5" value="{{$lead->country}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="field-6" class="control-label">Best Time</label>
                                                                            <input type="text" name="bestTime" class="form-control" id="field-6" value="{{$lead->bestTime}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group no-margin">
                                                                            <label for="field-7" class="control-label">comment</label>
                                                                            <textarea class="form-control autogrow" name="comment" id="field-7" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;">{{$lead->comment}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="field-2" class="control-label">Project</label>
                                                                            <select class="form-control show-tick" name="project" data-style="btn-secondary">
                                                                                @forelse($projects as $project)
                                                                                    <option value="{{$project->id}}" {{$lead->project->id == $project->id ? 'selected': ''}}>{{$project->name}}</option>
                                                                                @empty
                                                                                    <option value="">No Projects Yet</option>
                                                                                @endforelse
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="field-1" class="control-label">Developer</label>
                                                                            <select class="form-control show-tick" name="developer" data-style="btn-secondary">
                                                                                @forelse($developers as $developer)
                                                                                    <option value="{{$developer->id}}" {{$lead->developer->id == $developer->id ? 'selected': ''}} >{{$developer->name}}</option>
                                                                                @empty
                                                                                    <option value="">No Developer Yet</option>
                                                                                @endforelse
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                            <button type="button" onclick="document.getElementById('updateLead-2').submit()" class="btn btn-info waves-effect waves-light">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                        <tr>
                                            <td>No Records Yet</td>
                                        </tr>
                                        @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>

    <!-- end content -->
    </div>


@endsection

@push('script')
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
    <script src="{{asset('js/pages/flot.init.js')}}"></script>
    <script>
    </script>
    <!-- Calendar init -->
@endpush
