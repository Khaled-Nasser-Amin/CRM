@extends('layouts.appLogged')
@section('title','TRACKS/CRM/PROJECTS&DEVELOPERS')
@push('css')
    <link href="{{asset('libs/multiselect/multi-select.css')}}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">


            <!-- start developers-->
            <div class="row">
                <div class="col-6">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Developers</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- sample modal content -->
                    <div id="newDeveloper" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title mt-0">Developers</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" id="form-newDeveloper" action="{{route('developers.store')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label  class="control-label">Developer Name</label>
                                                    <input type="text" name="name" class="form-control"  placeholder="NAME">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                    <button type="button" onclick="document.getElementById('form-newDeveloper').submit()" class="btn btn-info waves-effect waves-light">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Responsive modal -->
                    <ul class="row list-unstyled">
                        <li class="mr-3 col-md-6 d-noned-sm-block">
                            <button class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#newDeveloper">Add New Developer</button>
                        </li>
                    </ul>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="header-title">DEVELOPERS</h5>
                                    <p class="sub-header"></p>
                                    <div class="card-box table-responsive">
                                        <table id="datatable-responsive" class="table text-center table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>projects</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @forelse($developers as $developer)
                                                <tr>
                                                    <td>{{$developer->name}}</td>
                                                    <td>{{$developer->projects->count()}}</td>
                                                    <td class="row justify-content-center">
                                                        <button class="btn btn-primary waves-effect waves-light mr-2 btn-sm" data-toggle="modal" data-target="#edit-developer-{{$developer->id}}">Edit</button>
                                                        <a href="{{route('deleteDeveloper',$developer->id)}}"   class="btn btn-danger waves-effect waves-light btn-sm DeleteButton" >Delete</a>
                                                    </td>

                                                </tr>

                                                <div id="edit-developer-{{$developer->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title mt-0">DEVELOPER</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <form method="post" id="update-developer-{{$developer->id}}" action="{{route('developers.update',$developer->id)}}">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label  class="control-label">Developer Name</label>
                                                                                <input type="text" name="name" class="form-control"  value="{{$developer->name}}">
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                                <button type="button" onclick="document.getElementById('update-developer-{{$developer->id}}').submit()" class="btn btn-info waves-effect waves-light">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <tr><p>There is no any developers yet</p></tr>
                                            @endforelse
                                            </tbody>
                                        </table>

                                    </div>
                                    <!-- end .table-responsive-->
                                </div>

                                <!-- end card-body -->
                            </div>
                            <!-- end card -->
                        </div>
                    </div>
                    <!-- end col -->
                </div>


                <div class="col-6">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Amenities</h4>
                            </div>
                        </div>
                    </div>
                    <div id="newAmenity" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title mt-0">Add New Amenity</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('amenities.store')}}" method="post" id="addNewAmenity">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"> AMINITIES Name</label>
                                                <input type="text" name="name" class="form-control w-100"  placeholder="NAME">
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-info waves-effect waves-light" onclick="$('#addNewAmenity').submit()">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="row list-unstyled">
                        <li class="mr-3 col-md-6 d-noned-sm-block">
                            <button class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#newAmenity">Add New Amenity</button>
                        </li>
                    </ul>
                    <div class="row">
                        <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="header-title">AMENITIES</h5>
                                <p class="sub-header"></p>
                                <div class="card-box table-responsive">
                                    <table id="datatable-responsive" class="table text-center table-striped table-bordered dt-responsive nowrap custonName" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @forelse($amenities as $amenity)
                                            <tr>
                                            <td>{{$amenity->name}}</td>
                                            <td class="row justify-content-center">
                                                <button class="btn btn-primary waves-effect waves-light mr-2 btn-sm" data-toggle="modal" data-target="#edit-amenity-{{$amenity->id}}">Edit</button>
                                                <a href="{{route('deleteAmenity',$amenity->id)}}"  class="btn btn-danger waves-effect waves-light btn-sm DeleteButton" >Delete</a>
                                            </td>
                                        </tr>
                                            <div id="edit-amenity-{{$amenity->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title mt-0">Update Amenity</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('amenities.update',$amenity->id)}}" method="post" id="updateAmenity-{{$amenity->id}}">
                                                                @csrf
                                                                @method('put')
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label"> AMINITIES Name</label>
                                                                        <input type="text" name="name" class="form-control w-100"  value="{{$amenity->name}}">
                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-info waves-effect waves-light" onclick="$('#updateAmenity-{{$amenity->id}}').submit()">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @empty
                                            <tr>No Amenities Added</tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end .table-responsive-->
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                    </div>
                </div>
                <!-- end container-fluid -->

            </div>


            <div>
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Projects</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <!-- sample modal content -->


                <div id="newProject" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title mt-0">Projects</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" id="AddNewProject" action="{{route('projects.store')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label  class="control-label">Project Name</label>
                                                <input type="text" name="name" class="form-control"  placeholder="NAME">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label  class="control-label">Developer</label>
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
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row flex-column justify-content-center align-items-center">
                                                <label  class="control-label">Amenities</label>

                                                <select name="amenities[]" class="multi-select" multiple="multiple"  id="my_multi_select" >

                                                    @forelse($amenities as $amenity)
                                                        <option value="{{$amenity->id}}">{{$amenity->name}}</option>
                                                    @empty
                                                        <p class="text-muted">No amenities added</p>
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" onclick="document.getElementById('AddNewProject').submit()" class="btn btn-info waves-effect waves-light">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>



                <ul class="row list-unstyled">
                    <li class="mr-3 col-md-3 d-noned-sm-block">
                        <button class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#newProject">Add New Project</button>
                    </li>
                </ul>






                <!-- Responsive modal -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="header-title">Projects</h5>
                                <p class="sub-header"></p>
                                <div class="card-box table-responsive">
                                    <table id="datatable-responsive" class="table text-center table-striped table-bordered dt-responsive nowrap custonName" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Developer Name</th>
                                            <th>Amenities</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @forelse($projects as $project)
                                            <tr>
                                                <td>{{$project->name}}</td>
                                                <td>{{$project->developer->name ?? ''}}</td>
                                                <td>{{$project->amenities->count()}}</td>
                                                <td class="row justify-content-center"><button class="btn btn-primary waves-effect waves-light mr-2" data-toggle="modal" data-target="#edit-project-{{$project->id}}">Edit</button>
                                                    <a href="{{route('deleteProject',$project->id)}}" class="btn btn-danger waves-effect waves-light DeleteButton" >Delete</a>
                                                </td>
                                            </tr>
                                            <div id="edit-project-{{$project->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title mt-0">PROJECT</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <form method="post" id="Update-project-{{$project->id}}" action="{{route('projects.update',$project->id)}}">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="row w-100">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label  class="control-label">Project Name</label>
                                                                                <input type="text" name="name" class="form-control"  value="{{$project->name}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label  class="control-label">Developer</label>
                                                                                <select class="form-control" data-live-search="true"  name="developer" data-style="btn-secondary">
                                                                                    @forelse($developers as $developer)
                                                                                        <option value="{{$developer->id}}" {{$project->id == $developer->id ? 'selected':''}}>{{$developer->name}}</option>
                                                                                    @empty
                                                                                        <option value="">No Developer Yet</option>
                                                                                    @endforelse
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row w-100" >
                                                                        <div class="col-12">
                                                                            <div class="form-group w-100 row flex-column justify-content-center align-items-center">
                                                                                <label class="control-label">Amenities</label>
                                                                                <select name="amenities[]" class="multi-select w-100"  multiple="multiple"  id="my_multi_select1"  data-plugin="multiselect">
                                                                                    @forelse($amenities as $amenity)
                                                                                        <option value="{{$amenity->id}}" {{in_array($amenity->id,$project->amenities->pluck('id')->toArray()) ? 'selected':''}}>{{$amenity->name}}</option>
                                                                                    @empty
                                                                                        <p class="text-muted">No amenities added</p>
                                                                                    @endforelse
                                                                                </select>

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </form>

                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                            <button type="button" onclick="document.getElementById('Update-project-{{$project->id}}').submit()" class="btn btn-info waves-effect waves-light">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <tr>
                                                <p>There is no any projects yet</p>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end .table-responsive-->
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <!-- end col -->
            </div>




        </div>
    </div>
@endsection

@push('script')
    <script>
        $('table.custonName').DataTable();
        $('#ms-my_multi_select1').addClass('w-75')
        $('.ms-container').addClass('w-75')
    </script>
    <script src="{{asset('libs/multiselect/jquery.multi-select.js')}}"></script>
    <script src="{{asset('libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
    <script src="{{asset('js/pages/form-advanced.init.js')}}"></script>

@endpush
