<style>

    .description {
        font-size: 15px;
        float:left;
    }

    .left_below_description {
        font-size: 13px;
        float:left;
    }

    .description_container {
        padding: 5% 5% 5% 5%
    }
    .font-customize {
        font-weight: bold;
        display: inline-block;
    }
    body {
        width: 321.25984252px;
        margin: auto;
    }
    .block {
        display: inline-block;
        text-align: center;
        width: 321.25984252px;
        height: 120.94488189px;
        margin: auto;
    }

    {
        box-sizing: border-box;
    }
    /* Set additional styling options for the columns*/
    .column {
    float: left;
    width: 50%;
    }

    .column_right {
    float: left;
    width: 50%;
    padding-top:5%;
    }

    .row:after {
    content: "";
    display: table;
    clear: both;
    }

</style>

@for ($i = 0; $i <= (int)$data['quantity']-1; $i++)
<div class="block">
    <div class="col-md-4">
        <div class="description_container">
            <span class="description font-weight-bold">{{$data['short_descr']}}</span>
            <div class="row">
                <div class="column">
                    {!! DNS1D::getBarcodeHTML($data['sku'], 'UPCA',2,45) !!}
                </div>
                <div class="column_right">
                    <span class="font-customize">{{$data['price']}}</span>
                </div>
            </div>
            <div class="left_below_description">
                <span>{{$data['barcode_vendor']}}</span>
            </div>
        </div>
    </div>
</div>
@endfor



