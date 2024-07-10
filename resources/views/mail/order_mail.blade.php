<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Order Mail</title>
  </head>
  <body>
    <h1>Thanks for Your Order</h1>
<h2>Your order id: {{$productDetailsMail['order_id']}}</h2>
     <h1>Product</h1>
        @foreach ($productDetailsMail['orederDetails'] as  $orederDetail)
         
        <table class="table">
  <thead>
    <tr>
      <th scope="col">product</th>
      <th scope="col">imge</th>
      <th scope="col">price</th>
      <th scope="col">Qty</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{$orederDetail->product->title}}</th>
      <td>
     <img src="{{asset('storage/productimage/'.$orederDetail->product->image)}}" class="img-fluid" alt="...">
      
      
      </td>
      <td>{{ $orederDetail->price}}</td>
      <td>{{$orederDetail->qty}}</td>
      <td>{{ $orederDetail->price*$orederDetail->qty}}</td>

    
  </tbody>
</table>
     

            
        @endforeach
   

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   
    
  </body>
</html>
   
   
   
   
   
       