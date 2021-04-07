@extends('layouts.appLogged')
@section('title','TRACKS/CRM/USERS')
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">CRM</a></li>
                                <li class="breadcrumb-item active">USERS</li>
                            </ol>
                        </div>
                        <h4 class="page-title"></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <!-- sample modal content -->
            <div id="con-close-modal-new" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title mt-0">EMPLYEE</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="form-newUser" action="{{route('AddNewUser')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label  class="control-label">Broker</label>
                                        <select class="selectpicker" data-live-search="true"  name="broker" data-style="btn-secondary" required>
                                            <option ></option>
                                        @forelse($employees as $employee)
                                                <option value="{{$employee->id}}" >{{$employee->name}}</option>
                                            @empty
                                                <option value="">No Employees Yet</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-0" class="control-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="field-0" placeholder="at least 8 characters">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Confirm password</label>
                                            <input type="password" name="password_confirmation" class="form-control" id="field-1" placeholder="at least 8 characters">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>User Image</label>
                                        <input type="file"  name="image" class="dropify" data-height="210" />
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                            <button type="button" onclick="document.getElementById('form-newUser').submit()" class="btn btn-info waves-effect waves-light">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
           <!-- Responsive modal -->
            <ul class="row list-unstyled">
                <li class="mr-3 col-md-3 d-noned-sm-block">
                    <button class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal-new">Add New</button>
                </li>

            </ul>

            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="header-title">USERS</h5>
                            <p class="sub-header"></p>
                        <div class="card-box table-responsive">
                            <table id="datatable-responsive" class="table text-center table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Serial</th>
                                        <th>Phone</th>
                                        <th>Auth.</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @forelse($users as $user)
                                    <tr>
                                        <td><img src="{{$user->image}}" class="rounded-circle" style="width: 50px;height: 50px" alt="user-image"></td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->serial}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>********</td>
                                        <td>{{$user->email}}</td>
                                        <td class="row justify-content-center">
                                            <button class="btn btn-primary waves-effect waves-light mr-2" data-toggle="modal" data-target="#con-close-modal-edit-{{$user->id}}">Edit</button>
                                            <a href="{{route('deleteUser',$user->id)}}" class="btn btn-danger waves-effect waves-light DeleteButton" >Delete</a>
                                        </td>
                                    </tr>
                                    <div id="con-close-modal-edit-{{$user->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title mt-0">EMPLYEE</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <form method="post" enctype="multipart/form-data" id="form-editUser-{{$user->id}}" action="{{route('EditUser',$user->id)}}">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="field-3" class="control-label">Password</label>
                                                                        <input type="password" name="password" class="form-control" id="field-3" placeholder="at least 8 characters">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="field-2" class="control-label">Confirm password</label>
                                                                        <input type="password" name="password_confirmation" class="form-control" id="field-2" placeholder="at least 8 characters">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>User Image</label>
                                                                    <input type="file"  name="image" alt="userImage">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="button" onclick="document.getElementById('form-editUser-{{$user->id}}').submit()" class="btn btn-info waves-effect waves-light">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @empty
                                        <tr>
                                            <p>There is no any users yet</p>

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

<!-- end container-fluid -->

<!-- end content -->
    </div>
@endsection
@push('script')
    <script src="{{asset('libs/dropify/dropify.min.js')}}"></script>
    <script src="{{asset('js/pages/property-add.init.js')}}"></script>


@endpush
