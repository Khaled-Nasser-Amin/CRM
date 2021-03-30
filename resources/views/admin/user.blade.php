@extends('layouts.appLogged')
@section('title','TRACKS/CRM/USERS')
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
                            <form method="post" id="form-newUser" action="{{route('AddNewUser')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Name</label>
                                            <input type="text" name="name" class="form-control" id="field-1" placeholder="NAME">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-2" class="control-label">Phone</label>
                                            <input type="text" name="phone" class="form-control" id="field-2" placeholder="Phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Serial</label>
                                            <input type="text" name="serial" class="form-control" id="field-1" placeholder="002020">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-2" class="control-label">Authontication</label>
                                            <input type="password" name="password" class="form-control" id="field-2" placeholder="****">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Email</label>
                                            <input type="text" name="email" class="form-control" id="field-1" placeholder="tracks@tracks.com">
                                        </div>
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
                <li class="col-md-3 d-none d-sm-block">
                    <form class="app-search" method="get" action="{{route('ViewUser')}}">
                        <div class="app-search-box">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{request()->query('search')}}">
                                <div class="input-group-append">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>

            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="header-title">USERS</h5>
                            <p class="sub-header"></p>
                        <div class="card-box table-responsive">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
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
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->serial}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>********</td>
                                        <td>{{$user->email}}</td>
                                        <td class="row"><button class="btn btn-primary waves-effect waves-light mr-2" data-toggle="modal" data-target="#con-close-modal-edit-{{$user->id}}">Edit</button><a href="{{route('deleteUser',$user->id)}}" class="btn btn-danger waves-effect waves-light" >Delete</a></td>
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
                                                        <form method="post" id="form-editUser-{{$user->id}}" action="{{route('EditUser',$user->id)}}">
                                                            @csrf
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="field-1" class="control-label">Name</label>
                                                                    <input type="text" name="name" class="form-control" id="field-1" value="{{$user->name}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="field-2" class="control-label">Phone</label>
                                                                    <input type="text" name="phone" class="form-control" id="field-2" value="{{$user->phone}}">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="field-1" class="control-label">Serial</label>
                                                                        <input type="text" name="serial" class="form-control" id="field-1" value="{{$user->serial}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="field-2" class="control-label">Authontication</label>
                                                                        <input type="password" name="password" class="form-control" id="field-2" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="field-1" class="control-label">Email</label>
                                                                        <input type="text" name="email" class="form-control" id="field-1" value="{{$user->email}}">
                                                                    </div>
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
