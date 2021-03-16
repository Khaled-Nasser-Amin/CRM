@extends('layouts.appLogged')
@section('title','TRACKS/CRM/Dashboard')
@section('content')

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
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

                </div>
                <!-- end content -->


            </div>

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
                        <script src="canvasjs.min.js"></script>
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
                                    <div class="inbox-item-img"><img src="{{asset('images/users/avatar-6.jpg')}}'" class="rounded-circle" alt=""></div>
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
    </div>


    <!-- end row -->





    <!-- end row -->




    <!-- end row -->
    <!-- end col -->
    <!-- table-responsive -->
    <!-- end card -->
    <!-- end col -->

    <!-- end row -->


    <!-- end container-fluid -->


    <!-- end content -->



    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    2020 &copy;<a href="">Tracks</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->



    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
@endsection
