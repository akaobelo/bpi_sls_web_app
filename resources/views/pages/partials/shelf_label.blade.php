<style>
   .container {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
    }

    @media (min-width: 768px) {
    .container {
        width: 750px;
    }
    }

    @media (min-width: 992px) {
    .container {
        width: 970px;
    }
    }

    @media (min-width: 1200px) {
    .container {
        width: 1170px;
    }
    }

    .container .col p {
    padding: .25rem .75rem;
    }


    /* 2 columns (600px) */

    @media only screen and (min-width:600px) {
    .container .col {
        float: left;
        width: 50%;
    }
    }


    /* 3 columns (768px) */

    @media only screen and (min-width:768px) {
    .container .col {
        width: 33.333%;
    }
    }


    /* 4 columns (992px) */

    @media only screen and (min-width:992px) {
        .container .col {
            width: 25%;
        }
    }

    .adjust-logo {
        width: 50%;
        padding-top:5%;
    }

</style>

@for ($i = 0; $i <= (int)$data['quantity']-1; $i++)
<div class="container">
    <div class="col">
        <div class="modal-header" style="justify-content: center;">
            <img alt="Logo" src="{{asset('/assets/images/shelf.png')}}" class="logo adjust-logo" />
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
            <div class="text-center">{!! DNS1D::getBarcodeHTML($data['sku'], 'UPCA',1,50) !!}</div>

            <div id="btn_print_container">

            </div>
        </div>
    </div>
  </div>
@endfor



