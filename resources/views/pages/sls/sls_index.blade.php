@extends('pages.index')

@section('content')
<div class="container">
    <form class="form" id="kt_form">
        <div class="card card-custom gutter-b">
            <div class="card-body">

                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label>BU</label>
                            <div class="input-group">
                                <select autocomplete="off" class="form-control form-control-solid form-control-md" name="business_unit" id="business_unit">
                                    @foreach($businessUnits as $businessUnit)
                                        <option value="{{$businessUnit->id}}">{{$businessUnit->business_unit}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label>Store</label>
                            <div class="input-group">
                                <select autocomplete="off" class="form-control form-control-solid form-control-md " name="type" id="store">

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label>Store Code</label>
                            <div class="input-group">
                                <select autocomplete="off" class="form-control form-control-solid form-control-md " name="type" id="store_code">

                                </select>
                            </div>
                        </div>
                    </div>

                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Sku/Barcode</label>
                        <input type="" class="form-control" name="sku" id="sku">
                    </div>
                    <div class="col-lg-6">
                        <label>Quantity</label>
                        <input type="" class="form-control" name="quantity" name="ven_no" id="ven_no">
                    </div>
                </div>

                <div class="form-group row" id="static_row">
                    <div class="col-lg-6">
                        <label>Type</label>
                        <div class="input-group">
                            <select autocomplete="off" class="form-control form-control-solid form-control-md" name="type" id="type">
                                <option value="1">Shelf label</option>
                                <option value="2">Signage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label>Price</label>
                        <input type="email" class="form-control" name="price" id="price" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-12">
                        <label>Description</label>
                        <input type="email" class="form-control" name="short_descr" id="short_descr" disabled>
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-lg-4">
                        <label>Color</label>
                        <input type="email" class="form-control" name="color" id="color">
                    </div>

                    <div class="col-lg-4">
                        <label>Material</label>
                        <input type="email" class="form-control" name="material" id="material">
                    </div>
                    <div class="col-lg-4">
                        <label>Size</label>
                        <input type="email" class="form-control" name="size" id="size">
                    </div>
                </div>

                <div class="form-group row" id="shelf_container">
                    <div class="col-lg-12">
                        <label>Product Specifications</label>
                        <input id="kt_tagify_1" class="form-control tagify" name='tags' placeholder='type...' v autofocus="" data-blacklist='' />
                        <div class="mt-3">
                            <a href="javascript:;" id="kt_tagify_1_remove" class="btn btn-sm btn-light-primary font-weight-bold">Remove tags</a>
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
                <!-- end: Example Code-->

                <div class="form-group row">
                    <div class="col-lg-4">

                    </div>
                    <div class="col-lg-2">

                    </div>
                    <div class="col-lg-2">
                        <label></label>
                        <button type="button" class="form-control btn btn-primary font-weight-bold">Print Preview</button>
                    </div>
                    <div class="col-lg-2">
                        <label></label>
                        <button type="button" class="form-control btn btn-primary font-weight-bold">Edit</button>
                    </div>
                    <div class="col-lg-2">
                        <label></label>
                        <button type="button" id="btn_clear" class="form-control btn btn-primary font-weight-bold">Clear</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('/js/pages/sls/sls_index.js')}}"></script>
@endpush



