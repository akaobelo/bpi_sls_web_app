<style>
   .container {
        /* padding-right: 15px;
        padding-left: 15px; */
        /* margin-right: auto;
        margin-left: auto; */
        padding-right: 20px;
        padding-left: 15px;
        width: 288px;
        height: 420px;
        margin-bottom:-15%;
        margin-top:15%;
        border-style:solid;
        /* position: relative; */
    }
    .header {
        text-align: center;
    }
    .body {
        padding-left:5%;
        padding-right:5%;
    }

        body {
            width: 816px;
        height: 1056px;
        margin:auto;
    }

    body div {
        /* margin-bottom: 2%; */
        display: inline-block;
    }

    body div a {
        font-family: 'MetropolisNF', sans-serif;
        color:brown;
    }

    .body-description {
        font-weight: 700;
        font-size: 15px;
        font-family: 'MetropolisNF', sans-serif;
    }

    .body-description a{
        font-size: 12px;
        font-family: 'MetropolisNF', sans-serif;
    }

    .footer {
        width:100%;
        text-align: center;
    }

    .logo {
        width: 100%;
        /* original setting */
    }

    hr.solid {
        border-top: 1px solid #bbb;
    }

    hr.dotted {
        border-top: 1px dotted #bbb;
    }

    input {
        border: 0;
        margin-top:5px;
    }

    .font-style {
        font-size: 20px;
    }
    .price_field {
        width:260px;
        height:50px;
        background-color:#B9B7BD;
        font-size:30px;
        text-align: center;
        font-family: Verdana, Tahoma, "DejaVu Sans", sans-serif;
    }
</style>
@for ($i = 0; $i <= (int)$data['quantity']-1; $i++)
    <div class="container">
        <div class="header">
        <img src="{{public_path('assets/images/shelf.png')}}" class="logo">
        {{-- <img alt="Logo" src="{{asset('/assets/images/shelf.png')}}" class="logo" /> --}}
        <hr class="solid">
        <h2 style="font-family: 'MetropolisNF', sans-serif;">{{$data['short_descr']}}</h2>
        </div>
        <div class="body">
            <div>
                <span class="body-description">Color:</span>
                <a>{{$data['color']}}</a>
            </div>
            <br>
            <div>
                <span class="body-description">Material:</span>
                <a class="font-weight-lighter">{{$data['material']}}</a>
            </div>
            <br>
            <div>
                <span class="body-description">Size:</span>
                <a>{{$data['size']}}</a>
            </div>
            <br>
            <div>
                <span class="body-description">Product Specification:</span>
            </div>
            <div>
                @if(empty($data['product_specification']))
                    <a></a>
                @else
                    @foreach(json_decode($data['product_specification']) as $val)
                        <a>{{$val->value}}</a>,
                    @endforeach
                @endif

            </div>
            <div>
                <label style="color: red;" class="body-description">Price:</label>
                <div class="price_field">₱<span>{{$data['price']}}</span></div>
            </div>
        </div>
        <hr class="dotted">
        <div class="footer">
            {!! DNS1D::getBarcodeHTML($data['upc'], 'EAN13',3,60) !!}
            <span class="font-style">{{$data['upc']}}</span>
        </div>
    </div>
@endfor


