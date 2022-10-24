<style>
    .container {
         width: 816px;
         height: 1056px;
         background-color:white;
     }
     .header {
         text-align: center;
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
     }

     body div a {
         color:#808080;
     }

     .body-description {
         font-weight: 700;
         font-size: 50px;
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

        font-family: Verdana, Tahoma, "DejaVu Sans", sans-serif, 'MetropolisNF', sans-serif;
        background-color:#88878a;
        font-size:120px;
        width:800px;
        border:solid;
        font-style: bold;
        padding: 10px;
        text-align: center;
        word-break: break-all; /* optional */
     }
     .sale_price_field{
        font-family: Verdana, Tahoma, "DejaVu Sans", sans-serif, 'MetropolisNF', sans-serif;
        background-color:#88878a;
        font-size:140px;
        border: solid;
        display: inline-block;
        width:800px;
        padding: 10px;
        font-style: bold;
        text-align: center;
        word-break: break-all; /* optional */
     }
     .header-sale{
        font-family: 'MetropolisNF', sans-serif;
        font-size:140px;
        margin-bottom:10px;
        margin-top:-10px;
        margin-left:50px;
        color:red;
        letter-spacing: 50px;
        text-align: center!important;
     }

     .short_description {
        font-family: 'MetropolisNF', sans-serif;
        font-size:70px;
     }

 </style>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 @for ($i = 0; $i <= (int)$data['quantity']-1; $i++)
     <div class="container">
         <div class="header">
           <h1 class="header-sale">SALE</h1>
         <hr class="solid">
         <h1 class="short_description">{{$data['short_descr']}}</h1>
         </div>
         <div class="body">
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
     </div>
 @endfor



