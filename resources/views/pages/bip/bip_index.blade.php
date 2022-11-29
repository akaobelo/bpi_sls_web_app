@extends('pages.index')

<style>
.flex-container {
  display: flex;
}
.center-container-element {
   margin-left:auto;
   margin-right:auto;
   display:block;
}

.align-text-elements-left {
    padding-left:10% !important;
}

.align-text-elements-right {
    padding-left:15% !important;
}

#barcode_receivedDate {
    padding-right:32px;
}

.custom_default_font{
    font-weight: bold;
    font-size: large;
}
.custom_markdown_font{
    font-size: 15px;
    font-weight: bold;
}
.align-text-elements-right-markdown {
    padding-left:40px;
}

</style>

@section('content')
<div class="container">
    <form class="form" id="kt_form">
        <div class="card card-custom gutter-b">
            <div class="card-body">
                <div class="form-group row">

                    <div class="col-lg-4">
                        <label>Store</label>
                        <div class="input-group">
                            <select autocomplete="off" class="form-control form-control-solid form-control-md sl2" name="store" id="store" autofocus>

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label>Store Code</label>
                        <div class="input-group">
                            <select autocomplete="off" class="form-control form-control-solid form-control-md sl2" name="store_code" id="store_code" disabled>

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label>Date Received</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="receivedDate" placeholder="Date" id='receivedDate' />
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4">
                        <label>Sku/Barcode</label>
                        <input type="" class="form-control" name="sku" id="sku">
                    </div>
                    <div class="col-lg-4">
                        <label>Quantity</label>
                        <input type="" class="form-control" name="quantity" name="quantity" id="quantity">
                    </div>
                    <div class="col-lg-4">
                        <label>Type</label>
                        <div class="input-group">
                            <select autocomplete="off" class="form-control form-control-solid form-control-md" name="type" id="type">
                                <option value="1">Hard Tag</option>
                                <option value="2">Hard Tag Markdown</option>
                                <option value="3">Sticker Tag (Ballpen)</option>
                                <option value="4">Sticker Tag Markdown</option>
                                <option value="5">Shelf Tag</option>
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
                        <button type="button" id="btn_clear" class="form-control btn btn-primary font-weight-bold">Clear</button>
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
                        <input type="email" style="background-color:#EBEBE4;" class="form-control" name="short_descr" id="short_descr">
                    </div>
                    <div class="col-lg-4">
                        <label>BUM</label>
                        <input  type="email" style="background-color:#EBEBE4;" class="form-control" name="buy_unit" id="buy_unit">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-4">
                        <label>Stock No.</label>
                        <input  type="email" class="form-control" style="background-color:#EBEBE4;" name="ven_no" id="ven_no">
                    </div>
                    <div class="col-lg-4">
                        <label>Price</label>
                        <input type="email" class="form-control" style="background-color:#EBEBE4;" name="price" id="price">
                    </div>
                    <div class="col-lg-4" id="after_price_field">
                        <label>After Price</label>
                        <input type="email" class="form-control" style="background-color:#EBEBE4;" name="after_price" id="after_price">
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
                        <button id="print_preview" type="button" class="form-control btn btn-primary font-weight-bold">Data Preview</button>
                    </div>

                    <div class="col-lg-2">
                        <label></label>
                        <button id="print_data" type="button" class="form-control btn btn-primary font-weight-bold">Print</button>
                        {{-- <div id="btn_print_container">

                        </div> --}}
                    </div>
                    <div class="col-lg-2">
                        <label></label>
                        <button type="button" id="editBtn" class="form-control btn btn-primary font-weight-bold">Edit</button>
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
            <div class="form-group row" id="default_print_view">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label class="center-container-element" id="short_description"></label>
                        <svg class="center-container-element" id="barcode"></svg>
                        <div class="col-lg-5 align-text-elements-left">
                            <label  id="barcode_receivedDate" ></label>
                            <label  id="barcode_vendor" ></label>
                        </div>
                        <div class="col-lg-2">
                        </div>
                        <div class="col-lg-5 align-text-elements-right default_view">
                                <div><span class="custom_default_font" id="bracode_price"></span></div>
                                <label id="barcode_vendor_no"></label>
                        </div>
                        <div class="col-lg-5 markdown_view align-text-elements-right-markdown" hidden>
                                <div class="custom_markdown_font">NOW: <span class="custom_markdown_font" id="markdown_now_price"></span></div>
                                <div>BEFORE: <span id="markdown_before_price"></span></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('/js/pages/bip/bip_index.js')}}"></script>
@endpush

