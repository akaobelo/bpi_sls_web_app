<style>

    .description {
        font-size: 8px;
    }
    .mark_down_size {
        width: 113.38582677px;
        height: 47.244094488px;
    }

    .upper_description {
        font-size: 9px;
        /* margin-right: 20%; */
    }

    .description_container {
        padding-left: 5%;
        padding-right: 5%;
    }

    .adjust-logo {
        width: 30%;
    }

    .font-customize {
        font-weight: bold;
        font-size: 10px;
    }
    body {
        width: 371px;
        margin: auto;
    }
    .block {
        display: inline-block;
        text-align: center;
        width: 113.38582677px;
        height: 47.244094488px;
        margin: auto;
    }
    .text-center {
        padding-left:6%;
    }

</style>

@for ($i = 0; $i <= (int)$data['quantity']-1; $i++)
<div class="block">
    <div class="col-md-4">
        {{--<img src="{{public_path('assets/images/mark-down.png')}}"  class="logo adjust-logo"> --}}
        <div class="upper_description">
            <img src="{{asset('assets/images/mark-down.png')}}"  class="adjust-logo">
            <span class="font-customize">{{$data['price']}}</span>
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



