@extends('layouts.appLogged')
@section('title','TRACKS/CRM/LEADS')
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
                <!-- end page title -->
                <!-- end page title -->
                <!-- End row -->

                <br>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">


                            <!-- end col -->
                            <div class="row text-center">
                                <div class="col-sm-12">
                                    <h4 class="mt-3 mb-4"></h4>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row">
                                <div class="col-md-12">



                                    <!-- sample modal content -->

                                    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
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
                                                                    <button class="btn btn-secondary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg"><i class=" far fa-comment-dots  "></i></button>
                                                                    <button class="btn btn-secondary waves-effect waves-light" data-toggle="modal" data-target="#myModal"><i class=" far fa-clock "></i></button>
                                                                    <div class="col-md-12">


                                                                        <!-- sample modal content -->
                                                                        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title mt-0">Modal Heading</h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <h5 class="font-18 mt-0"></h5>
                                                                                        <p></p>
                                                                                        <hr>
                                                                                        <h5 class="font-18"></h5>
                                                                                        <div class="col-sm-6 col-md-4">
                                                                                            <div class="form-group">
                                                                                                Next Action
                                                                                                <select class="selectpicker show-tick" data-style="btn-secondary">
                                                                                                    <option value="1"> Not interest</option>
                                                                                                    <option value="2">Meeting</option>
                                                                                                    <option value="3">Deal Done</option>
                                                                                                    <option value="4">Follow UP</option>
                                                                                                    <option value="5">Reservation</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>


                                                                                        <div class="form-group">
                                                                                            <div class="radio radio-info form-check-inline">
                                                                                                <input type="radio" id="inlineRadio1" value="option1" name="radioInline" checked>
                                                                                                <label for="inlineRadio1">Answer </label>
                                                                                            </div>
                                                                                            <div class="radio form-check-inline">
                                                                                                <input type="radio" id="inlineRadio2" value="option2" name="radioInline" checked>
                                                                                                <label for="inlineRadio2"> Not Answer </label>
                                                                                            </div>
                                                                                            <br>
                                                                                            <label>stage date</label>
                                                                                            <div>
                                                                                                <div class="input-group">
                                                                                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
                                                                                                    <div class="input-group-append">
                                                                                                        <span class="input-group-text bg-primary text-white b-0"><i class="mdi mdi-calendar"></i></span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- input-group -->

                                                                                                <div class="form-group">
                                                                                                    <label>Time</label>
                                                                                                    <div class="input-group">
                                                                                                        <input id="timepicker" type="text" class="form-control">
                                                                                                        <div class="input-group-append">
                                                                                                            <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <!-- input-group -->
                                                                                                </div> </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <div class="form-group row">
                                                                                                <label class="col-md-4 control-label">Text area</label>
                                                                                                <div class="col-md-8">
                                                                                                    <textarea class="form-control" rows="5"></textarea>
                                                                                                </div>
                                                                                            </div>


                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- /.modal-content -->
                                                                            </div>
                                                                            <!-- /.modal-dialog -->
                                                                        </div>
                                                                        <!-- /.modal -->

                                                                        <!--  Modal content for the above example -->
                                                                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                                                            <div class="modal-dialog modal-lg">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title mt-0">Comments</h5>

                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="form-group row">
                                                                                            <label class="col-md-4 control-label">Comment</label>
                                                                                            <div class="col-md-8">
                                                                                                <textarea class="form-control" rows="5"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="list-group">
                                                                                            <a href="#" class="list-group-item list-group-item-action active">

                                                                                            </a>
                                                                                            <a href="#" class="list-group-item list-group-item-action">Previous Comments</a>
                                                                                            <a href="#" class="list-group-item list-group-item-action"></a>
                                                                                            <a href="#" class="list-group-item list-group-item-action"></a>
                                                                                            <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true"></a>
                                                                                        </div>
                                                                                        <br>


                                                                                        <button type="button" class="btn btn-secondary btn-rounded width-md waves-effect">ADD</button>
                                                                                    </div>
                                                                                </div>


                                                                                <!-- /.modal-content -->

                                                                                <!-- /.modal -->

                                                                                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                                                                    <div class="modal-dialog modal-sm">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title mt-0">Small modal</h5>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                ...
                                                                                            </div>
                                                                                        </div>
                                                                                        <!-- /.modal-content -->
                                                                                    </div>
                                                                                    <!-- /.modal-dialog -->
                                                                                </div>
                                                                                <!-- /.modal -->

                                                                                <div class="button-list">
                                                                                    <!-- Button trigger modal -->

                                                                                    <!-- Large modal -->

                                                                                    <!-- Small modal -->

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <p class="mb-0">name : shaker yaser<br>

                                                                        mobile : 00966566104336
                                                                        <br>
                                                                        email : --
                                                                        <br>
                                                                        project : Masa Mall
                                                                        <br>
                                                                        channel : Leed
                                                                        <br>
                                                                        salesman : --
                                                                        <br>
                                                                        creation date : 2020-06-21 21:13:39
                                                                        <br>
                                                                        budget : --
                                                                        <br>
                                                                        lead tags :
                                                                        <br>
                                                                        classification : --
                                                                        <br>
                                                                        Broker Name : --
                                                                        <br>
                                                                        mobile 2 : 966566104336
                                                                        Attachment :
                                                                    </p>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="card">
                                                                        <div class="card-header bg-dark">
                                                                            <h3 class="card-title text-white mb-0">Channel</h3>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <p class="mb-0"> channel: Leed<br>
                                                                                salesman: Islam Badran<br>
                                                                                creation date: 2020-06-21 21:13:39<br>
                                                                                last stage: --.</p>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mt-4 mt-lg-0">



                                                                <div class="list-group">
                                                                    <a href="#" class="list-group-item list-group-item-action active">

                                                                    </a>
                                                                    <a href="#" class="list-group-item list-group-item-action"></a>
                                                                    <a href="#" class="list-group-item list-group-item-action"></a>
                                                                    <a href="#" class="list-group-item list-group-item-action"></a>
                                                                    <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true"></a>
                                                                </div>

                                                                <!-- list-group -->
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
                                                            <script src="{{asset('canvasjs.min.js')}}"></script>
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
                                                            <form action=""></form>
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
                                                                    <div class="input-group mt-3">
                                                                        <form action="{{route('addNewProject')}}" id="addNewProject" method="post">
                                                                            @csrf
                                                                            <input type="text"  name="name" class="form-control" placeholder="New Project">
                                                                            <span class="input-group-append">
                                                                                <button type="button" onclick="document.getElementById('addNewProject').submit()" class="btn waves-effect waves-light btn-secondary">+</button>
                                                                            </span>
                                                                        </form>
                                                                    </div>
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
                                                                    <div class="input-group mt-3">
                                                                        <form action="{{route('addNewDeveloper')}}" id="addNewDeveloper" method="post">
                                                                            @csrf
                                                                            <input type="text"  name="name" class="form-control" placeholder="New Developer">
                                                                            <span class="input-group-append">
                                                                                <button type="button" onclick="document.getElementById('addNewDeveloper').submit()" class="btn waves-effect waves-light btn-secondary">+</button>
                                                                            </span>
                                                                        </form>
                                                                    </div>

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
            </div>




    <div class="row">
        <div class="col-md-12">
            <br>
            <br>
            {{--<div class="row">
                <div class="col-sm-12">
                    <form class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <select class="selectpicker show-tick" data-style="btn-secondary">
                                    <option value="0" disabled>Status</option>
                                    <option value="1">Intersest</option>
                                    <option value="2">Not interest</option>                                               <option value="2">No Answer</option>
                                    <option value="2">Meeting</option>
                                    <option value="2">call</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <select class="selectpicker show-tick" data-style="btn-secondary">
                                    <option value="">Region</option>
                                    <option value="1">New Capital</option>
                                    <option value="2">New Cairo</option>
                                    <option value="3">6th of October</option>
                                    <option value="4">Elsokna</option>
                                    <option value="5">Nourth Coast</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <select class="selectpicker show-tick" data-style="btn-secondary">
                                    <option value="">Assign</option>
                                    <option value="1">AHMED</option>
                                    <option value="2">Mohamed</option>
                                    <option value="3">Ali</option>
                                    <option value="4">Hassa</option>
                                    <option value="5">Amr</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <select class="selectpicker show-tick" data-style="btn-secondary">
                                    <option value="">Developer</option>
                                    <option value="1">Capital Link</option>
                                    <option value="2">Doja</option>
                                    <option value="3">Pyramids</option>
                                    <option value="4">Edge Holding</option>
                                    <option value="5">RFCO</option>
                                    <option value="5">Elcaptain</option>
                                    <option value="5">Home Town</option>

                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <form class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <select class="selectpicker show-tick" data-style="btn-secondary">
                                    <option value="0" disabled>Project</option>
                                    <option value="1">Ilmondo</option>
                                    <option value="2">Lafayatte</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <select class="selectpicker show-tick" data-style="btn-secondary">
                                    <option value="">TAGS</option>


                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <select class="selectpicker show-tick" data-style="btn-secondary">
                                    <option value="">Additional Filter</option>
                                    <option value="1">low budget</option>
                                    <option value="2">not interests</option>
                                    <option value="3">delay</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div>
                                        <div>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-multiple-date">
                                                <div class="input-group-append">
                                                    <span class="input-group-text bg-secondary text-white b-0"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>
                                            <!-- input-group -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-4 text-center mt-2">
                            <button type="submit" class="btn btn-secondary waves-effect waves-light"><i class="mdi mdi-magnify mr-1"></i>Search</button>
                        </div>
                    </form>
                </div>
            </div>--}}
            <!-- end row -->

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
                                <th>Assign</th>
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
                                            <button class="btn-xs  btn-secondary waves-effect waves-light"   data-toggle="modal" data-target="#custom-width-modal">preview</button>
                                        </div>
                                    </td>
                                    <td><button class="btn-rounded btn-success waves-effect"> <i class=" fab fa-whatsapp "></i> <span></span> </button>
                                        {{$lead->firstPhone}}</td>
                                    <td>{{$lead->secondPhone}}</td>

                                    <td>{{$lead->project->name}}</td>
                                    <td><img src="{{asset('images/users/avatar-7.jpg')}}" alt="user" class="avatar-sm rounded-circle" /></td>
                                    <td>2011/04/25 <span class="badge badge-primary rounded-circle noti-icon-badge">&nbsp;&nbsp;&nbsp;</span></td>
                                    <td><div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <select class="selectpicker show-tick" data-style="btn-secondary">
                                                    <option value="">State</option>
                                                    < option value="1">interest</option>
                                                    <option value="2">not interest</option>
                                                    <option value="3">no answer</option>
                                                    <option value="4">meeting</option>
                                                    <option value="5">call</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td> {{$lead->developer->name}} </td>
                                    <th>{{$lead->bestTime}}</th>
                                    <td>{{$lead->comment}}</td>
                                    <td><!-- Button trigger modal -->
                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#edit-lead-{{$lead->id}}">
                                            Edit
                                        </button>
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
                                                        <form action="{{route('updateLead',$lead->id)}}" method="post" id="updateLead">
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
                                                                        <textarea class="form-control autogrow" name="comment" id="field-7" value="{{$lead->comment}}" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <form action=""></form>
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
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                        <button type="button" onclick="document.getElementById('AddNewLead').submit()" class="btn btn-info waves-effect waves-light">Save</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    <td> <a href="#" onclick="event.preventDefault();document.getElementById('deleteLead').submit()" class="btn btn-danger waves-effect waves-light btn-sm" id="sa-params">Delete</a></td>
                                    <form method="post" action="{{route('deleteLead',$lead->id)}}" id="deleteLead">
                                        @csrf
                                    </form>
                                </tr>
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

    <!-- end content -->
    </div>

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    2020 &copy; <a href="">Tracks</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->


@endsection
