@extends('layouts.appLogged')
@section('title','TRACKS/CRM/Invoices')
@push('css')
    <link href="{{asset('libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('libs/bootstrap-timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link href="{{asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/custombox/custombox.min.css')}}" rel="stylesheet" type="text/css">

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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">INVOICES </a></li>
                                <li class="breadcrumb-item active">NEW INVOICE</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Invoice</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!-- <div class="panel-heading">
                                <h4>Invoice</h4>
                            </div> -->
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <h4 class="header-title"></h4>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <form class="form-horizontal">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 control-label">Customer</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" value="Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 control-label" for="example-email">Invoice Serial</label>
                                                        <div class="col-md-10">
                                                            <input type="email" id="example-email" name="example-email" class="form-control" placeholder="SERIAL">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Date Range</label>
                                                        <div>
                                                            <div class="input-daterange input-group" id="date-range">
                                                                <input type="text" class="form-control" name="start" />
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text bg-secondary text-white b-0">to</span>
                                                                </div>

                                                                <input type="text" class="form-control" name="end" />
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-md-3control-label">Employee</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" placeholder="Employee">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-2 control-label">notes</label>
                                                        <div class="col-md-10">
                                                            <textarea class="form-control" rows="5"></textarea>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>

                                            <div class="col-lg-6">
                                                <form class="form-horizontal">

                                                    <div class="form-group row">
                                                        <label class="col-md-3 control-label">CURRENCY</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" readonly="" value="L.E">
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-sm-3 control-label">Payment Method</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control">
                                                                <option>cash</option>
                                                                <option>Bank</option>
                                                                <option>Credit</option>

                                                            </select>
                                                            <div class="col-sm-10">

                                                                <h5 class="font-13">Invoice Select</h5>
                                                                <select multiple="" class="form-control">
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                        <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table mt-4">
                                                        <thead>
                                                        <tr>

                                                            <th>Item </th>
                                                            <th>Description</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>

                                                            <td>
                                                                <input type="text" class="form-control" placeholder="Item">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="Description">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="Quantity">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="Cost">
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table mt-4">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Item</th>
                                                        <th>Description</th>
                                                        <th>Quantity</th>
                                                        <th>Unit Cost</th>
                                                        <th>Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Apartment</td>
                                                        <td>Lorem ipsum dolor sit amet.</td>
                                                        <td>1</td>
                                                        <td>$380</td>
                                                        <td>$380</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Mobile</td>
                                                        <td>Lorem ipsum dolor sit amet.</td>
                                                        <td>5</td>
                                                        <td>$50</td>
                                                        <td>$250</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>LED</td>
                                                        <td>Lorem ipsum dolor sit amet.</td>
                                                        <td>2</td>
                                                        <td>$500</td>
                                                        <td>$1000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>LCD</td>
                                                        <td>Lorem ipsum dolor sit amet.</td>
                                                        <td>3</td>
                                                        <td>$300</td>
                                                        <td>$900</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>Mobile</td>
                                                        <td>Lorem ipsum dolor sit amet.</td>
                                                        <td>5</td>
                                                        <td>$80</td>
                                                        <td>$400</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="clearfix mt-4">
                                                <h5 class="small text-dark">PAYMENT TERMS AND POLICIES</h5>

                                                <small>

                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="text-right"><b>Sub-total:</b> 2930.00</p>
                                            <p class="text-right">Discout: 12.9%</p>
                                            <p class="text-right">VAT: 12.9%</p>
                                            <hr>
                                            <h3 class="text-right">USD 2930.00</h3>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="hidden-print">
                                        <div class="float-right d-print-none">
                                            <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                                            <a href="#" class="btn btn-secondary waves-effect waves-light">Submit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- end row -->

                </div>
                <!-- end container-fluid -->

            </div>
        </div>
    </div>

@endsection
@push('script')
                <script src="{{asset('libs/moment/moment.min.js')}}"></script>
                <script src="{{asset('libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
                <script src="{{asset('libs/bootstrap-timepicker/bootstrap-timepicker.min.js')}}"></script>
                <script src="{{asset('libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
                <script src="{{asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
                <script src="{{asset('libs/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

                <!-- Init js-->
                <script src="{{asset('js/pages/form-pickers.init.js')}}"></script>
                <script src="{{asset('libs/custombox/custombox.min.js')}}"></script>
@endpush
