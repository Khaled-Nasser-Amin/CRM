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
                <div class="col-sm-12 ">
                    <form class="row justify-content-center" method="get" action="{{route('properties')}}">
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Location</label>
                                <input type="text" class="form-control" id="field-1" name="location" placeholder="Haram" value="{{request()->query('location')}}">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Price</label>
                                <input type="text" class="form-control" id="field-2" name="price" placeholder="1200 L.E" value="{{request()->query('price')}}">
                            </div>
                        </div>

                        @if (auth()->user()->role != 1)
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="field-3" class="control-label">Filter</label>
                                    <select id="field-3" class="selectpicker show-tick" name="filter" data-style="btn-secondary">
                                        <option value="All Properties" {{request()->query('filter') == 'All Properties' ? 'selected' : ''}}>All Properties</option>
                                        <option value="My Properties" {{request()->query('filter') == 'My Properties' ? 'selected' : ''}}>My Properties</option>
                                    </select>
                                </div>
                            </div>
                        @endif
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
                        <div class="property-image" style="background: url('{{asset('images/properties/'.$property->images->first()->name)}}') center center / cover no-repeat;">
                            <span class="property-label badge badge-warning">{{ucfirst($property->type)}}</span>
                        </div>

                        <div class="property-content card-body">
                            <div class="listingInfo">
                                <div class="">
                                    <h5 class="text-secondary font-18 mt-0">{{$property->price}} L.E</h5>
                                </div>
                                <div class="">
                                    <h4 class="text-overflow">{{ucfirst($property->name)}}</h4>
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

                                    <div class="mt-3 row justify-content-between">
                                        <a href="{{route('showProperty',$property->id)}}">
                                            <button type="button" class="btn btn-secondary btn-sm btn-block waves-effect waves-light">View Detail</button>
                                        </a>
                                        @can('update',$property)
                                            <a href="{{route('editProperty',$property->id)}}">
                                            <button type="button" class="btn btn-primary btn-sm btn-block waves-effect waves-light">Edit Property</button>
                                        </a>
                                        @endcan
                                        @can('delete',$property)
                                            <a href="{{route('deleteProperty',$property->id)}}" class="DeleteButton">
                                                <button type="button" class="btn btn-danger btn-sm btn-block waves-effect waves-light">Delete Property</button>
                                            </a>
                                        @endcan

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
                        <h3>No Properties </h3>
                    </div>
                @endforelse
                <!-- end col -->
            </div>
            <!-- end row -->

            <div class="customPagination">
                {{$properties->appends(request()->query())->links()}}
            </div>

        </div>
        <!-- end container-fluid -->

    </div>
    <!-- end content -->
@endsection
