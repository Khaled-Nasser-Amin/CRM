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
                                    <form class="" method="post" action="{{route('Invoices.store')}}">
                                        @csrf
                                        <div class="card-box">
                                            <h4 class="header-title"></h4>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label  class="control-label">Lead</label>
                                                        <select class="selectpicker" data-live-search="true"  name="lead" data-style="btn-secondary" required>
                                                            @forelse($leads as $lead)
                                                                <option value="{{$lead->id}}" >{{$lead->name}}</option>
                                                            @empty
                                                                <option value="">No Leads Yet</option>
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="control-label" for="serial">Invoice Serial</label>
                                                        <div class="col-12">
                                                            <input type="text" id="serial" name="invoiceSerial" class="form-control" placeholder="SERIAL" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Date Range</label>
                                                        <div>
                                                            <div class="input-daterange input-group" id="date-range">
                                                                <input type="text" class="form-control" name="start" required />
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text bg-secondary text-white b-0">to</span>
                                                                </div>

                                                                <input type="text" class="form-control" name="end" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="control-label">Broker</label>
                                                        <select class="selectpicker" data-live-search="true"  name="broker" data-style="btn-secondary">
                                                            @forelse($users as $user)
                                                                <option value="{{$user->id}}" >{{$user->name}}</option>
                                                            @empty
                                                                <option value="">No Leads Yet</option>
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">

                                                    <div class="form-group ">
                                                        <label class=" control-label">CURRENCY</label>
                                                        <div class="col-12">
                                                            <input type="text" class="form-control" readonly="" value="L.E" required>
                                                        </div>
                                                    </div>


                                                    <div class="form-group ">
                                                        <label class=" control-label">Payment Method</label>
                                                        <select class="form-control" name="paymentMethodology" required>
                                                            <option value="Cash">Cash</option>
                                                            <option value="Bank">Bank</option>
                                                            <option value="Credit">Credit</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class=" control-label">notes</label>
                                                        <textarea class="form-control w-100" name="notes" required></textarea>
                                                    </div>
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
                                                                    <input type="text" class="form-control" placeholder="Item" name="propertyName" required>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" placeholder="Description" name="description" required>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" placeholder="Quantity" name="quantity" required>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" placeholder="Cost" name="cost" required>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-secondary waves-effect waves-light float-right">Submit</button>
                                        </div>
                                    </form>
                                    <div id="printDiv">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card-box table-responsive">
                                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                        <tr>
                                                            <th>Item</th>
                                                            <th>Description</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>
                                                            <th>Total</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse($invoices as $invoice)
                                                            <tr>
                                                                <td>{{$invoice->propertyName}}</td>
                                                                <td>{{$invoice->description}}</td>
                                                                <td>{{$invoice->quantity}}</td>
                                                                <td>{{$invoice->cost}}</td>
                                                                <td>{{$invoice->total}}</td>
                                                                <td class="row">
                                                                    <button class="btn btn-primary waves-effect waves-light mr-2" data-toggle="modal" data-target="#edit-invoice-{{$invoice->id}}">Edit</button>
                                                                    <button type="button" onclick="document.getElementById('deleteInvoice-{{$invoice->id}}').submit()"  class="btn btn-danger waves-effect waves-light" >Delete</button>
                                                                    <form method="post" action="{{route('Invoices.destroy',$invoice->id)}}" id="deleteInvoice-{{$invoice->id}}">
                                                                        @csrf
                                                                        @method('delete')
                                                                    </form>
                                                                </td>
                                                            </tr>

                                                            <div id="edit-invoice-{{$invoice->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title mt-0">Invoice</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form id="update-invoice-{{$invoice->id}}" method="post" action="{{route('Invoices.update',$invoice->id)}}">
                                                                                @csrf
                                                                                @method('put')
                                                                                    <div class="">
                                                                                        <div class="form-group">
                                                                                            <label  class="control-label">Lead</label>
                                                                                            <select class="form-control" data-live-search="true"  name="lead" data-style="btn-secondary" required>
                                                                                                @forelse($leads as $lead)
                                                                                                    <option value="{{$lead->id}}" {{$lead->id == $invoice->lead->id ? 'selected':''}}>{{$lead->name}}</option>
                                                                                                @empty
                                                                                                    <option value="">No Leads Yet</option>
                                                                                                @endforelse
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="control-label" for="serial">Invoice Serial</label>
                                                                                            <div class="col-12">
                                                                                                <input type="text" id="serial" name="invoiceSerial" class="form-control" value="{{$invoice->invoiceSerial}}" required>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label>Date Range</label>
                                                                                            <div>
                                                                                                <div class="input-daterange input-group" id="date-range">
                                                                                                    <input type="text" class="form-control" name="start" value="{{$invoice->start}}" required/>
                                                                                                    <div class="input-group-append">
                                                                                                        <span class="input-group-text bg-secondary text-white b-0">to</span>
                                                                                                    </div>

                                                                                                    <input type="text" class="form-control" name="end" value="{{$invoice->end}}" required/>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label  class="control-label">Broker</label>
                                                                                            <select class="form-control" data-live-search="true"  name="broker" data-style="btn-secondary" required>
                                                                                                @forelse($users as $user)
                                                                                                    <option value="{{$user->id}}" {{$user->id == $invoice->user->id ? 'selected':''}}>{{$user->name}}</option>
                                                                                                @empty
                                                                                                    <option value="">No Leads Yet</option>
                                                                                                @endforelse
                                                                                            </select>
                                                                                        </div>


                                                                                        <div class="form-group">
                                                                                            <label class="control-label">CURRENCY</label>
                                                                                            <div class="col-12">
                                                                                                <input type="text" class="form-control" readonly="" value="L.E" required>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label class="control-label">Payment Method</label>
                                                                                            <div class="col-12">
                                                                                                <select class="form-control" name="paymentMethodology" required>
                                                                                                    <option value="Cash" {{$invoice->paymentMethodology == 'Cash' ? "selected":''}}>Cash</option>
                                                                                                    <option value="Bank" {{$invoice->paymentMethodology == 'Bank' ? "selected":''}}>Bank</option>
                                                                                                    <option value="Credit" {{$invoice->paymentMethodology == 'Credit' ? "selected":''}}>Credit</option>
                                                                                                </select>

                                                                                            </div>
                                                                                            <div class="col-12 w-100">
                                                                                                <div class="form-group">
                                                                                                    <label class=" control-label">notes</label>
                                                                                                    <div class="col-12 w-100">
                                                                                                        <textarea class="form-control w-100" name="notes" required>{{$invoice->notes}}</textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <lable for="ItemName">Item Name</lable>
                                                                                            <input id="ItemName" class="form-control" type="text" name="propertyName" value="{{$invoice->propertyName}}" required>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <lable for="description">Description</lable>
                                                                                            <input id="description" class="form-control" type="text" name="description" value="{{$invoice->description}}" required>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <lable for="quantity">Quantity</lable>
                                                                                            <input id="quantity" class="form-control" type="text" name="quantity" value="{{$invoice->quantity}}" required>
                                                                                        </div><div class="form-group">
                                                                                            <lable for="cost">Cost</lable>
                                                                                            <input id="cost" type="text" class="form-control" name="cost" value="{{$invoice->cost}}" required>
                                                                                        </div>

                                                                                    </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                                            <button type="button" onclick="document.getElementById('update-invoice-{{$invoice->id}}').submit()" class="btn btn-info waves-effect waves-light">Save changes</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        @empty
                                                            <tr>No Invoices</tr>
                                                        @endforelse

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
                                                <p class="text-right"><b>Sub-total:</b> {{$invoices->pluck('total')->sum()}} </p>

                                                <hr>
                                                <h3 class="text-right"> {{$invoices->pluck('total')->sum()}} L.E</h3>
                                            </div>
                                        </div>
                                        <hr>
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
    <script>

    </script>
@endpush
