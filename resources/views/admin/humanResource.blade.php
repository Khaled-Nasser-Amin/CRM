@extends('layouts.appLogged')
@section('title','TRACKS/CRM/Staff')
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
                                <li class="breadcrumb-item active">Staff</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Staff</h4>
                    </div>
                </div>
            </div>
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
                                <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title mt-0">EMPLOYEE</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <form action="{{route('addNewEmployee')}}" method="post" id="addNewEmployee">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Name</label>
                                                                <input type="text" class="form-control" id="field-1" name="name" placeholder="John">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-2" class="control-label"> Serial</label>
                                                                <input type="text" class="form-control" id="field-2" name="serial" placeholder="Digla">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Phone number</label>
                                                                <input type="text" class="form-control" id="field-1" name="phoneNumber" placeholder="01302533">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-2" class="control-label">Position</label>
                                                                <input type="text" class="form-control" id="field-2" name="position" placeholder="position">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Area</label>
                                                                <input type="text" class="form-control" id="field-1" name="area" placeholder="area">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-2" class="control-label">Experience</label>
                                                                <input type="text" class="form-control" id="field-2" name="experience" placeholder="year">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Email</label>
                                                                <input type="text" class="form-control" id="field-1" name="email" placeholder="tracks@tracks.com">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-2" class="control-label">Academic Study</label>
                                                                <input type="text" class="form-control" id="field-2" name="academicStudy" placeholder="Faculty">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-3" class="control-label">Address</label>
                                                                <input type="text" class="form-control" id="field-3" name="address" placeholder="Address">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="field-4" class="control-label">City</label>
                                                                <input type="text" class="form-control" id="field-4" name="city" placeholder="Boston">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="field-5" class="control-label">Country</label>
                                                                <input type="text" class="form-control" id="field-5" name="country" placeholder="United States">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="field-6" class="control-label">Zip</label>
                                                                <input type="text" class="form-control" id="field-6" name="zip" placeholder="123456">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group no-margin">
                                                                <label for="field-7" class="control-label">comment</label>
                                                                <textarea class="form-control autogrow" id="field-7" name="comment" placeholder="Write something about yourself" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-info waves-effect waves-light" onclick="document.getElementById('addNewEmployee').submit()">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.modal -->
                                <!-- Responsive modal -->
                                <button class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Add New</button>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                                <!-- End row -->
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="row">
                                <div class="col-sm-12">
                                    <form class="row">
                                        <div class="col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <select class="selectpicker show-tick" data-style="btn-secondary">
                                                    <option value="0" >Position</option>
                                                    <option value="1">Sales Manager</option>
                                                    <option value="2">Sales Team Leader</option>
                                                    <option value="3">Sales Consultant</option>
                                                    <option value="4">Sales Admin</option>
                                                    <option value="5">Digital Markter</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <select class="selectpicker show-tick" data-style="btn-secondary">
                                                    <option value="0">Location</option>
                                                    <option value="1">New Cairo</option>
                                                    <option value="2">6th of October</option>
                                                    <option value="3">Nasr city</option>


                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <select class="selectpicker show-tick" data-style="btn-secondary">
                                                    <option value="0"> Experience</option>
                                                    <option value="1">Without Experience</option>
                                                    <option value="2">1 Years</option>
                                                    <option value="3">2Years</option>
                                                    <option value="4">3Years</option>
                                                    <option value="5">4Years</option>
                                                    <option value="6">More than 4 Years</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <div class="row">
                                                <div class="col-lg-8">

                                                    <div>
                                                        <form action="#">
                                                            <div class="form-group">
                                                                <div>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text bg-secondary text-white b-0"><i class="mdi mdi-calendar"></i></span>
                                                                        </div>

                                                                    </div>
                                                                    <!-- input-group -->
                                                                </div>
                                                            </div>
                                                        </form></div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12 mb-4 text-center mt-2">
                                            <button type="submit" class="btn btn-secondary waves-effect waves-light"><i class="mdi mdi-magnify mr-1"></i>Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- end row -->

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">


                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>serial</th>
                                                <th>Name</th>
                                                <th>Mobil Num</th>
                                                <th>Position</th>
                                                <th>Area</th>
                                                <th>Experience</th>
                                                <th>Start date</th>
                                                <th>E-mail</th>
                                                <th>DOCUMENTATIONS</th>
                                                <th>actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($employees as $employee)
                                                <tr>
                                                    <td>{{$employee->serial}}</td>
                                                    <td><img src="{{asset('images/users/avatar-7.jpg')}}" alt="user" class="avatar-sm rounded-circle" /> {{$employee->name}}</td>
                                                    <td>{{$employee->phone}}</td>
                                                    <td>{{$employee->position}}</td>
                                                    <td>{{$employee->aria}}</td>
                                                    <td>{{$employee->experience}}</td>
                                                    <td>{{$employee->created_at}}</td>
                                                    <td><{{$employee->email}}/td>
                                                    <td>  <button type="button" class="btn btn-secondary btn-rounded width-md waves-effect">Download</button></td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-sm btn-rounded width-md waves-effect">Edit</button>
                                                        <a href="#" class="btn btn-danger bth-sm btn-rounded width-md waves-effect">Delete</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr><td>No Records Yet</td></tr>
                                            @endforelse

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <!-- end row -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
