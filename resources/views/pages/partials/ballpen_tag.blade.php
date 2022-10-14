<style>

    .description {
        font-size: 8px;
    }
    .mark_down_size {
        width: 113.38582677px;
        height: 47.244094488px;
    }

    .description_container {
        padding-left: 5%;
        padding-right: 5%;
    }

    .adjust-logo {
        /* orginal setting */
        /* width: 30%; */
        width: 35%;
        padding-right:20%;
    }

    .font-customize {
        font-weight: bold;
        font-size: 9px;
    }
    body {
        width: 390px;
        justify-content: center;
    }
    .block {
        display: inline-block;
        text-align: center;
        width: 113.38582677px;
        height: 47.244094488px;
        /* Sticker Tag Settings */
        margin-bottom:5px;
        margin-left:5px;
    }
    .text-center {
        padding-left:6%;
    }

</style>

@for ($i = 0; $i <= (int)$data['quantity']-1; $i++)
<div class="block">
    <div class="col-md-4">
        <div>
            <img src="{{public_path('assets/images/mark-down.png')}}"  class="adjust-logo">
            {{-- <img src="{{asset('assets/images/mark-down.png')}}"  class="adjust-logo"> --}}
            <label class="font-customize">{{$data['price']}}</label>
        </div>
        <div class="description_container">
            <span class="description font-weight-bold">{{$data['short_descr']}}</span>
            <div class="text-center">{!! DNS1D::getBarcodeHTML($data['sku'], 'UPCA',1,15) !!}</div>
        </div>
        <div class="text-center description">
            <span>
                {{$data['barcode_vendor']}}
            </span>

        </div>
    </div>
</div>
@endfor



