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
                @forelse($properties as $property)
                    <div class="col-lg-4 col-sm-6">
                    <div class="property-card card">
                        <div class="property-image" style="background: url('{{asset('properties images/'.$property->image)}}') center center / cover no-repeat;">
                            <span class="property-label badge badge-warning">For Rent</span>
                        </div>

                        <div class="property-content card-body">
                            <div class="listingInfo">
                                <div class="">
                                    <h5 class="text-secondary font-18 mt-0">{{$property->price}} L.E</h5>
                                </div>
                                <div class="">
                                    <h4 class="text-overflow">{{ucfirst($property->type)}}</h4>
                                    <p class="text-muted text-overflow"><i class="mdi mdi-map-marker-radius mr-1"></i>{{$property->location}}</p>

                                    <div class="row text-center">
                                        <div class="col-4">
                                            <h4>{{$property->square}}</h4>
                                            <p class="text-overflow" title="Square Feet">Square Feet</p>
                                        </div>
                                        <div class="col-4">
                                            <h4>{{$property->bedrooms}}</h4>
                                            <p class="text-overflow" title="Bedrooms">Bedrooms</p>
                                        </div>
                                        <div class="col-4">
                                            <h4>{{$property->carParking}}</h4>
                                            <p class="text-overflow" title="Parking Space">Parking Space</p>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <a href="{{route('showProperty',$property->id)}}">
                                            <button type="button" class="btn btn-secondary btn-block waves-effect waves-light">View Detail</button>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- end. Card actions -->
                        </div>
                        <!-- /inner row -->
                    </div>
                    <!-- End property item -->
                </div>
                @empty
                    <div class="col-12 justify-content-center">
                        <h3>No Properties Added</h3>
                    </div>
                @endforelse
                <!-- end col -->
            </div>
            <!-- end row -->

            <div class="customPagination">
                {{$properties->links()}}
            </div>

        </div>
        <!-- end container-fluid -->

    </div>
    <!-- end content -->
@endsection
