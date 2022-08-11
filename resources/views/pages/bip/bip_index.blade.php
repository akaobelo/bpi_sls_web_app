@extends('pages.index')

@section('content')
<div class="container">
    <div class="card card-custom gutter-b">
        <div class="card-body">
            <div class="d-flex">
                <!--begin::Pic-->
                <div class="flex-shrink-0 mr-7">
                    <div class="symbol symbol-50 symbol-lg-120">
                        <img alt="Pic" src="{{asset('/assets/images/logo.png')}}">
                    </div>
                </div>


                <div class="d-flex align-items-center flex-wrap justify-content-between">

                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label>BU:</label>
                                <input type="email" class="form-control" placeholder="Enter contact number">
                            </div>
                            <div class="col-lg-4">
                                <label>Store:</label>
                                <input type="email" class="form-control" placeholder="Enter contact number">
                            </div>
                            <div class="col-lg-4">
                                <label>Store Code:</label>
                                <input type="email" class="form-control" placeholder="Enter contact number">
                            </div>
                            <div class="col-lg-4">
                                <label>Store Code:</label>
                                <input type="email" class="form-control" placeholder="Enter contact number">
                            </div>
                            <div class="col-lg-4">
                                <label>Store Code:</label>
                                <input type="email" class="form-control" placeholder="Enter contact number">
                            </div>

                            <div class="col-lg-4">
                                <button type="reset" class="form-control btn btn-primary">Clear</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-8">
                                <label>Address:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter your address">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-map-marker"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="form-text text-muted">Please enter your address</span>
                            </div>
                            <div class="col-lg-4">
                                <label>Postcode:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter your postcode">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-bookmark-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="form-text text-muted">Please enter your postcode</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>User Group:</label>
                                <div class="radio-inline">
                                    <label class="radio radio-solid">
                                    <input type="radio" name="example_2" checked="checked" value="2">
                                    <span></span>Sales Person</label>
                                    <label class="radio radio-solid">
                                    <input type="radio" name="example_2" value="2">
                                    <span></span>Customer</label>
                                </div>
                                <span class="form-text text-muted">Please select user group</span>
                            </div>
                        </div>
                        <!-- begin: Example Code-->
                        <div class="example-code mt-10">
                            <ul class="example-nav nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-2x">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#example_code_html">HTML</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="example_code_html" role="tabpanel">
                                    <div class="example-highlight">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: Example Code-->

                </div>
            </div>
        </div>
    </div>


{{-- <div class="row">



    <div class="col-xl-12">
        <div class="card card-custom gutter-b">
            <div class="card-header card-header-tabs-line">

                <div class="dropdown dropdown-inline mr-2 mt-5">

                </div>

            </div>
            <div class="card-body">
                <form action="post" class="form" id="tenant_addSoa_form">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Statement of Account Number</label>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="lessor">
                                <input class="form-control" id="statement_of_account" type="text" name="statement_of_account_number">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Statement Date</label>
                        <div class="col-lg-8 col-md-9 col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control" name="statement_date" placeholder="Select date" id='statementDate' />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-check-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Rental Period</label>
                        <div class="col-lg-8 col-md-9 col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control" name="rental_period" placeholder="Select date" id='rentalPeriodStart' />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-check-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Payment Due Date</label>
                        <div class="col-lg-8 col-md-9 col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control" name="payment_due_date" placeholder="Select date" id='paymentDue' />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-check-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Attachments</label>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="file-loading">
                                <input id="attachments" name="soaAttachments[]" type="file" multiple data-show-preview="false">
                            </div>
                            <div class="fv-plugins-message-container">
                                <div data-field="soaAttachments" data-validator="attachments" id="attachment_error" class="fv-help-block">

                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div> --}}
@endsection
