@extends('layouts.appLogged')
@section('title','Add Property')
@push('css')
    <link href="{{asset('libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />
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

                        <form action="{{route('store',auth()->user()->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="p-4">
                                        <div class="form-group">
                                            <label for="propertyname">Property Name</label>
                                            <input type="text" class="form-control" id="propertyname" name="name" placeholder="Enter title">
                                        </div>
                                        <div class="form-group">
                                            <label for="property-location">Location</label>
                                            <input type="text" class="form-control" id="property-location" name="location" placeholder="Enter location">
                                        </div>
                                        <div class="form-group">
                                            <label for="property-desc">Description</label>
                                            <textarea class="form-control" id="property-desc" name="description" rows="5"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-2">Property Type</label>
                                            <br/>
                                            <div class="radio radio-info form-check-inline">
                                                <input type="radio" id="inlineRadio1" value="for rent" name="type" checked>
                                                <label for="inlineRadio1"> For Rent </label>
                                            </div>
                                            <div class="radio radio-info form-check-inline">
                                                <input type="radio" id="inlineRadio2" value="for sale" name="type">
                                                <label for="inlineRadio2"> For Sale </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="property-price">Price / Rent</label>
                                            <input type="text" class="form-control" id="property-price" name="price" placeholder="Enter number">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-4 mb-2">
                                                    <label for="bedrooms">Bedrooms</label>
                                                    <input type="text" class="form-control" name="bedrooms" id="bedrooms">
                                                </div>
                                                <div class="col-sm-4 mb-2">
                                                    <label for="Square-ft">Square ft </label>
                                                    <input type="text" class="form-control" name="square" id="Square-ft">
                                                </div>
                                                <div class="col-sm-4 mb-2">
                                                    <label for="car-parking">Car Parking</label>
                                                    <input type="text" class="form-control" name="carParking" id="car-parking">
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
                                            <label class="mb-3">Select Project</label>
                                            <select class="selectpicker show-tick" id="selectProject" name="project" data-style="btn-secondary">
                                                <option value=""></option>
                                                @forelse($projects as $project)
                                                    <option value="{{$project->id}}">{{$project->name}}</option>
                                                @empty
                                                    <option value="">No Projects Yet</option>
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="mb-3">General Amenities</label>
                                            <div class="row">
                                                <div class="col-12 row amenities">
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end row -->
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>File Uploads</label>
                                            <input type="file"  name="images[]" multiple class="dropify" data-height="210" />

                                        </div>
                                    </div>
                                    <!-- end class p-20 -->
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
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
@push('script')
    <script src="{{asset('libs/dropify/dropify.min.js')}}"></script>
    <script src="{{asset('js/pages/property-add.init.js')}}"></script>
    <script>
        $('#selectProject').on('change',function (){
            let id=$(this).val();
            let url="showProject/"+id;
            console.log('done');
            $.ajax({
                'method':'get',
                url,
                success:function (result){
                    console.log();
                    $('.amenities').empty();
                    for (i=0 ; i < result.length ; i++) {
                        $('.amenities').append('<div class="checkbox col-6 w-50 checkbox-secondary mb-3">'+
                            '<input id="checkbox'+i+'" name="amenities[]" type="checkbox" value="'+result[i].id+'">'+
                            '<label for="checkbox'+i+'" class="mb-0">' + result[i].name + '</label></div>');
                    }
                }
            });

        });
    </script>
@endpush
