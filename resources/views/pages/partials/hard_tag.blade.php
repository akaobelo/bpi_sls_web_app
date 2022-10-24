<style>
    html {
        background-color:black;
    }
    .description {
        font-size: 8px;
    }
    .mark_down_size {
        width: 321.25984252px;
        height: 120.9448818912px;
    }

    .left_below_description {
        font-size: 8px;
    }

    .right_below_description {
        font-size: 8px;
        margin-right:2%;
    }

    .description_container {
        padding-left: 5%;
        padding-right: 5%;
    }

    .adjust-logo {
        width: 80%;

    }

    .font-customize {
        font-weight: bold;
    }
    body {
        width: 371px;
        margin: auto;
        background-color:white;
    }

    .row {
        width: 100%;
        text-align: center;
    }
    .block {
        display: inline-block;
        text-align: center;
        width: 120.94488189px;
        height: 120.94488189px;
        margin-bottom:-5px;
        margin-top:5px;
    }
    .text-center {
        padding-left:8%;
    }
    .sku {
        font-size:8px;
        letter-spacing: 1px;
        text-align:center;
        margin-right:5px;

    }
    .before_price {
        font-size:7px;
    }

</style>

@for ($i = 0; $i <= (int)$data['quantity']-1; $i++)
<div class="block">
    <div class="col-md-4">
            @if($data['store_code'] === '1')
                <img src="{{public_path('assets/images/new_g_store.png')}}"  class="logo adjust-logo">
            @else
                <img src="{{public_path('assets/images/new_g_market.png')}}"  class="logo adjust-logo">
            @endif

            {{-- <img src="{{asset('assets/images/mark-down.png')}}"  class="logo adjust-logo"> --}}
            <div class="description_container">
            <span class="description font-weight-bold">{{$data['short_descr']}}</span>
            <div class="text-center">{!! DNS1D::getBarcodeHTML($data['sku'], 'UPCA',1,40) !!}</div>
            <div class="text-center sku">{{$data['upc']}}</div>
        </div>
        <div class="left_below_description">

            @if($data['type'] == 2 || $data['type'] == 4)
            <span style="margin-right:20%;">
                {{$data['receivedDate']}}
            </span>
            <span class="font-customize">NOW: {{$data['after_price']}}</span>
            @else
            <span style="margin-right:50%;">
                {{$data['receivedDate']}}
            </span>
            <span class="font-customize">{{$data['price']}}</span>
            @endif
        </div>
        <div class="right_below_description">
            <span>
                {{$data['barcode_vendor']}}
            </span>
            @if($data['type'] ==  2 || $data['type'] == 4)
                <span class="before_price" style="margin-left:7px;">
                    BEFORE: {{$data['price']}}
                </span>
            @else
                <span style="margin-left:45%;">
                    {{$data['ven_no'] ? $data['ven_no'] : 'Stock No.'}}
                </span>
            @endif
        </div>
    </div>
</div>
@endfor



