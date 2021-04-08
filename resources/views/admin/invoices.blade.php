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
                                                            <input type="text"  name="invoiceSerial" class="form-control" placeholder="SERIAL" required>
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
                                                    <div class="">
                                                        <table class="table mt-4">
                                                            <thead>
                                                            <tr>

                                                                <th>Property Name </th>
                                                                <th>Description</th>
                                                                <th>Quantity</th>
                                                                <th>Unit Cost</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>
                                                                    <select class="selectpicker propertyName" data-index="00" data-live-search="true"  name="propertyName" data-style="btn-secondary" id="propertyName">
                                                                        <option value="" disabled>Name  /  location   /   square feet</option>
                                                                    @forelse($properties as $property)
                                                                            <option value="{{$property->id}}" data-price="{{$property->price}}">{{$property->name .' / '. $property->location.' / '. $property->square }}</option>
                                                                        @empty
                                                                            <option value="" disabled>No Properties Yet</option>
                                                                        @endforelse
                                                                    </select>
                                                                <td>
                                                                    <input type="text" class="form-control" placeholder="Description" name="description" required>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" placeholder="Quantity" name="quantity" required>
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="cost00" class="form-control" placeholder="Cost" name="cost" disabled>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-secondary waves-effect waves-light float-right invoiceButton">Submit</button>
                                        </div>
                                    </form>
                                    <div id="printDiv">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card-box table-responsive">
                                                    <table id="datatable-custom" class="text-center table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                        <tr>
                                                            <th>Property</th>
                                                            <th>Lead</th>
                                                            <th>Broker</th>
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
                                                                <td>{{$invoice->property->name}}</td>
                                                                <td>{{$invoice->lead->name}}</td>
                                                                <td>{{$invoice->user->name}}</td>
                                                                <td>{{$invoice->description}}</td>
                                                                <td>{{$invoice->quantity}}</td>
                                                                <td>{{$invoice->cost}}</td>
                                                                <td>{{$invoice->total}}</td>
                                                                <td class="row justify-content-center">
                                                                    <button class="btn btn-primary waves-effect waves-light mr-2" data-toggle="modal" data-target="#edit-invoice-{{$invoice->id}}">Edit</button>
                                                                    <a href="{{route('deleteInvoice',$invoice->id)}}"  class="btn btn-danger waves-effect waves-light DeleteButton" >Delete</a>
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
                                                                                                <input type="text"  name="invoiceSerial" class="form-control" value="{{$invoice->invoiceSerial}}" required>
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
                                                                                            <lable for="ItemName{{$loop->index}}">Property Name</lable></div>
                                                                                            <select id="ItemName{{$loop->index}}" class="form-control propertyName" data-index="{{$loop->index}}" data-live-search="true"  name="propertyName" data-style="btn-secondary" >
                                                                                                <option value="" disabled>Name  /  location   /   square feet</option>
                                                                                                @forelse($properties as $property)
                                                                                                    <option value="{{$property->id}}" {{$property->id == $invoice->property->id ? 'selected' : ''}} data-price="{{$property->price}}">{{$property->name .' / '. $property->location.' / '. $property->square }}</option>
                                                                                                @empty
                                                                                                    <option value="" disabled>No Properties Yet</option>
                                                                                                @endforelse
                                                                                            </select>
                                                                                        <div class="form-group">
                                                                                            <lable for="description{{$loop->index}}">Description</lable>
                                                                                            <input id="description{{$loop->index}}" class="form-control" type="text" name="description" value="{{$invoice->description}}" required>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <lable for="quantity{{$loop->index}}">Quantity</lable>
                                                                                            <input id="quantity{{$loop->index}}" class="form-control" type="text" name="quantity" value="{{$invoice->quantity}}" required>
                                                                                        </div><div class="form-group">
                                                                                            <lable for="cost{{$loop->index}}">Cost</lable>
                                                                                            <input id="cost{{$loop->index}}" type="text" class="form-control" name="cost" value="{{$invoice->cost}}" disabled>
                                                                                        </div>

                                                                                    </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                                            <button type="button" onclick="$('input:disabled').removeAttr('disabled');document.getElementById('update-invoice-{{$invoice->id}}').submit()" class="btn btn-info waves-effect waves-light invoiceButton">Save changes</button>
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
        $(document).ready(function (){
            $('#cost00').val($('option:selected',$('#propertyName')).data('price'))
        })
        $('.propertyName').on('change',function (){
            let index=$(this).data('index');
            let propertyPrice=$('option:selected',$(this)).data('price');
            $('#cost'+index).val(propertyPrice);
        })
        $('form').on('click',function(e) {
            $('input:disabled').removeAttr('disabled')
        });


        $("#datatable-custom").DataTable(
            {
                dom:"Bfrtip",
                buttons:[
                    {extend:"copy",className:"btn-sm",exportOptions: {columns: [ 0, 1, 2,3,4,5,6 ]},messageTop:'Invoices',messageBottom: 'Total :: {{$invoices->pluck('total')->sum()}}'},
                    {extend:"csv",className:"btn-sm",exportOptions: {columns: [0, 1, 2,3,4,5,6 ]},messageTop:'Invoices',messageBottom: 'Total :: {{$invoices->pluck('total')->sum()}}'},
                    {extend:"excel",className:"btn-sm",exportOptions: {columns: [ 0, 1, 2,3,4,5,6 ]},messageTop:'Invoices',messageBottom: 'Total :: {{$invoices->pluck('total')->sum()}}'},
                    {extend:"pdf",className:"btn-sm",exportOptions: {columns: [ 0, 1, 2,3,4,5,6 ]},messageTop:'Invoices',messageBottom: 'Total :: {{$invoices->pluck('total')->sum()}}'},
                    {extend:"print",className:"btn-sm",exportOptions: {columns: [ 0, 1, 2,3,4,5,6 ]},messageTop:'<h1 class="text-center">Invoices</h1>',messageBottom: '<div class="row justify-content-around"><h1>Total</h1><h1>{{$invoices->pluck('total')->sum()}}</h1></div>'}
                    ],
                responsive:!0
            })
    </script>
@endpush
