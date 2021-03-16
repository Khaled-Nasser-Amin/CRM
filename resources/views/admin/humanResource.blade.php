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
                                                <h5 class="modal-title mt-0">Modal Heading</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5 class="font-18">Text in a modal</h5>
                                                <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                                                <hr>
                                                <h5 class="font-18">Overflowing text to show scroll behavior</h5>
                                                <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
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
                                                <h5 class="font-18">Text in a modal</h5>
                                                <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                                                <hr>
                                                <h5 class="font-18">Overflowing text to show scroll behavior</h5>
                                                <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
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
                                                <h4 class="modal-title mt-0">EMPLOYEE</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="field-1" class="control-label">Name</label>
                                                            <input type="text" class="form-control" id="field-1" placeholder="John">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="field-2" class="control-label"> Serial</label>
                                                            <input type="text" class="form-control" id="field-2" placeholder="Digla">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="field-1" class="control-label">Phone number</label>
                                                            <input type="text" class="form-control" id="field-1" placeholder="002020">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="field-2" class="control-label">Position</label>
                                                            <input type="text" class="form-control" id="field-2" placeholder="position">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="field-1" class="control-label">Area</label>
                                                            <input type="text" class="form-control" id="field-1" placeholder="area">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="field-2" class="control-label">Experience</label>
                                                            <input type="text" class="form-control" id="field-2" placeholder="year">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="field-1" class="control-label">Email</label>
                                                            <input type="text" class="form-control" id="field-1" placeholder="tracks@tracks.com">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="field-2" class="control-label">Academic Study</label>
                                                            <input type="text" class="form-control" id="field-2" placeholder="Faculty">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="field-3" class="control-label">Address</label>
                                                            <input type="text" class="form-control" id="field-3" placeholder="Address">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="field-4" class="control-label">City</label>
                                                            <input type="text" class="form-control" id="field-4" placeholder="Boston">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="field-5" class="control-label">Country</label>
                                                            <input type="text" class="form-control" id="field-5" placeholder="United States">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="field-6" class="control-label">Zip</label>
                                                            <input type="text" class="form-control" id="field-6" placeholder="123456">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group no-margin">
                                                            <label for="field-7" class="control-label">comment</label>
                                                            <textarea class="form-control autogrow" id="field-7" placeholder="Write something about yourself" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-info waves-effect waves-light">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.modal -->

                                <div id="accordion-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content p-0">
                                            <div class="accordion" id="accordion-test">
                                                <div class="card mb-0">
                                                    <div class="card-heading p-3 bg-light">
                                                        <h4 class="card-title m-0">
                                                            <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                                Collapsible Group Item #1
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne" class="collapse" data-parent="#accordion-test">
                                                        <div class="card-body">
                                                            <p class="mb-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh, craft beer labore sapiente ea proident. Ad vegan excepteur butcher vice lomo leggings occaecat.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card mt-1 mb-0">
                                                    <div class="card-heading p-3 bg-light">
                                                        <h4 class="card-title m-0">
                                                            <a href="#" class="text-dark" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                Collapsible Group Item #2
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseTwo" class="collapse show" data-parent="#accordion-test">
                                                        <div class="card-body">
                                                            <p class="mb-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh, craft beer labore sapiente ea proident. Ad vegan excepteur butcher vice lomo leggings occaecat.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card mt-1 mb-0">
                                                    <div class="card-heading p-3 bg-light">
                                                        <h4 class="card-title m-0">
                                                            <a href="#" class="text-dark" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                Collapsible Group Item #3
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree" class="collapse" data-parent="#accordion-test">
                                                        <div class="card-body">
                                                            <p class="mb-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh, craft beer labore sapiente ea proident. Ad vegan excepteur butcher vice lomo leggings occaecat.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->

                                <div id="card-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content p-0 b-0">
                                            <div class="card mb-0">
                                                <div class="card-header bg-secondary">
                                                    <h5 class="modal-title font-18 text-white float-left mt-0">Card secondary</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="card-body">
                                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->


                                <!-- Custom width modal ->
                                <button class="btn btn-secondary waves-effect waves-light" data-toggle="modal" data-target="#custom-width-modal">Custom width Modal</button>
                                <!-- Full width modal ->
                                <button class="btn btn-secondary waves-effect waves-light" data-toggle="modal" data-target="#full-width-modal">Import Leads</button>
                                <!-- Responsive modal -->
                                <button class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Add New</button>
                                <!-- Accordion modal ->
                                <button class="btn btn-secondary waves-effect waves-light" data-toggle="modal" data-target="#accordion-modal">Accordion in Modal</button>
                                <!-- Panel modal ->
                                <button class="btn btn-secondary waves-effect waves-light" data-toggle="modal" data-target="#card-modal">Card in Modal</button>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                                <!-- End row -->
                            </div>
                        </div>
                    </div>
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
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>001020023</td>
                                                <td><img src="assets/images/users/avatar-7.jpg" alt="user" class="avatar-sm rounded-circle" /> Amr Mohammed</td>
                                                <td>010200200</td>
                                                <td>Sales Consultant</td>
                                                <td>New Cairo</td>
                                                <td>3years</td>
                                                <td>2020/04/25 </td>
                                                <td>t.nixon@datatables.net</td>
                                                <td>  <button type="button" class="btn btn-secondary btn-rounded width-md waves-effect">Download</button></td>
                                            </tr>

                                            <tr>
                                                <td>001020023</td>
                                                <td><img src="assets/images/users/avatar-7.jpg" alt="user" class="avatar-sm rounded-circle" /> Amr Mohammed</td>
                                                <td>010200200</td>
                                                <td>Sales Consultant</td>
                                                <td>New Cairo</td>
                                                <td>3years</td>
                                                <td>2020/04/25 </td>
                                                <td>t.nixon@datatables.net</td>
                                                <td>  <button type="button" class="btn btn-secondary btn-rounded width-md waves-effect">Download</button></td>
                                            </tr>
                                            <tr>
                                                <td>001020023</td>
                                                <td><img src="assets/images/users/avatar-7.jpg" alt="user" class="avatar-sm rounded-circle" /> Amr Mohammed</td>
                                                <td>010200200</td>
                                                <td>Sales Consultant</td>
                                                <td>New Cairo</td>
                                                <td>3years</td>
                                                <td>2020/04/25 </td>
                                                <td>t.nixon@datatables.net</td>
                                                <td>  <button type="button" class="btn btn-secondary btn-rounded width-md waves-effect">Download</button></td>
                                            </tr>
                                            <tr>
                                                <td>001020023</td>
                                                <td><img src="assets/images/users/avatar-7.jpg" alt="user" class="avatar-sm rounded-circle" /> Amr Mohammed</td>
                                                <td>010200200</td>
                                                <td>Sales Consultant</td>
                                                <td>New Cairo</td>
                                                <td>3years</td>
                                                <td>2020/04/25 </td>
                                                <td>t.nixon@datatables.net</td>
                                                <td>  <button type="button" class="btn btn-secondary btn-rounded width-md waves-effect">Download</button></td>
                                            </tr>
                                            <tr>
                                                <td>001020023</td>
                                                <td><img src="assets/images/users/avatar-7.jpg" alt="user" class="avatar-sm rounded-circle" /> Amr Mohammed</td>
                                                <td>010200200</td>
                                                <td>Sales Consultant</td>
                                                <td>New Cairo</td>
                                                <td>3years</td>
                                                <td>2020/04/25 </td>
                                                <td>t.nixon@datatables.net</td>
                                                <td>  <button type="button" class="btn btn-secondary btn-rounded width-md waves-effect">Download</button></td>
                                            </tr>
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
@endsection
