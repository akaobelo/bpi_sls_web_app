<style>

    .description {
        font-size: 8px;
        width:50%;
    }
    .mark_down_size {
        width: 113.38582677px;
        height: 94.488188976px;
    }

    .left_below_description {
        font-size: 8px;
    }

    .right_below_description {
        font-size: 7px;
    }

    .description_container {
        padding-left: 5%;
        padding-right: 5%;
    }

    .adjust-logo {
        width: 70%;
        padding-top:5%;
    }

    .font-customize {
        font-weight: bold;
    }

    body {
          width:390px;
          justify-content: center;
    }

    .row {
        /* width:100%;
        height: 100%; */
        text-align: center;
    }
    .block {
        display: inline-block;
        text-align: center;
        width: 113.39px;
        height: 94.49px;
        /* Sticker Tag Settings */
        margin-bottom:15px;
    }
    .text-center {
        padding-left:6%;
    }


    .sku {
        font-size:8px;
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
            <div class="text-center">{!! DNS1D::getBarcodeHTML($data['sku'], 'UPCA',1,30) !!}</div>
            <div class="text-center sku">{{$data['sku']}}</div>
        </div>
        <div class="left_below_description">
            <span style="margin-right:25%;">
                {{$data['receivedDate']}}
            </span>
            <span class="font-customize">NOW: {{$data['after_price']}}</span>

        </div>
        <div class="right_below_description">
            <span>
                {{$data['barcode_vendor']}}
            </span>
                <span style="margin-left:5px;">
                    BEFORE: {{$data['price']}}
                </span>
        </div>
    </div>
</div>
@endfor



