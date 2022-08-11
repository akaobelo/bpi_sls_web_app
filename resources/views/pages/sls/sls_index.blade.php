@extends('pages.index')

@section('content')
<div class="col-lg-12">
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">SLS</h3>
            </div>
            <!--begin::Form-->
            <form class="form">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-right">Full Name:</label>
                        <div class="col-lg-3">
                            <input type="email" class="form-control" placeholder="Enter full name" />
                            <span class="form-text text-muted">Please enter your full name</span>
                        </div>
                        <label class="col-lg-2 col-form-label text-right">Contact Number:</label>
                        <div class="col-lg-3">
                            <input type="email" class="form-control" placeholder="Enter contact number" />
                            <span class="form-text text-muted">Please enter your contact number</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-right">Address:</label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter your address" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-map-marker"></i>
                                    </span>
                                </div>
                            </div>
                            <span class="form-text text-muted">Please enter your address</span>
                        </div>
                        <label class="col-lg-2 col-form-label text-right">Postcode:</label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter your postcode" />
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
                        <label class="col-lg-2 col-form-label text-right">Group:</label>
                        <div class="col-lg-3">
                            <div class="radio-inline">
                                <label class="radio radio-solid">
                                <input type="radio" name="example_2" checked="checked" value="2" />Sales Person
                                <span></span></label>
                                <label class="radio radio-solid">
                                <input type="radio" name="example_2" value="2" />Customer
                                <span></span></label>
                            </div>
                            <span class="form-text text-muted">Please select user group</span>
                        </div>
                    </div>
                    <!-- begin: Example Code-->
                    <div class="example-code mt-10">
                        <ul class="example-nav nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-2x">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#example_code_html_2">HTML</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="example_code_html_2" role="tabpanel">
                                <div class="example-highlight">
                                    <pre style="height:400px">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end: Example Code-->
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-10">
                            <button type="reset" class="btn btn-success mr-2">Submit</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
    <!--end::Content-->
</div>
@endsection
