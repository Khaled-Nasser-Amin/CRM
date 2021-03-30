@extends('layouts.appLogged')
@section('title','Property Details')
@push('css')
    <link href="{{asset('libs/bxslider/jquery.bxslider.min.css')}}" rel="stylesheet" type="text/css" />
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Track</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">CRM </a></li>
                                <li class="breadcrumb-item active">Property Detail</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Property Detail</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="property-detail-wrapper">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="">
                            <ul class="bxslider property-slider">
                                @foreach($property->images as $image)
                                    <li><img src="{{asset('images/properties/'.$image->name)}}" alt="slide-image" /></li>
                                @endforeach
                            </ul>

                            <div id="bx-pager" class="text-center hide-phone">
                                @foreach($property->images as $image)
                                    <a data-slide-index="{{$loop->index}}" href=""><img src="{{asset('images/properties/'.$image->name)}}" alt="slide-image" height="70" /></a>
                                @endforeach
                            </div>
                        </div>
                        <!-- end slider -->

                        <div class="mt-4">
                            <h4>{{$property->name}}</h4>
                            <p class="text-muted text-overflow"><i class="mdi mdi-map-marker-radius mr-2"></i>{{$property->location}}</p>
                            <h4 class="mt-4 mb-3">Description</h4>
                            <p class="text-muted text-overflow">{{$property->description}}</p>

                            <h4 class="mt-4 mb-3">General Amenities</h4>
                            <div class="row">
                                <ul class="list-unstyled proprerty-features row justify-content-between w-100">
                                    @foreach($property->amenities as $amenity)
                                    <li class="col-4"><i class="mdi mdi-check-circle-outline text-success mr-1"></i> {{$amenity->name}}</li>
                                    @endforeach
                                </ul>
                                <!--- end col -->
                            </div>
                            <!-- end row -->




                            <h4 class="mt-4 mb-3">Location</h4>

                            <div class="card-box">
                                <div id="map-property"></div>
                            </div>

                        </div>
                        <!-- end m-t-30 -->

                    </div>
                    <!-- end col -->

                    <div class="col-lg-4">
                        <div class="text-center card-box">
                            <div class="text-left">
                                <h4 class="header-title mb-4">Sales</h4>
                            </div>
                            <div class="member-card">
                                <div class="avatar-xl member-thumb mb-2 mx-auto d-block">
                                    <img src="{{asset('images/users/avatar-4.jpg')}}" class="rounded-circle img-thumbnail" alt="profile-image">
                                    <i class="mdi mdi-star-circle member-star text-success" title="Featured Agent"></i>
                                </div>

                                <div class="">
                                    <h5 class="font-18 mb-1">{{$user->name}}</h5>
                                </div>

                                <div class="mt-20">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <h4>{{$user->leads->count()}}</h4>
                                            <p>Client</p>
                                        </li>

                                        <li class="list-inline-item ml-3">
                                            <h4>{{$user->properties->count()}}</h4>
                                            <p>Sale Properties</p>
                                        </li>
                                    </ul>
                                </div>

                                <button type="button" class="btn btn-brown btn-rounded waves-effect mb-3 waves-light">Send Message</button>

                            </div>
                            <!-- end membar card -->
                        </div>
                        <!-- end card-box -->

                        <div class="card-box">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <tbody>
                                    <tr>
                                        <th scope="row">Price:</th>
                                        <td>{{$property->price}} L.E</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Contract type: </th>
                                        <td><span class="label label-danger">{{$property->type}}</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Bedrooms:</th>
                                        <td>{{$property->bedrooms}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Square ft:</th>
                                        <td>{{$property->square}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Garage Spaces:</th>
                                        <td>{{$property->carParking}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Available:</th>
                                        <td>Immediately</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end card-box -->

                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end property-detail-wrapper -->

        </div>
        <!-- end container-fluid -->

    </div>
    <!-- end content -->


@endsection
@push('script')
    <script src="{{asset('libs/bxslider/jquery.bxslider.min.js')}}"></script>
    <script src="{{asset('js/pages/bxslider.init.js')}}"></script>
    <!-- google maps api -->
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="{{asset('libs/gmaps/gmaps.min.js')}}"></script>
@endpush
