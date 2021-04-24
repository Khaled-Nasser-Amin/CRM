@extends('layouts.appLogged')
@section('title','TRACKS/CRM/Tickets')
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
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="header-title">Report  Your problem</h4>

                        <form id="wizard-validation-form" action="{{route('tickets.store')}}" method="post" class="formSteps">
                            @csrf
                            <div>
                                <h3>Account</h3>
                                <section>

                                    <div class="form-group row">
                                        <label class="col-lg-2 control-label " for="email">Email *</label>
                                        <div class="col-lg-10">
                                            <input id="email" name="email" type="text" value="{{auth()->user()->email}}" class="email form-control " disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 control-label " for="password"> Password *</label>
                                        <div class="col-lg-10">
                                            <input id="password" name="password" type="password" class="required form-control" required>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 control-label " for="confirm">Confirm Password *</label>
                                        <div class="col-lg-10">
                                            <input id="confirm" name="password_confirmation" type="password" class="required form-control" required>
                                        </div>
                                    </div>

                                </section>
                                <h3>Profile</h3>
                                <section>
                                    <div class="form-group row">

                                        <label class="col-lg-2 control-label" for="name"> Ticket name *</label>
                                        <div class="col-lg-10">
                                            <input id="name" name="name" type="text" class="required form-control" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 control-label " for="comment"> Comment *</label>
                                        <div class="col-lg-10">
                                            <input id="comment" name="comment" type="text" class="required form-control">

                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-lg-2 control-label " for="project">project *</label>
                                        <div class="col-lg-10">
                                            <input id="project" name="project" type="text" class="form-control" required>
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
                                                <li><b>First Name :</b> <span name="firstName"></span> </li>
                                                <li><b>Comment :</b> <span name="comment"></span> </li>
                                                <li><b>Emial:</b> <span name="email">{{auth()->user()->email}}</span></li>
                                                <li><b>Project:</b> <span name="project"></span> </li>
                                            </ul>
                                        </div>
                                    </div>
                                </section>
                                <h3>Step Final</h3>
                                <section>
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <input id="acceptTerms-2" name="acceptTerms2" type="checkbox" class="required">
                                            <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
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

    </div>
    <!-- end container-fluid -->
@endsection
@push('script')

    <script>
        $('.formSteps').on('change',function(){
            let firstName=$('input[name=name]').val();
            let comment=$('input[name=comment]').val();
            let project=$('input[name=project]').val();
            $('span[name=email]').html('{{auth()->user()->email}}');
            $('span[name=firstName]').html(firstName);
            $('span[name=comment]').html(comment);
            $('span[name=project]').html(project);
        })


    </script>
    <!--Form Wizard-->
    <script src="{{asset('libs/jquery-steps/jquery.steps.min.js')}}"></script>
    <script src="{{asset('libs/jquery-validation/jquery.validate.min.js')}}"></script>

    <!-- Validation init js-->
    <script src="{{asset('js/pages/form-wizard.init.js')}}"></script>

@endpush
