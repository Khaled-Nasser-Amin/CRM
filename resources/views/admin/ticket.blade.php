@extends('layouts.appLogged')
@section('title','Tracks CRM/INVOICES')
@push('css')
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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tracks</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">CRM</a></li>
                            <li class="breadcrumb-item active">Ticket</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Customer Ticket </h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- Basic Form Wizard -->
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="header-title"></h4>
                    <p class="sub-header">

                    </p>

                    <form id="basic-form" action="#" >
                        <div>
                            <h3>Account</h3>
                            <section>
                                <div class="form-group row ">
                                    <label class="col-lg-2 control-label " for="userName">User name *</label>
                                    <div class="col-lg-10">
                                        <input class="form-control required" id="userName" name="userName" type="text">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 control-label " for="password"> Password *</label>
                                    <div class="col-lg-10">
                                        <input id="password" name="password" type="text" class="required form-control">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 control-label " for="confirm">Confirm Password *</label>
                                    <div class="col-lg-10">
                                        <input id="confirm" name="confirm" type="text" class="required form-control">
                                    </div>
                                </div>

                            </section>
                            <h3>Profile</h3>
                            <section>
                                <div class="form-group row">

                                    <label class="col-lg-2 control-label" for="name"> First name *</label>
                                    <div class="col-lg-10">
                                        <input id="name" name="name" type="text" class="required form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 control-label " for="surname"> Comment *</label>
                                    <div class="col-lg-10">
                                        <input id="surname" name="surname" type="text" class="required form-control">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 control-label " for="email">Email *</label>
                                    <div class="col-lg-10">
                                        <input id="email" name="email" type="text" class="required email form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 control-label " for="address">project *</label>
                                    <div class="col-lg-10">
                                        <input id="address" name="address" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-12 control-label">(*) Mandatory</label>
                                </div>

                            </section>
                            <h3>Hints</h3>
                            <section>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <ul class="list-unstyled w-list">
                                            <li><b>First Name :</b> Ahmed </li>
                                            <li><b>Comment :</b> ......... </li>
                                            <li><b>Emial:</b> tracks@tracks.com</li>
                                            <li><b>Address:</b> 123 Your City, Cityname. </li>
                                        </ul>
                                    </div>
                                </div>
                            </section>
                            <h3>Finish</h3>
                            <section>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <div class="checkbox checkbox-secondary">
                                            <input id="checkbox-h" type="checkbox">
                                            <label for="checkbox-h">
                                                I agree with the Terms and Conditions.
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- End row -->
    </div>
    <!-- End row -->
    <!-- end container-fluid -->
</div>
@endsection
@push('script')

    <script src="{{asset('libs/jquery-steps/jquery.steps.min.js')}}"></script>
    <script src="{{asset('libs/jquery-validation/jquery.validate.min.js')}}"></script>
    <!-- Init js-->
    <script src="{{asset('js/pages/form-wizard.init.js')}}"></script>

@endpush
