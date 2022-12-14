<style>
    html {
        background-color:black;
    }
    .container {
         /* width: 816px;
         height: 1056px; */
     }
     .header {
         text-align: center;
     }

     body {
        background-color: white;
         width: 1800px;
         height: 1200;
         margin:auto;
         align-items:center;
         border: solid;

     }

     /* body div {
         margin-bottom: 4%;
     } */

     body div a {
         color:#808080;
     }

     .body-description {
         font-weight: 700;
         font-size: 50px;
         text-align:center;
        font-family: 'MetropolisNF', sans-serif;
     }

     .body-description a{
         font-size: 30px;
     }

     .footer {
         width:100%;
         text-align: center;
     }
     .footer div {
         margin-left:0%;
     }

     .logo {
         width: 100%;
     }

     .font-style {
         font-size: 50px;
     }

     .price_field {
        /* font-family: Arial, Helvetica, Verdana, Tahoma, "DejaVu Sans", sans-serif; */
        font-family: Verdana, Tahoma, "DejaVu Sans", sans-serif;
        font-size:120px;
        width:800px;
        font-weight: 80px;
        text-align: center;
        word-break: break-all; /* optional */
     }
     .sale_price_field_length_six{
        /* font-family: Arial, Helvetica, Verdana, Tahoma, "DejaVu Sans", sans-serif; */
        font-family: Verdana, Tahoma, "DejaVu Sans", sans-serif;
        font-size:200px;
        display: inline-block;
        text-align: center;
        font-weight: bold;
        color:#d12338;
        word-break: break-all; /* optional */
     }

     .sale_price_field_six_digit {
        /* font-family: Arial, Helvetica, Verdana, Tahoma, "DejaVu Sans", sans-serif; */
        font-family: Verdana, Tahoma, "DejaVu Sans", sans-serif;
        font-size:170px;
        display: inline-block;
        text-align: center;
        font-weight: bold;
        color:#d12338;
        word-break: break-all; /* optional */
     }

     .sale_price_field_higher_length{
        /* font-family: Arial, Helvetica, Verdana, Tahoma, "DejaVu Sans", sans-serif; */
        font-family: Verdana, Tahoma, "DejaVu Sans", sans-serif;
        font-size:180px;
        display: inline-block;
        text-align: center;
        font-weight: bold;
        color:#d12338;
        word-break: break-all; /* optional */
     }

     .sale_price_field_length_six{
        /* font-family: Arial, Helvetica, Verdana, Tahoma, "DejaVu Sans", sans-serif; */
        font-family: Verdana, Tahoma, "DejaVu Sans", sans-serif;
        font-size:200px;
        display: inline-block;
        text-align: center;
        font-weight: bold;
        color:#d12338;
        word-break: break-all; /* optional */
     }

     .sale_price_field_sale{
        /* font-family: Arial, Helvetica, Verdana, Tahoma, "DejaVu Sans", sans-serif; */
        font-family: Verdana, Tahoma, "DejaVu Sans", sans-serif;
        font-size:320px;
        display: inline-block;
        text-align: center;
        font-weight: bold;
        overflow-wrap: break-word;
         /* optional */
        white-space: normal;
     }
     .header-description{
        font-family: Arial, Helvetica, sans-serif;
        font-size:125px;
        font-weight: bolder;
        margin-top:0px;
        color:black;
        letter-spacing: 50px;
        background-color: #d12338;
     }
     .header-description_sale{
        font-family: Arial, Helvetica, sans-serif;
        font-size:140px;
        font-weight: bolder;
        margin-top:0px;
        color:black;
        letter-spacing: 50px;
        background-color: #d12338;
     }
     .short_description {
        font-family: 'MetropolisNF', sans-serif;
        font-size:70px;
     }



    .now_label{
        color: #d12338;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 250px;
    }

    .regular_label{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 90px;
        font-weight: 80px;
    }

    .now_price{
        text-align: center;
        margin-left:20em;
        margin-top:-100px;
    }

    .now_price_sale{
        text-align: center;
        margin-top:100px;
    }


    .regular_price {
        width: 840px;
        text-align:center;
    }
 </style>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">

 @for ($i = 0; $i <= (int)$data['quantity']-1; $i++)
    @if($data['signageOption']  == 'true')
        <div class="container" id="regular_container">
            <div class="header">
            <h1 class="header-description">{{$data['short_descr']}}</h1>
            </div>
            <div class="body">
                <div class="regular_price">
                    <label class="regular_label">REGULAR PRICE</label>
                    <span class="price_field">???{{$data['price']}}</span>
                </div>
                <div class="now_price">
                    <label class="now_label">NOW</label>
                    {{-- {{dd(strlen($data['sale_price']))}} --}}
                    {{-- @if(strlen($data['sale_price'] === 10))
                    {{dd('1')}}
                        <p><span class="sale_price_field_six_digit">???{{$data['sale_price']}}</span></p> --}}

                    @if(strlen($data['sale_price']) === 6)
                        <p><span class="sale_price_field_length_six">???{{$data['sale_price']}}</span></p>
                    @elseif(strlen($data['sale_price']) === 10)
                        <p><span class="sale_price_field_six_digit">???{{$data['sale_price']}}</span></p>
                    @else
                        <p><span class="sale_price_field_higher_length">???{{$data['sale_price']}}</span></p>
                    @endif



                    {{-- @else
                    {{dd('3')}} --}}



                </div>
            </div>
        </div>
    @else
        <div class="container" id="sale_container" hidden>
            <div class="header">
            <h1 class="header-description_sale">{{$data['short_descr']}}</h1>
            </div>
            <div class="body">
                <div class="now_price_sale">
                   <span class="sale_price_field_sale">???{{$data['price']}}</span>
                </div>
            </div>
        </div>
    @endif

 @endfor



