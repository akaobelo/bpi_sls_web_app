<div class="modal fade" id="print_preview_btn" tabindex="-1" role="dialog" aria-labelledby="print_preview_btn" aria-hidden="true">
    <div id="modal_size" class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header" style="justify-content: center;">
                <img alt="Logo" src="{{asset('/assets/images/shelf.png')}}" class="max-h-35px" />
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="col-md-12" style="text-align: center;">
                        <h3 id="modal-description">BOOK SHELF LARGE</h3>
                    </div>
                </div>
                <div class="form-group">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2">Color:</span>
                        <a href="#" class="text-muted text-hover-primary text-wrap color"  style="width: 15rem;"></a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2">Material:</span>
                        <a href="#" class="text-muted text-hover-primary text-wrap material" style="width: 15rem;"></a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2">Size:</span>
                        <a href="#" class="text-muted text-hover-primary text-wrap size" style="width: 15rem;"></a>
                    </div>
                </div>
                <div class="form-group" id="shelf_container_print">
                    <div class="d-flex align-items-center justify-content-between mb-2" style="width: 15rem;">
                        <span class="font-weight-bold mr-2">Product Specification:</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2" style="width: 15rem;">
                        <div id="product_specification" class="ml-1">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="font-weight-bold text-primary">Price:</label>
                        <input type="" class="form-control price" style="height:50px;font-size:35px;text-align:center;" disabled>
                    </div>

                    <div class="col-md-12" id="sale_price_container" hidden>
                        <label class="font-weight-bold text-primary">Sale Price:</label>
                        <input type="" class="form-control sale_price" style="height:50px;font-size:50px;text-align:center;" disabled>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <svg id="barcode"></svg>

                <div id="btn_print_container">

                </div>
            </div>
        </div>
    </div>
</div>
