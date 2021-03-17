@extends('layouts.appLogged')
@section('title','Add Property')
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Real Estate </a></li>
                                <li class="breadcrumb-item active">Add / Edit Property</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add / Edit Property</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="header-title mt-0">Fill in the Form</h4>

                        <form>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="p-4">
                                        <div class="form-group">
                                            <label for="propertyname">Property Name</label>
                                            <input type="text" class="form-control" id="propertyname" placeholder="Enter title">
                                        </div>
                                        <div class="form-group">
                                            <label for="property-location">Location</label>
                                            <input type="text" class="form-control" id="property-location" placeholder="Enter location">
                                        </div>
                                        <div class="form-group">
                                            <label for="property-desc">Description</label>
                                            <textarea class="form-control" id="property-desc" rows="5"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-2">Property Type</label>
                                            <br/>
                                            <div class="radio radio-info form-check-inline">
                                                <input type="radio" id="inlineRadio1" value="option1" name="radioInline" checked>
                                                <label for="inlineRadio1"> For Rent </label>
                                            </div>
                                            <div class="radio radio-info form-check-inline">
                                                <input type="radio" id="inlineRadio2" value="option2" name="radioInline">
                                                <label for="inlineRadio2"> For Sale </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="property-price">Price / Rent</label>
                                            <input type="text" class="form-control" id="property-price" placeholder="Enter number">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-4 mb-2">
                                                    <label for="bedrooms">Bedrooms</label>
                                                    <input type="text" class="form-control" id="bedrooms">
                                                </div>
                                                <div class="col-sm-4 mb-2">
                                                    <label for="Square-ft">Square ft </label>
                                                    <input type="text" class="form-control" id="Square-ft">
                                                </div>
                                                <div class="col-sm-4 mb-2">
                                                    <label for="car-parking">Car Parking</label>
                                                    <input type="text" class="form-control" id="car-parking">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end class p-20 -->

                                </div>
                                <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="p-4">
                                        <div class="form-group mb-4">
                                            <label class="mb-3">General Amenities</label>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="checkbox checkbox-secondary mb-3">
                                                        <input id="checkbox1" type="checkbox" checked>
                                                        <label for="checkbox1" class="mb-0">
                                                            Swimming pool
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-secondary mb-3">
                                                        <input id="checkbox2" type="checkbox">
                                                        <label for="checkbox2" class="mb-0">
                                                            Terrace
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-secondary mb-3">
                                                        <input id="checkbox3" type="checkbox">
                                                        <label for="checkbox3" class="mb-0">
                                                            Air conditioning
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-secondary mb-3">
                                                        <input id="checkbox4" type="checkbox" checked>
                                                        <label for="checkbox4" class="mb-0">
                                                            Internet
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-secondary mb-3">
                                                        <input id="checkbox5" type="checkbox">
                                                        <label for="checkbox5" class="mb-0">
                                                            Balcony
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-secondary mb-3">
                                                        <input id="checkbox6" type="checkbox" checked>
                                                        <label for="checkbox6" class="mb-0">
                                                            Cable TV
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-secondary mb-3">
                                                        <input id="checkbox7" type="checkbox" checked>
                                                        <label for="checkbox7" class="mb-0">
                                                            Computer
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-secondary mb-3">
                                                        <input id="checkbox9" type="checkbox">
                                                        <label for="checkbox9" class="mb-0">
                                                            Dishwasher
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-secondary mb-3">
                                                        <input id="checkbox10" type="checkbox">
                                                        <label for="checkbox10" class="mb-0">
                                                            Near Green Zone
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-secondary mb-3">
                                                        <input id="checkbox11" type="checkbox" checked>
                                                        <label for="checkbox11" class="mb-0">
                                                            Near Church
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-secondary mb-3">
                                                        <input id="checkbox12" type="checkbox">
                                                        <label for="checkbox12" class="mb-0">
                                                            Near Hospital
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-secondary mb-3">
                                                        <input id="checkbox13" type="checkbox" checked>
                                                        <label for="checkbox13" class="mb-0">
                                                            Near School
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-secondary mb-3">
                                                        <input id="checkbox14" type="checkbox" checked>
                                                        <label for="checkbox14" class="mb-0">
                                                            Near Shop
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-secondary mb-3">
                                                        <input id="checkbox15" type="checkbox" checked>
                                                        <label for="checkbox15" class="mb-0">
                                                            Oven
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-secondary mb-3">
                                                        <input id="checkbox16" type="checkbox">
                                                        <label for="checkbox16" class="mb-0">
                                                            Cofee pot
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox-secondary mb-3">
                                                        <input id="checkbox8" type="checkbox">
                                                        <label for="checkbox8" class="mb-0">
                                                            Grill
                                                        </label>
                                                    </div>
                                                </div>
                                                <!-- end col -->


                                            </div>
                                            <!-- end row -->
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>File Uploads</label>
                                            <input type="file" class="dropify" data-height="210" />

                                        </div>
                                    </div>
                                    <!-- end class p-20 -->
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                <button type="button" class="btn btn-danger waves-effect waves-light">Delete</button>
                            </div>
                        </form>
                        <!-- end form -->

                    </div>
                    <!-- end card-box -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <!-- end container-fluid -->

    </div>
    <!-- end content -->
@endsection
