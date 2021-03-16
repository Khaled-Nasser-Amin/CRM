@extends('layouts.appLogged')
@section('title','Property')
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
                                <li class="breadcrumb-item active">Properties</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Properties </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row text-center">
                <div class="col-sm-12">
                    <h4 class="mt-3 mb-4">Projects </h4>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-3 mb-4 text-left mt-2">
                        <a href="{{route('addNewProperty')}}"><button type="submit" class="btn btn-secondary waves-effect waves-light"><i class=""></i>+ add</button></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <form class="row">
                        <div class="col-sm-6 col-md-4">

                            <div class="form-group">
                                <select class="selectpicker show-tick" data-style="btn-secondary">
                                    <option value="">Commercial</option>
                                    <option value="1">Resedintal</option>
                                    <option value="2">Administrative</option>
                                    <option value="3">Medical</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <select class="selectpicker show-tick" data-style="btn-secondary">
                                    <option value="1">6th October</option>
                                    <option value="2">New Cairo</option>
                                    <option value="3">New Capital</option>
                                    <option value="4">Elshokhna</option>
                                    <option value="5">Nourth Coast</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <div class="form-group row">
                                <label for="range_03" class="col-sm-2 control-label"><b>price</b><span class="font-normal text-muted font-13 d-block "></span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="range_03">
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
                <div class="col-lg-4 col-sm-6">
                    <div class="property-card card">
                        <div class="property-image" style="background: url('{{asset('images/properties/1.png')}}') center center / cover no-repeat;">
                            <span class="property-label badge badge-warning">For Rent</span>
                        </div>

                        <div class="property-content card-body">
                            <div class="listingInfo">
                                <div class="">
                                    <h5 class="text-secondary font-18 mt-0">800K L.E/2M L.E</h5>
                                </div>
                                <div class="">
                                    <h5 class="text-overflow"><a href="#" class="text-dark">Pyramids,Egypt</a></h5>
                                    <p class="text-muted text-overflow"><i class="mdi mdi-map-marker-radius mr-1"></i>New Cairo,Cairo,Egypt</p>

                                    <div class="row text-center">
                                        <div class="col-4">
                                            <h4>280</h4>
                                            <p class="text-overflow" title="Square Feet">Square Feet</p>
                                        </div>
                                        <div class="col-4">
                                            <h4>4</h4>
                                            <p class="text-overflow" title="Bedrooms">Bedrooms</p>
                                        </div>
                                        <div class="col-4">
                                            <h4>2</h4>
                                            <p class="text-overflow" title="Parking Space">Parking Space</p>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <a href="real-estate-detail.html">
                                            <button type="button" class="btn btn-secondary btn-block waves-effect waves-light">View Detail</button></a>
                                    </div>

                                </div>
                            </div>
                            <!-- end. Card actions -->
                        </div>
                        <!-- /inner row -->
                    </div>
                    <!-- End property item -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <div>
                <ul class="pagination pagination-split justify-content-end">
                    <li class="page-item disabled">
                        <a href="#" class="page-link"><i class="fa fa-angle-left"></i></a>
                    </li>
                    <li class="page-item active">
                        <a href="#" class="page-link">1</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">2</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">3</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">4</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">5</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link"><i class="fa fa-angle-right"></i></a>
                    </li>
                </ul>
            </div>

        </div>
        <!-- end container-fluid -->

    </div>
    <!-- end content -->
@endsection
