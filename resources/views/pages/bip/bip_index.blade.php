@extends('pages.index')

@section('content')
<div class="container">
    <form class="form" id="kt_form">
        <div class="card card-custom gutter-b">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>BU</label>
                        <div class="input-group">
                            <select autocomplete="off" class="form-control form-control-solid form-control-md" name="business_unit" id="business_unit">
                                @foreach($stores as $store)
                                    <option >{{$store->business_unit}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label>Store</label>
                        <div class="input-group">
                            <select autocomplete="off" class="form-control form-control-solid form-control-md" name="type" id="type">
                                @foreach($stores as $store)
                                    <option>{{$store->store}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Store Code</label>
                        <div class="input-group">
                            <select autocomplete="off" class="form-control form-control-solid form-control-md" name="type" id="type">
                                @foreach($stores as $store)
                                    <option>{{$store->store_code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label>Date Received</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="received_date" placeholder="Select date" id='receivedDate' />
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-calendar-check-o"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-4">
                        <label>Sku/Barcode</label>
                        <input type="email" class="form-control">
                    </div>
                    <div class="col-lg-4">
                        <label>Quantity</label>
                        <input type="email" class="form-control">
                    </div>
                    <div class="col-lg-4">
                        <label>Type</label>
                        <div class="input-group">
                            <select autocomplete="off" class="form-control form-control-solid form-control-md" name="type" id="type">

                            </select>
                        </div>
                    </div>
                </div>


                <!-- begin: Example Code-->
                <div class="example-code mt-10">
                    <ul class="example-nav nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-2x">
                        <li class="nav-item">
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="example_code_html" role="tabpanel">
                            <div class="example-highlight">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-8">


                    </div>
                    <div class="col-lg-2">

                    </div>
                    <div class="col-lg-2">
                        <label></label>
                        <button type="button" class="form-control btn btn-primary font-weight-bold">Clear</button>
                    </div>
                </div>
                <!-- end: Example Code-->


            </div>
        </div>

        <div class="card card-custom gutter-b">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-8">
                        <label>Description</label>
                        <input type="email" class="form-control" disabled>
                    </div>
                    <div class="col-lg-4">
                        <label>BUM</label>
                        <input type="email" class="form-control" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-4">
                        <label>Stock No.</label>
                        <input type="email" class="form-control" disabled>
                    </div>
                    <div class="col-lg-4">
                        <label>Price</label>
                        <input type="email" class="form-control" disabled>
                    </div>
                    <div class="col-lg-4">
                        <label>After Price</label>
                        <input type="email" class="form-control" disabled>
                    </div>
                </div>

                <!-- begin: Example Code-->
                <div class="example-code mt-10">
                    <ul class="example-nav nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-2x">
                        <li class="nav-item">
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="example_code_html" role="tabpanel">
                            <div class="example-highlight">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-6">

                    </div>
                    <div class="col-lg-2">
                        <label></label>
                        <button type="button" class="form-control btn btn-primary font-weight-bold">Print Preview</button>
                    </div>
                    <div class="col-lg-2">
                        <label></label>
                        <button type="button" class="form-control btn btn-primary font-weight-bold">Print</button>
                    </div>
                    <div class="col-lg-2">
                        <label></label>
                        <button type="button" class="form-control btn btn-primary font-weight-bold">Edit</button>
                    </div>
                </div>
                <!-- end: Example Code-->

                <!-- begin: Example Code-->
                <div class="example-code mt-10">
                    <ul class="example-nav nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-2x">
                        <li class="nav-item">
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="example_code_html" role="tabpanel">
                            <div class="example-highlight">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('/js/pages/bip/bip_index.js')}}"></script>
@endpush

