<div class="modal fade" id="print_preview_btn" tabindex="-1" role="dialog" aria-labelledby="print_preview_btn" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header" style="justify-content: center;">
                <h1 class="pt-2">GAISANO</h1>
                <img alt="Logo" src="{{asset('/assets/images/G STORE.png')}}" class="max-h-25px" />
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8" style="text-align: center;">
                        <h6>BOOK SHELF LARGE</h6>
                    </div>
                    <div class="col-md-2">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="d-flex align-items-center justify-content-between mb-2 ">
                        <span class="font-weight-bold mr-2">Color:</span>
                        <a href="#" class="text-muted text-hover-primary text-wrap color"  style="width: 15rem;"></a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2 ">
                        <span class="font-weight-bold mr-2">Material:</span>
                        <a href="#" class="text-muted text-hover-primary text-wrap material" style="width: 15rem;"></a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2 ">
                        <span class="font-weight-bold mr-2">Size:</span>
                        <a href="#" class="text-muted text-hover-primary text-wrap size" style="width: 15rem;"></a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2" style="width: 15rem;">
                        <span class="font-weight-bold mr-2">Product Specification:</span>
                        <ul id="product_specification">
                        </ul>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2 ">

                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-2 ">
                        {{-- <span class="text-primary font-weight-bold mr-2">Price:</span> --}}
                        <ul id="product_specification">
                        </ul>
                    </div>

                </div>
                <div class="form-group row">
                    <div class="d-flex align-items-center justify-content-between">
                        <input type="" class="form-control price" disabled>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <svg id="barcode">barcode</svg>
                <label id="barcode_description" style="text-align: center;">

                </label>
            </div>
        </div>
    </div>
</div>
