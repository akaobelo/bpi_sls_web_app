<style>

    .description {
        font-size: 9px;
        width:50%;
    }
    .mark_down_size {
        width: 113.38582677px;
        height: 94.488188976px;
    }

    .left_below_description {
        font-size: 9px;
    }

    .right_below_description {
        font-size: 9px;
    }

    .description_container {
        padding-left: 5%;
        padding-right: 5%;
    }

    .adjust-logo {
        width: 40%;
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

</style>

@for ($i = 0; $i <= (int)$data['quantity']-1; $i++)
<div class="block">
    <div class="col-md-4">
        <img src="{{public_path('assets/images/mark-down.png')}}"  class="logo adjust-logo">
            {{-- <img src="{{asset('assets/images/mark-down.png')}}"  class="logo adjust-logo"> --}}
        <div class="description_container">
            <span class="description font-weight-bold">{{$data['short_descr']}}</span>
            <div class="text-center">{!! DNS1D::getBarcodeHTML($data['sku'], 'UPCA',1,35) !!}</div>
        </div>
        <div class="left_below_description">
            <span style="margin-right:15%;">
                {{$data['receivedDate']}}
            </span>
            <span>
                <span class="font-customize">{{$data['price']}}</span>
            </span>
        </div>
        <div class="right_below_description">
            <span style="margin-right:35%;">
                {{$data['barcode_vendor']}}
            </span>
            <span>
                {{$data['ven_no'] ? $data['ven_no'] : 'Stock No.'}}
            </span>
        </div>
    </div>
</div>
@endfor



