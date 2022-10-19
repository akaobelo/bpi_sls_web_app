<style>
    .container {
         padding-right: 50px;
         width: 816px;
         height: 1056px;
     }
     .header {
         text-align: center;
     }
     .body {
         padding-left:5%;
         margin-bottom: 5%;
         padding-right:5%;
     }

     body {
        background-color: white;
         width: 816px;
         height: 1056px;
         margin:auto;
         align-items:center;
     }

     body div {
         margin-bottom: 4%;
         display: inline-block;
     }

     body div a {
         color:#808080;
     }

     .body-description {
         font-weight: 700;
         font-size: 35px;
         color:black;
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
         /* padding-top:2%; */
     }

     hr.solid {
         border-top: 1px solid #bbb;
     }

     hr.dotted {
         border-top: 1px dotted #bbb;
         margin-top:-5%;
     }

     .font-style {
         font-size: 50px;
     }
     .custom-font-text {
        font-size: 30px;
        color:brown;
        font-family: 'MetropolisNF', sans-serif;
     }
     .price_field {
        height:80px;
        font-size:50px;
        width:735px;
        background-color:#B9B7BD;
        text-align:center;
        font-family: Verdana, Tahoma, "DejaVu Sans", sans-serif;
     }
     .sale_price_field{
        height:90px;
        font-size:70px;
        width:735px;
        padding-bottom:10px;
        background-color:#B9B7BD;
        text-align:center;
        font-family: Verdana, Tahoma, "DejaVu Sans", sans-serif;
     }

 </style>
 @for ($i = 0; $i <= (int)$data['quantity']-1; $i++)
     <div class="container">
         <div class="header">
         <img src="{{public_path('assets/images/shelf.png')}}"  class="logo">
         {{-- <img alt="Logo" src="{{asset('/assets/images/shelf.png')}}" class="logo" /> --}}
         <hr class="solid">
         <h1 style="font-family: 'MetropolisNF', sans-serif;">{{$data['short_descr']}}</h1>
         </div>
         <div class="body">
             <div>
                 <span class="body-description">Color:</span>
                 <a class="custom-font-text">{{$data['color']}}</a>
             </div>

             <div>
                 <span class="body-description">Material:</span>
                 <a class="custom-font-text">{{$data['material']}}</a>
             </div>
             <div>
                 <span class="body-description">Size:</span>
                 <a class="custom-font-text">{{$data['size']}}</a>
             </div>
             <br>
             <div>
                 <label style="color: red;" class="body-description">Price:</label>
                 <div class="price_field">₱{{$data['price']}}</div>
             </div>
             <br>
             <div>
                <label style="color: red;" class="body-description">Sale Price:</label>

                <div class="sale_price_field">₱{{$data['sale_price']}}</div>
            </div>
         </div>

         <hr class="dotted">
         <div class="footer">
             {!! DNS1D::getBarcodeHTML($data['sku'], 'UPCA',7,140) !!}
             <span class="font-style">{{$data['upc']}}</span>
         </div>
     </div>
 @endfor


