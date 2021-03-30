@extends('layouts.appLogged')
@section('title','TRACKS/CRM/Calculator')
@push('css')
    <link href="{{asset('libs/multiselect/multi-select.css')}}" rel="stylesheet" type="text/css" />
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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">CRM </a></li>
                            <li class="breadcrumb-item active">Calculator</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Price Calculator</h4>
                </div>
            </div>
        </div>
        <!-- Calc -->
        <div class="col-sm-8 offset-sm-2 tex-center">
            <div class="card" id="calc">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Calculator</h4>
                </div>
                <div class="card-body ">
                    <form class="form-horizontal" method="post" action="https://www.tracks.eg.com/" id="calc-form">
                        <div class="row">
                            <div class="form-group col-md-6 bmd-form-group is-filled">
                                <label for="inputEmail4" class="bmd-label-static">Unit Size Per Meter</label>
                                <input type="number" step="2" class="form-control" name="unit_size" id="size" required="" style="direction: ltr;" value="12"><span class="astersik">*</span>
                            </div>
                            <div class="form-group col-md-6 bmd-form-group is-filled">
                                <label for="inputPassword4" class="bmd-label-static">Meter Price</label>
                                <input type="number" step="2" class="form-control" name="meter_price" id="meter_price" required="" style="direction: ltr;" value="33"><span class="astersik">*</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Overall Price</label>
                            <div class="col-sm-7">
                                <div class="form-group bmd-form-group is-filled">
                                    <input class="form-control" name="unit_price" id="unit_price" type="text" readonly="readonly" value="396">
                                </div>
                            </div>
                            <label class="col-sm-3 label-on-right">
                                <code>E G P</code>
                            </label>
                        </div>

                        <div class="form-row">
                            <h5 for="title" class="badge badge-info col-md-12">Installment Duration</h5>
                            <div class=" col-md-6">
                                <label for="inputState">Year</label>
                                <select id="inputForYear" class="form-control">
                                    <!-- <option value="0" selected>Year</option> -->
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3" selected="selected">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                </select>
                            </div>
                            <!--for Year -->

                            <div class=" col-md-6">
                                <label for="inputState">Month</label>
                                <select id="inputForMonth" class="form-control">
                                    <option value="0">0</option>
                                    <option value="1" selected="selected">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                </select>
                            </div>
                            <!--for Month -->
                        </div>
                        <!--End row -->

                        <div class="row">
                            <label class="col-sm-3 col-form-label" for="disabledTextInput">Total Of Installment Months</label>
                            <div class="col-sm-7">
                                <div class="form-group bmd-form-group is-filled">
                                    <input type="number" step="2" name="total_months" id="total_months" class="form-control" readonly="readonly" value="37">
                                </div>
                            </div>
                            <label class="col-sm-2 label-on-right"><code>Month</code></label>
                        </div>

                        <div class="row">
                            <h5 for="title" class="badge badge-info col-md-12">Installment Details</h5>
                        </div>
                        <div class="row amount_container">
                            <div class="form-group col-md-6 bmd-form-group is-filled">
                                <label for="inputState" class="bmd-label-static">EOI (Expression Of Interest)</label>
                                <input type="number" step="2" class="form-control amount" style="direction: ltr;" value="10">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary active">
                                        <input type="radio" name="deposit" class="amount_type" value="percentage" amount_type="percentage" autocomplete="off" checked="checked"> %
                                        <div class="ripple-container">
                                        </div></label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="deposit" class="amount_type" value="fixed" amount_type="fixed" autocomplete="off"> Fixed Amount
                                    </label>
                                    <label class="btn btn-default">
                                        <input type="radio" name="deposit" class="amount_type" value="none" amount_type="none" autocomplete="off"> None
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-6 bmd-form-group is-filled">
                                <input class="form-control amount_preview" name="deposit_amount" id="deposit_amount" value="39.6" readonly="readonly">
                            </div>
                        </div>

                        <div class="row amount_container">
                            <div class="form-group col-md-6 bmd-form-group is-filled">
                                <label for="inputState" class="bmd-label-static">DownPayment</label>
                                <input type="number" step="2" class="form-control amount" style="direction: ltr;" value="12">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary active">
                                        <input type="radio" name="contract" class="amount_type" value="percentage" amount_type="percentage" autocomplete="off" checked="checked"> %
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="contract" class="amount_type" value="fixed" amount_type="fixed" autocomplete="off"> Fixed Amount
                                    </label>
                                    <label class="btn btn-default">
                                        <input type="radio" name="contract" class="amount_type" value="none" amount_type="none" autocomplete="off"> None
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-6 bmd-form-group is-filled">
                                <input class="form-control amount_preview" name="contract_amount" id="contract_amount" value="47.52" readonly="readonly">
                            </div>
                        </div>

                        <div class="row amount_container">
                            <div class="form-group col-md-6 bmd-form-group is-filled">
                                <label for="inputState" class="bmd-label-static">Delay Payment</label>
                                <input type="number" step="2" class="form-control amount" style="direction: ltr;" value="88">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary active">
                                        <input type="radio" name="receive" class="amount_type" value="percentage" amount_type="percentage" autocomplete="off" checked="checked"> %
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="receive" class="amount_type" value="fixed" amount_type="fixed" autocomplete="off"> Fixed Amount
                                    </label>
                                    <label class="btn btn-default">
                                        <input type="radio" name="receive" class="amount_type" value="none" amount_type="none" autocomplete="off"> None
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-6 bmd-form-group is-filled">
                                <input class="form-control amount_preview" name="receive_amount" id="receive_amount" value="348.48" readonly="readonly">
                            </div>
                        </div>

                        <div id="accordion" role="tablist">
                            <div class="card-collapse stripped">
                                <div class="card-header" role="tab" id="headingOne">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" href="#payments" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                            Other Payments
                                            <i class="material-icons">keyboard_arrow_down</i>
                                        </a>
                                    </h5>
                                </div>
                                <div id="payments" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row amount_container">
                                            <div class="col-md-12">
                                                <div class="form-group bmd-form-group">
                                                    <div class="dropdown bootstrap-select"><select class="selectpicker" name="other_payments_trigger" data-style="select-with-transition" id="payments_trigger" tabindex="-98">
                                                            <option value="none">None</option>
                                                            <option value="yearly" selected="selected">Yearly</option>
                                                            <option value="half_yearly">Half-Yearly</option>
                                                            <option value="quarterly">Quarterly</option>
                                                        </select><button type="button" class="btn dropdown-toggle select-with-transition" data-toggle="dropdown" role="button" data-id="payments_trigger" title="Yearly"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Yearly</div></div> </div></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6 to_be_hide bmd-form-group">
                                                <label for="inputState" class="bmd-label-static">Single Payment Amount</label>
                                                <input type="number" step="2" class="form-control amount">
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-secondary active">
                                                        <input type="radio" name="other_payments" class="amount_type" value="percentage" amount_type="percentage" autocomplete="off" checked="checked"> %
                                                    </label>
                                                    <label class="btn btn-secondary">
                                                        <input type="radio" name="other_payments" class="amount_type" value="fixed" amount_type="fixed" autocomplete="off"> Fixed Amount
                                                    </label>
                                                    <label class="btn btn-default">
                                                        <input type="radio" name="other_payments" class="amount_type" value="none" amount_type="none" autocomplete="off"> None
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 to_be_hide bmd-form-group is-filled">
                                                <input class="form-control amount_preview" name="other_payments_amount" id="other_payments_amount" value="0" readonly="readonly">
                                            </div>

                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12 bmd-form-group is-filled">
                                <h3 class="badge badge-info">Installment Amount</h3>
                                <!-- <div class="form-check-inline">
                                  <label class="form-check-label">
                                    <input checked type="radio" class="form-check-input" name="installment_interval" value="monthly">Monthly
                                  </label>
                                </div>
                                <div class="form-check-inline">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="installment_interval" value="quarterly">Quarterly
                                  </label>
                                </div>
                                <div class="form-check-inline">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="installment_interval" value="half_yearly">Half-Yearly
                                  </label>
                                </div> -->
                                <input class="form-control" name="monthly_amount" id="monthly_amount" value="-1.07" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="button" class="btn btn-success price-show-btn" data-toggle="modal" data-target="#send-offer-modal">Send Price Offer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>




    <!-- Add Lead Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="lead-modal-parent" aria-labelledby="lead-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="">
                    <div class="card" style="box-shadow: none">
                        <div class="card-header card-header-tabs card-header-rose">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active show" href="#lead-normal-tab" data-toggle="tab">
                                                <img src="{{asset('mmm_files/user.png')}}" alt="excel image" class="modal_logo"> Add Lead                                                        <div class="ripple-container"></div>
                                                <div class="ripple-container"></div></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#lead-excel-tab" data-toggle="tab">
                                                <img src="{{asset('mmm_files/excel.png')}}" alt="excel image" class="modal_logo"> Add Via Excel                            <div class="ripple-container"></div>
                                                <div class="ripple-container"></div></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active show" id="lead-normal-tab">
                                    <form action="https://www.automationprofit.com/api/165/leads/create" id="lead-modal-normal-frm" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="cTphf1kSgSRsGWyQFfa7xzOHBbR8R20md54ttaiD">                        <div class="" role="document">
                                            <div class="">

                                                <div class="">
                                                    <div class="form-group bmd-form-group">
                                                        <label for="formName" class="bmd-label-static">Name</label>
                                                        <input type="text" name="name" class="name form-control" required="" maxlength="100"><span class="astersik">*</span>
                                                    </div>
                                                    <div class="form-group bmd-form-group">
                                                        <label for="formName" class="bmd-label-static">E-Mail</label>
                                                        <input type="email" name="email" class="form-control" maxlength="100">
                                                    </div>
                                                    <div class="form-group bmd-form-group">
                                                        <label for="formName" class="bmd-label-static">Phone</label>
                                                        <input type="number" name="phone" class="phone form-control" required=""><span class="astersik">*</span>
                                                    </div>
                                                    <div class="form-group bmd-form-group">
                                                        <label class="bmd-label-static" for="comment">Notes</label>
                                                        <textarea class="form-control" name="notes" rows="3" id="comment" maxlength="500"></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="upload">Attachment</label>
                                                        <input type="file" name="attachment" id="attachment" class="form-control" accept=".jpg,.pdf,.doc,.docx" style="position: unset; opacity: 1;">
                                                        <p class="text-danger" id="info"></p>
                                                    </div>
                                                    <div id="select-group" class="form-group bmd-form-group">
                                                        <div class="dropdown bootstrap-select camp-"><select id="camp-selectpicker" class="selectpicker camp-selectpicker" name="campaign" title="Campaign Name" data-size="7" required="" data-live-search="true" tabindex="-98"><option class="bs-title-option" value="" selected="selected"></option>
                                                                <option disabled="disabled">Campaign Name</option>


                                                            </select><button type="button" class="btn dropdown-toggle bs-placeholder btn-light" data-toggle="dropdown" role="button" data-id="camp-selectpicker" title="Campaign Name"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Campaign Name</div></div> </div></button><div class="dropdown-menu " role="combobox"><div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div><span class="astersik">*</span>
                                                        <span class="pointer" data-toggle="modal" data-target="#campaign-modal"><i class="fa fa-plus m-2" title="Add Campaign"></i><div class="ripple-container"></div></span>
                                                    </div>
                                                    <div id="select-agent" class="form-group bmd-form-group">
                                                        <div class="dropdown bootstrap-select camp-"><select id="agent-selectpicker" class="selectpicker camp-selectpicker" name="agent" title="Agent" data-size="7" data-live-search="true" tabindex="-98"><option class="bs-title-option" value=""></option>
                                                                <option disabled="disabled">Agent</option>
                                                                <option selected="selected" value="">Agent</option>
                                                            </select><button type="button" class="btn dropdown-toggle bs-placeholder btn-light" data-toggle="dropdown" role="button" data-id="agent-selectpicker" title="Agent"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Agent</div></div> </div></button><div class="dropdown-menu " role="combobox"><div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                                    </div>

                                                    <div id="select-method" class="form-group bmd-form-group">
                                                        <div class="dropdown bootstrap-select camp-"><select id="lead_method" class="selectpicker camp-selectpicker" name="source" title="Method" data-size="7" data-live-search="true" tabindex="-98"><option class="bs-title-option" value=""></option>
                                                                <option disabled="disabled">Method</option>
                                                                <option value="1">Landing-Page</option>
                                                                <option value="2">Contact-us</option>
                                                                <option value="3" selected="selected">Manual</option>
                                                                <option value="4">Phone</option>
                                                                <option value="5">fb message/comment</option>
                                                            </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" data-id="lead_method" title="Manual"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Manual</div></div> </div></button><div class="dropdown-menu " role="combobox"><div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                                    </div>

                                                    <div id="lead_method_other_wrapper" class="form-group bmd-form-group" style="display: none;">
                                                        <input id="lead_method_other_inp" class="form-control " type="text" name="lead_method_other_val" placeholder="type here...">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button id="if_on_click" type="submit" class="btn btn-success rounded-0">Save</button>
                                                    <button type="button" class="btn btn-danger rounded-0" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="lead-excel-tab">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <p class="text-center">Please download the Excel tempate first, then fill data and upload it</p>
                                        </div>
                                        <div class="form-group">
                                            <a href="https://" class="btn btn-light" title="Download Excel template to fill data">Download Template  <i class="fa fa-download p-2"> </i></a>
                                        </div>
                                        <div class="">
                                            <label class="btn btn-light" for="upload" title="Upload Excel data file">Upload<i class="fa fa-upload p-2"> </i></label>
                                            <input type="file" name="leads_template" class="" id="upload" required="" accept=".xlsx, .xls"><span class="astersik">*</span>
                                        </div>
                                        <div id="select-group" class="form-group">
                                            <div class="dropdown bootstrap-select camp-"><select id="camp-selectpicker" class="selectpicker camp-selectpicker" name="campaign" title="Campaign Name" data-size="7" required="" tabindex="-98"><option class="bs-title-option" value="" selected="selected"></option>
                                                    <option disabled="disabled">Campaign Name</option>
                                                </select><button type="button" class="btn dropdown-toggle bs-placeholder btn-light" data-toggle="dropdown" role="button" data-id="camp-selectpicker" title="Campaign Name"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Campaign Name</div></div> </div></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div><span class="astersik">*</span>
                                            <span class="pointer" data-toggle="modal" data-target="#campaign-modal"><i class="fa fa-plus m-2" title="Add Campaign"></i><div class="ripple-container"></div></span>
                                        </div>
                                        <div id="select-agent" class="form-group bmd-form-group">
                                            <div class="dropdown bootstrap-select camp-"><select id="agent-selectpicker" class="selectpicker camp-selectpicker" name="agent" title="Agent" data-size="7" data-live-search="true" tabindex="-98"><option class="bs-title-option" value=""></option>
                                                    <option disabled="disabled">Agent</option>
                                                    <option selected="selected" value="">Agent</option>
                                                </select><button type="button" class="btn dropdown-toggle bs-placeholder btn-light" data-toggle="dropdown" role="button" data-id="agent-selectpicker" title="Agent"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Agent</div></div> </div></button><div class="dropdown-menu " role="combobox"><div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                        </div>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <button type="button" class="btn btn-danger rounded-0" data-dismiss="modal">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //Add Lead Modal -->
    <!-- Add Campaign Modal -->
    <form class="modal fade" method="post" action="https://www.automationprofit.com/api/165/leads/forms/create" id="campaign-modal" tabindex="-1" role="dialog" aria-labelledby="camp-modal-label" aria-hidden="true">
        <input type="hidden" name="_token" value="cTphf1kSgSRsGWyQFfa7xzOHBbR8R20md54ttaiD">        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="camp-modal-label" add-text="Add Campaign" edit-text="Edit Campaign"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group bmd-form-group">
                        <label for="formName" class="bmd-label-static">Name</label>
                        <input type="text" name="camp_name" class="form-control" required="" maxlength="100"><span class="astersik">*</span>
                        <input type="text" name="camp_id" class="d-none">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger rounded-0" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success rounded-0">Save</button>
                </div>
            </div>
        </div>
    </form>
    <!-- //Add Campaign Modal -->

    <!-- Call Center Modal-->
    <div class="modal fade" id="cc_script_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="" id="cc_script_frm" method="POST" action="">
                    <input type="hidden" name="_token" value="cTphf1kSgSRsGWyQFfa7xzOHBbR8R20md54ttaiD">                <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Call center script</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group bmd-form-group">
                            <textarea class="form-control cc-script-textarea" rows="5" style="display: none" name="cc_script"></textarea>
                            <p class="cc-script-text"></p>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- //Call Center Modal -->

    <!-- Tutorial Modal -->
    <div class="modal fade" id="tutorail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tutorial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //Tutorial Modal -->
    <!-- Edit Modal -->
    <form method="POST" action="https://www.automationprofit.com/165/offers/send" class="modal fade" id="send-offer-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <input type="hidden" name="_token" value="cTphf1kSgSRsGWyQFfa7xzOHBbR8R20md54ttaiD">    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Facilities Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label label-checkbox">Send Via</label>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" name="send_method[]" class="form-check-input" value="email">E-Mail
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" name="send_method[]" class="form-check-input" value="sms">SMS
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" name="send_method[]" class="form-check-input" value="whatsapp">whatsapp
                                </label>
                            </div>
                        </div>
                        <div class="form-group bmd-form-group">
                            <label for="fname" class="form-label bmd-label-static">Project Name</label>
                            <input type="text" disabled="disabled" class="form-control" id="project_name" name="project_name">
                            <input type="hidden" class="form-control" id="project_id" name="project_id">
                        </div>
                        <div class="form-group bmd-form-group">
                            <label for="fname" class="form-label bmd-label-static">Unit Code</label>
                            <input type="text" disabled="disabled" class="form-control" id="unit_name" name="unit_name">
                            <input type="hidden" class="form-control" id="unit_id" name="unit_id">
                        </div>

                        <div class="form-row bmd-form-group mb-3">
                            <div class="dropdown bootstrap-select show-tick cst-" style="width: 100%;"><select class="selectpicker cst-selectpicker" data-width="100%" multiple="multiple" data-live-search="true" data-header="Choose Leads ..." title="Choose From Leads ..." data-style="select-with-transition" id="leads" name="leads[]" style="cursor: auto;" length="0" tabindex="-98"></select><button type="button" class="btn dropdown-toggle bs-placeholder select-with-transition" data-toggle="dropdown" role="button" data-id="leads" title="Choose From Leads ..."><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Choose From Leads ...</div></div> </div></button><div class="dropdown-menu " role="combobox" style="padding-top: 0px; max-height: 833px; overflow: hidden; min-height: 121px;"><div class="popover-header"><button type="button" class="close" aria-hidden="true">×</button>Choose Leads ...</div><div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1" style="max-height: 702px; overflow-y: auto; min-height: 0px;"><ul class="dropdown-menu inner show"></ul></div></div></div>
                        </div>
                        <div class="form-group bmd-form-group mb-3">
                            <label for="fname" class="form-label bmd-label-static">Emails</label>
                            <input type="email" class="form-control" id="emails" name="emails" placeholder="Emails Seperated By Comma">
                        </div>

                        <div class="form-group mb-3 bmd-form-group">
                            <label for="fname" class="form-label bmd-label-static">Phones</label>
                            <input type="number" class="form-control" id="phones" name="phones" placeholder="Phones Seperated By Comma" pattern="(\+|00|0)*(9[976]\d|8[987530]\d|6[987]\d|5[90]\d|42\d|3[875]\d|2[98654321]\d|9[8543210]|8[6421]|6[6543210]|5[87654321]|4[987654310]|3[9643210]|2[70]|7|1)\d{1,14}$">
                        </div>

                        <div class="form-group bmd-form-group mb-3">
                            <label for="fname" class="bmd-label-static">Expire Date</label>
                            <input type="text" class="form-control datepicker" id="expire_date" name="expire_date" placeholder="Offer Expiration Date">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger rounded-0" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn final-btn btn-success rounded-0">Send</button>
                </div>
            </div>
        </div>
    </form>
    <!-- //Edit Modal -->

@endsection

@push('script')
    <script>
        var translations = {"activate_account":"Actviate Account","dashboard":"Dashboard","users":"Users","add_user":"Add User","all_users":"All Users","settings":"Settings","calc":"Calculator","logout":"Logout","login":"Login","remember_me":"Remember me","sign_up":"Sign Up","leads":"Leads","candidates":"Candidates","lead":"Lead","candidate":"candidate","leads_start":"Start From","lead_history":"Actions History","reports":"Reports","all":"All","new":"New","notifications":"Notifications","notifications_to":"Notifications To","notifications_time":"Notifications Time","unit_size":"Unit Size Per Meter","meter_price":"Meter Price","meter_price_le":"Meter Price Per Egyptian Pound","overall_price":"Overall Price","installment":"Installment","install_duration":"Installment Duration","year":"Year","years":"Years","month":"Month","months":"Months","total_of_installment_months":"Total Of Installment Months","installment_details":"Installment Details","down_payment":"Down Payment","fixed_amount":"Fixed Amount","percentage":"%","none":"None","contract_payment":"Contract Payment","receive_payment":"Receive Payment","other_payments":"Other Payments","yearly":"Yearly","yearly_payments":"Number Of Yearly Payments","half_yearly":"Half-Yearly","quarterly":"Quarterly","monthly":"Monthly","single_payment_amount":"Single Payment Amount","monthly_installment_amount":"Monthly Installment Amount","installment_amount":"Installment Amount","price_offer":"Facilities Payment","project_name":"Project Name","project_code":"Project Code","unit_name":"Unit Code","add_project":"Add Project","add_unit":"Add Unit","edit_project":"Edit Project","edit_unit":"Edit Unit","credit":"Credit","fb_accounts":"Facebook Accounts","fb_campaigns":"Facebook Campaigns","fb_vacancies":"Facebook Vacancies","name":"Name","fb_login_msg":"Please Login with Marketing Facebook Account","form_name":"Form Name","total_leads":"Total Leads","total_candidates":"Total Candidates","sales_persons":"Sales Persons","hr_agents":"HR Agents","export_link":"Export Link","forms":"Forms","status":"Status","choose_status":"Choose Status ...","choose_sub_status":"Choose sub status","save":"Save","id":"ID","created_at":"Added At","agent":"Agent","hr_agent":"Hr Agent","complete_user_data_message":"Please complete your data","email":"E-Mail","phone":"Phone","first_name":"First Name","last_name":"Last Name","password":"Password","password_confirmation":"Confirm Password","password_mismatch":"Passwords Don't Match","role":"Role","actions":"Actions","edit":"Edit","remove":"Remove","invite":"Invite","invite_user_msg":"Please Enter User Email","from":"From","to":"To","choose_agent":"Choose Agent ...","choose_hr_agent":"Choose HR Agent ...","reports_title":"Actions Reports","today":"Today","send_email_on":"Send Email When ?","send_sms_on":"Send Sms When ?","email_subject":"Subject","email_body":"E-Mail Script","sms_body":"SMS Script","users_notifications_title":"Users Notifications","emails_seperated":"Emails Seperated By Comma","phones_seperated":"Phones Seperated By Comma","emails":"Emails","phones":"Phones","expire_date":"Expire Date","expire_date_pl":"Offer Expiration Date","date_warning":"Please note that, this date can not be modified later","close":"Close","send":"Send","choose_leads":"Choose Leads ...","choose_candidates":"Choose Candidates ...","choose_from_leads":"Choose From Leads ...","choose_from_candidates":"Choose From Candidates ...","send_price_offer":"Send Price Offer","egp":"E G P","confirm":"Are you sure?","yes":"Yes","cancel":"Cancel","edit_user":"Edit User","send_via":"Send Via","add_via":"Add Via","excel":"Excel","sms":"SMS","unit_price":"Unit Price LE","rent_price":"Rent Price","super_admins":"Owner","owner":"Owner","admins":"Admins","agents":"Sales-Agents","notes":"Notes","date":"Date","on":"On","by":"By","add":"Add","add_lead":"Add Lead","add_candidate":"Add Candidate","edit_lead":"Edit Lead","edit_candidate":"Edit Candidate","reactivate_msg":"Please Reactivate The Below Accounts According Facebook Updates","charge_request_sucess_msg":"Your request has been submitted , it will be responded within next 48 working hours","vodafone_cash":"Vodafone Cash","sent_from":"From","sent_to":"Vodafone Cash Number","package":"Package","unit":"Unit","date_of_transfer":"Date Of transfer","amount_of_transfer":"Amount of transfer","submit":"Submit","invoices":"Invoices","pay_invoice":"Pay Invoice","charge_credit":"Charge Credit","recharge":"Recharge","invoice":"Invoice","total":"Total","paid":"Paid","unpaid":"Unpaid","on_date_action":"On Date Action","on_submit_action":"On Submit Action","locked_header":"Account is locked","locked_msg":"Please pay your invoices to reactivate the system","billing":"Billing","send_sms":"Send Sms","message":"Message","message_text":"Message Text","to_leads":"To Leads","to_candidates":"To Candidates","to_phones":"To Phone Number","through_phone":"Through Phone","through_fb":"Through FB message\/comment","home":"Home","update_date":"Update Date","choose_company":"Please choose a company","or_create_new":"Or create a new company","user_bill_statement":"Adding New User - :user_name - :month_year","plan_bill_statement":"Pricing Plan Invoice","package_bill_statement":"Charge Package - :package_name","statement":"Statement","category":"Category","apartment":"Apartment","villa":"Villa","for_sell":"For Sell","sold":"Sold","building_date":"Building Date","ready_level":"Level","not_ready_level":"Not Ready","ready":"Ready","payment_method":"Payment Method","cash":"cash","address":"Address","info":"Information","unit_upload":"Pictures Upload","click_add_user":"Please click here to add users","get_started":"Get Started","developed_by":"Developed by","old_password":"Old Password","new_password":"New Password","forgot_password":"Forgot Password?","reset_password":"Reset Password","change_password":"Change Password","campaigns":"Campaigns","campaign":"Campaign","vacancies":"Vacancies","vacancy":"Vacancy","campaign_name":"Campaign Name","vacancy_name":"Vacancy Name","add_campaign":"Add Campaign","add_vacancy":"Add Vacancy","edit_campaign":"Edit Campaign","edit_vacancy":"Edit Vacancy","project":"Project","source":"Source","source_array":{"1":"Landing-Page","2":"Contact-us","3":"Manual","4":"Phone","5":"fb message\/comment","9":"Other"},"sender_id":"Sender ID","sender_id_activation":"Sender ID Activation","website":"Website","update":"Update","if_have_query":"If you have any query, do not hesitate to contact us","pls_fill":"Please fill out this field","account":"Account","no_notifications":"No current notifications","send_ticket":"Ticket","update_company_info":"Please update your comapny info","logo":"Logo","company_name":"Company Name","company_type":"Type","sms_sent_under_name":"SMS will be sent under this name","slogan":"Less Effort, More Profit","keep_all_in_one_place":"Start now","modules":"Modules","real_estate_crm":"Real-Estate CRM","sales_crm":"Digital Marketing CRM","H_R":"Recruitement","hr":"Recruit","features":"Featrures","fb_integration":"Facebook Leads Integration","cs_contact":"Customer Contacts","auto_sms_email":"Automated SMS and Emails","real_estate_calc":"Real-State Calculator","detailed_reports":"Detailed Reports","auto_users_alloc":"Automated Leads Allocation","sales_team_mgmt":"Sales Team Management","team_mgmt":"Team Management","contact_us":"Contact us","cst_search":"Customers Search","cand_search":"Candidates Search","free_support":"Free Support","free_support_and_update":"Free Update and Support","free_upgrade":"Free Upgrade","crm_contacts":"CRM Contacts","up_to_6":"Up to 6 Users","up_to_20":"Up to 20 Users","up_to_30":"Up to 30 Users","unlimited":"Unlimited","unlimited_users":"Unlimited Users","single_user":"Single User","sender_id_beatk":"Sender ID (Beatak.net)","life_time":"LIFE TIME","select":"Select","select_all":"Select All","pricing":"Pricing","order":"Order","most_pop":"Most Popular","happy_to_receive":"We are happy to receive your requests and inquiries","verify_email":"Please verify your email","once_you_verify":"Once you verify your email address, you and your team can get started with our services!","complete_registartion":"Please complete registartion","next":"Next","previous":"Previous","offers":"Price Offers","sent_offers":"Sent Offers","other_emails":"Other E-Mails","other_phones":"Other Phones","trash":"Trash","sent_by":"Sent By","delete":"Delete","cant_display":"This page can not be displayed on this screen, Please open it from desktop","publish":"Publish","fb":"Facebook","customize":"Edit landing-page","name_change":"Change Name","add_camp_lead":"Add Lead or Campaign","add_vacancy_candidate":"Add Candidate or Vacancy","description":"Description","change_camp_banner":"Change campaign banner","change_vacancy_banner":"Change vacancy banner","edit_vacancy_name_description":"Edit vacancy name and description","preview":"Preview","fawry":"Fawry - Credit Card","preview_attachment":"Preview","camp_del_confirm":"Please note that, all leads under this campaign will be deleted too","vacancy_del_confirm":"Please note that, all candidates under this vacancy will be deleted too","more":"More","pos_date":"Possesion Date","project_pictures":"Project Pictures","units_show":"Show Units","project_show":"Show Project","proj_del_confirm":"Please note that, all units under this project will be deleted too","search":"Search","total_units":"Total Units","available_units":"Available Units","floor_num":"Floor Number","floor_num_or":"Floor floors Number","floor_num_pl":"Please type numbers separated by comma (,) in case more than one floor","bathrooms":"Bathrooms Number","rooms":"Rooms Number","close_to":"Close to","main_street":"Main Street","sub_street":"Sub Street","garden":"Garden","corner":"Corner","advanced":"advanced","city":"City","country":"Country","contract_method":"Contract Method","privileges":"Privileges","teamwork":"Teamwork","desc_custom":"Description","yesterday":"Yesterday","last_7_days":"Last 7 Days","last_30_days":"Last 30 Days","this_month":"This Month","last_month":"Last Month","size_from":"Size From","basic":"Basic","properties":"Properties","projects":"Projects","units":"Units","no_available_units":"No available units","no_available_projects":"No available projects","choose_unit":"Choose Unit","reservation_status":"Reservation Status","available":"Available","not_available":"Not Available","campaigns_creation":"Campaigns creation","custom_form":"Custom registartion form for each campaign","custom_vacancy":"Custom registartion form for each vacancy","campaign_landpage":"Custom landing-page for each campaign, connected with the website","whatsapp":"whatsapp","template":"Template","download":"Download","upload":"Upload","no_available":"No available","details":"Details","about":"About","move_to_another_cam":"Move to another campaign","move_to_another_vacancy":"Move to another vacancy","assign_to_agent":"Assign to agent","excel_temp_dow":"Download Excel template to fill data","excel_temp_up":"Upload Excel data file","excel_des":"Please download the Excel tempate first, then fill data and upload it","cv":"CV","attachment":"Attachment","cover_letter":"Cover Letter","file_size_error":"Too big file size!!","hr_fb_intg":"Integration with Facebook jobs","hr_job_temp":"Custom registartion template for each job","hr_interview_follow":"Interviews follow-up","marketing":"Marketing","cc_script":"Call center script","cc":"Call Center","permissions":"Permissions","adding":"Adding","owner_name":"Owner name","owner_phone":"Owner phone","monthly_rent_cost":"Monthly rent cost","for_sell_or_rent":"For sell or rent","for_rent":"For Rent","below_information_will_be_public":"Below information will be public","for_contact":"For contact","facebook":"Facebook","twitter":"Twitter","instagram":"Instagram","linkedin":"Linkedin","username":"Username","sms_setting":"SMS Settings","status_notification_sentence":"Today leads","status_notification_sentence_hr":"Today candidates","governorate":"Governorate","sector":"sector","zone":"Zone","building_num":"Building number","land_area_in_meters":"Land area in meters","building_area_in_meters":"Building area in meters","selling_price":"Selling price","referrer":"Referrer","alert":"Alert","alert_date":"Alert date","alert_notes":"Alert notes","alert_delete":"Delete alert","alert_edit":"Edit alert","type":"Type","timeline":"Timeline","and":"and","size":"Size","price":"Price","location":"Location","group_mall":"Group\/ mall","other":"Other","bui_err_msg":"Building size should be less than or equal to unit size","updates":"Updates","error_404_title":"Page not Found","error_404":"Seems like you have lost your way. Let's bring you back home","error_500_title":"Something went wrong","error_500":"Don't worry, our development team have automaticaly been notified of this issue and they are working on it. Please try again in a few minutes","go_home":"GO HOME","sorry":"Sorry","without":"Without","pending_unit":"Unavailable Unit","units_alerts_notification_sentence":"Units Waiting To Update","unavailable":"Unavailable","availability":"Availability","ground_size":"Ground Size","unit_no":"Unit Number","for_sell_rent":"For Sell Or Rent","insert_date":"Insert Date","is_furnished":"Furnished","furnished_yes":"Yes","furnished_no":"No","garden_size":"Garden Size","building_number":"Building number","unit_number":"Unit number","building_size":"Buildings size","role_name":"Role name","roles":"Roles","role_add":"Add Role","default":"Default","statistics":"Statistics","sent":"Sent","sent_method":"Sent method","our_services":"Our services","success_partners":"Success partners","members":"members","is_valid_to_leads_allocation":"Role Is Able To Leads Allocation On This Role","account_is_activated":"Account is activated","account_is_not_activated":"Account is not activated. Please activate ","duplicated":"duplicated","created_by":"Added By","method":"Method","type_here":"type here...","important":"Important","tutorial":"Tutorial","status_setting":"Status setting","status_name":"Status name","sub_status_name":"Sub status name","status_sub":"Sub status","status_close_lead":"This status can close lead","color":"Color","needs_date":"Needs to date","calendar":"Calendar","label":"Label","labels":"Labels","labels_setting":"Labels setting","label_name":"Label name","channels_setting":"Channels setting","channel_name":"Channel name","loading":"Loading...","all_the_time":"All Time","status_date":"Status Date","create_new":"Create new","manage_labels":"Manage labels","add_status":"Add status","show_in_list":"Show in list","total_status":"Total status","based_on":"Based on","based_on_any_date":"Based on any date","based_on_creation_date":"Based on creation date","based_on_update_date":"Based on update date","based_on_status_date":"Based on status date","based_on_alert_date":"Based on alert date","total_size":"Total Size","try_units_table":"try new beta table now. ","back_to_old_table":"Back to old table","click_here":"Click here!","restore_table_settings":"Restore table settings to defaults","deleted_at":"Deleted At","start_now":"Start Now","issue_date":"Issue Date","due_date":"Due Date","bulk_paying":"Bulk Payment","discount_percentage":"Discount %","total_due_amount":"Total Amount","next_due_date":"Next Due Date","pay_now":"Pay Now","qurtely":"Qurtely","semi_annually":"Semi Annually","annually":"Annually","due_amounts":"Due Amounts","project_agents":"Project agents","project_agents_help":"Who can access project critical data like address and owner name or phone","protected":"protected","lead_calls":"Lead calls which stored in google drive","campaign_thank_you":"Your informations has been stored successfully .. Thank you!","late_leads":"Late Leads","important_leads":"Important Leads","unassigned_leads":"Unassigned Leads","change_status_to_converted":"Update leads status to transferred","no_of_employees":"Number of employees","why_apply_to_initiative":"Why do you apply to this initiative?","apply_reason":"Apply Reason","basic_info":"Basic Information","requirements":"Requirements","employer_information":"Employer Information","title":"Title","important_candidates":"Important Candidates","unassigned_candidates":"Unassigned Candidates","late_candidates":"Late Candidates","ask_cv":"Ask to apply cv"};
        var units_alerts_check_url = "https://www.automationprofit.com/165/properties/units/alerts";
        var units_alerts_url = "https://www.automationprofit.com/165/properties/units/grid?alert_date=23%2F10%2F2020";
        function trans(key)
        {
            return translations[key] || null;
        }
    </script>
    <script src="{{asset('mmm_files/jquery.js')}}" type="text/javascript"></script>
    <script src="{{asset('mmm_files/popper.js')}}" type="text/javascript"></script>
    <script src="{{asset('mmm_files/moment.js')}}" type="text/javascript"></script>
    <!-- <script src="https://www.automationprofit.com/app/js/plugins/datetime-moment.js')}}" type="text/javascript"></script> -->
    <script src="{{asset('mmm_files/pdfmake.js')}}"></script>
    <script src="{{asset('mmm_files/datatables.js')}}"></script>
    <script src="{{asset('mmm_files/tempusdominus-bootstrap-4.js')}}"></script>
    <!-- Test Animation -->
    <script src="{{asset('mmm_files/anime.js')}}"></script>

    <!--   Core JS Files   -->
    <script src="{{asset('mmm_files/bootstrap-material-design.js')}}" type="text/javascript"></script>
    <script src="{{asset('mmm_files/perfect-scrollbar.js')}}"></script>
    <!--  Google Maps Plugin    -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->

    <!-- Chartist JS -->
    <script src="{{asset('mmm_files/chartist.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{asset('mmm_files/bootstrap-notify.js')}}"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('mmm_files/material-dashboard.js')}}" type="text/javascript"></script>
    <!-- <script src="https://www.automationprofit.com/app/js/bootstrap-table.js')}}" type="text/javascript"></script> -->
    <script src="{{asset('mmm_files/bootstrap-multiselect.js')}}"></script>
    <script src="{{asset('mmm_files/bootstrap-selectpicker.js')}}"></script>
    <script src="{{asset('mmm_files/bootstrap-datetimepicker.js')}}"></script>
    <script src="{{asset('mmm_files/custom.js')}}"></script>
    <script src="{{asset('mmm_files/events.js')}}"></script>
    <script src="{{asset('mmm_files/ajax.js')}}"></script>




    <script>
        var app_lang = "en";
        $(document).ready(function() {
            md.initDashboardPageCharts();
        });
        var tutorial_link = '';

    </script>
    <script src="{{asset('mmm_files/calc2.js')}}"></script>
    <script>

        var units = [];
        $(function(){

            $('#project').on('change', function(){
                var units_ele = $("#unit");

                units_ele.find('option').not(':disabled').remove();

                var project_id = $(this).val();
                var project_units = units.filter(function(unit){ return unit.project_id == project_id } );
                var i;
                for(i in project_units)
                {
                    if( project_units.hasOwnProperty(i) )
                    {
                        var unit = project_units[i];
                        units_ele.append('<option value="'+ unit.id +'">'+ unit.code +'</option>');
                    }
                }
                units_ele.selectpicker('refresh');

            });

            $('#unit').on('change', function(){
                var unit_id = $(this).val();
                var unit_data = units.filter(function(unit){ return unit.id == unit_id } )[0];
                var project_data = unit_data.project.r_estate;

                $('#project_id').val(unit_data.project.id);
                $('#project_name').val(unit_data.project.name);

                $('#unit_id').val(unit_data.id);
                $('#unit_name').val(unit_data.code);

                try {
                    var payment_details = project_data.payment_details;
                }
                catch(e)
                {

                }

                $('#meter_price').val(unit_data.meter_price);
                $('#size').val(unit_data.size);

                if( payment_details )
                {
                    payment_details = JSON.parse(payment_details);

                    for(var i in payment_details)
                    {
                        var payment_type = payment_details[i];

                        $('[name="'+ i +'"]').parent().removeClass('active');
                        var radio_btn_selecter = $('[name="'+ i +'"][value="'+ payment_type.method +'"]').attr('checked', true).parent().addClass('active');

                        var amount_selector = radio_btn_selecter.parent().parent().find('input');
                        amount_selector.val(payment_type.value);

                        if( payment_type.hasOwnProperty('trigger') )
                        {
                            console.log(payment_details);
                            console.log(payment_details);
                            $("#payments_trigger").selectpicker('val', payment_type.trigger).trigger('change');

                        }
                    }
                }

                $('#size').trigger('keyup');
            });

            //handle unit in request
            var urlParams = new URLSearchParams(window.location.search);
            var unit_id = urlParams.get('unit');
            if( unit )
            {
                try
                {
                    var unit_data = units.filter(function(unit){ return unit.id == unit_id } )[0];
                    $('#project').val(unit_data.project_id).trigger('change');
                    $('#unit').val(unit_data.id).trigger('change');
                }
                catch(e)
                {

                }
            }

            $('.selectpicker').selectpicker({
                size: 5
            })
        });



        // SelectPicker
        var options;
        $('document').ready(function(){
            $('.cst-selectpicker').html('');
            $.ajax({
                url: location.href,
                success: function(result){
                    options = result;
                    var optgps = options.data.leads_forms;
                    for (var optgp in optgps) {
                        var options = [];
                        for (var lead=0; lead < optgps[optgp].length; lead++) {
                            var lead_name = optgps[optgp][lead]['name'];
                            var lead_id = optgps[optgp][lead]['lead_id'];
                            options.push('<option value="' + lead_id + '">' + lead_name + '</option>');
                        }
                        $('.cst-selectpicker').append(final);
                        var final = '<optgroup label="' + optgp + '"> '+options.join("\n")+' </optgroup>';
                        console.log(final)
                    }
                    $('.cst-selectpicker').selectpicker('refresh');
                }});
        })

        tutorial_link = 'https://drive.google.com/file/d/103DsTM7eDE2aAWJVCGoTEi_kgKjaZdDq/preview';

    </script>

    <script>
        var is_real_estate = true;
        // Tutorial Modal
        if( tutorial_link != '' && is_real_estate )
        {
            var tut_btn = `
            <span  class="pointer tutorial-btn" data-toggle="modal" data-target="#tutorail" title="tutorial">
              <i class="fa fa fa-question-circle text-dark"></i>
            </span>`;
            $('.card-header .card-icon').parent().find('h4.card-title').append(tut_btn);
            $('#tutorail').on('hidden.bs.modal', function (e) {
                $('#tutorail iframe').attr("src", $("#tutorail iframe").attr("src"));
            });
            $('.tutorial-btn').on('click', function(){
                $('#tutorail iframe').attr("src", tutorial_link);
            })
        }
    </script>

@endpush
