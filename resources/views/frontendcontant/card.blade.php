@extends('frontendlayout.header')




@section('frontendcontant')

<main>
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="white-text" href="#">Shop</a></li>
                    <li class="breadcrumb-item">Cart</li>
                </ol>
            </div>
        </div>
    </section>

    <section class=" section-9 pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (Session::has('erorr'))

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{Session::get('erorr')}}</strong> {{Session::get('erorr')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>

                    {{-- <p class="alert-danger"></p> --}}
                        
                    @endif

                    <p class="remove text-danger"></p>


                    <div class="table-responsive">
                       


                        <table class="table" id="cart">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>

                            
                            <tbody>

                               
                                @forelse ($cardcontant as  $item)
                           

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <img src="{{asset('storage/productimage/'.$item->image)}}" width="" height="">
                                            <h2>{{$item->name}}</h2>
                                        </div>
                                    </td>
                                    <td>${{$item->price}}</td>
                                    <td>
                                        <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-dark btn-minus p-2 pt-1 pb-1 sub">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" data-id="{{$item->rowId}}" class="form-control form-control-sm  border-0 text-center"      value="{{$item->qty}}">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-dark btn-plus p-2 pt-1 pb-1 add">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{$item->price*$item->qty}}
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-danger" onclick="deleteItem('{{$item->rowId}}')" ><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>

                             

                                @empty

                                <p>Crad is empty</p>
                                     
                         @endforelse 
                        
                               


                            </tbody>

                           
                        </table>

                       
                    </div>
                </div>
                <div class="col-md-4">            
                    <div class="card cart-summery">
                        <div class="sub-title">
                            <h2 class="bg-white">Cart Summery</h3>
                        </div> 
                        <div class="card-body">
                            <div class="d-flex justify-content-between pb-2">
                                <div>Subtotal</div>
                                <div>${{Cart::subtotal()}}</div>
                            </div>
                            <div class="d-flex justify-content-between pb-2">
                                <div>Shipping</div>
                                <div>$0</div>
                            </div>
                            <div class="d-flex justify-content-between summery-end">
                                <div>Total</div>
                                <div>${{Cart::subtotal()}}</div>
                            </div>
                            <div class="pt-5">
                                <a href="{{route('chackout')}}" class="btn-dark btn btn-block w-100">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>     
                   
                </div>
            </div>
        </div>
    </section>
</main>

    
@endsection

@push('customjs')
<script>


    $('.add').click(function(){
        let qtyeliment = $(this).parent().prev();
        let qtyvalu = parseInt(qtyeliment.val()  );

         

        if(qtyvalu<1000 ){
            qtyeliment.val(qtyvalu+1);
            let dataId = $(this).parent().prev().attr("data-id");

            let newqty = qtyeliment.val();

            cardupdate(dataId,newqty)


           
        }
        
    })



    $('.sub').click(function(){
        
        let qtyeliment = $(this).parent().next();
        let qtyvalu = parseInt(qtyeliment.val());

        console.log(qtyvalu)

        // let rowId = $(this).parent().prev().attr("data-id") ;

        if(qtyvalu > 1 ){
            qtyeliment.val(qtyvalu-1);

            let dataId = $(this).parent().next().attr("data-id");

            let newqty = qtyeliment.val();

            cardupdate(dataId,newqty)

        }

        
    })


    // update ajax

    function cardupdate(rowId,newqty){

        $.ajax({
            url:'{{route("cardupdate")}}',
            method:'POST',
            data:{
                rowId:rowId,
                newqty:newqty,


            },
             dataType:'json',

             success:function(res){
                if(res.status ==true){
                    // console.log('jeko')
                    window.location.href="{{route('card')}}"

                }

             }
            
        })

    }



    // DELETE CARD ITEM
   function deleteItem(rowId){
    if(confirm('are you sure you want to delete it')){
        $.ajax({
            url:'{{route("carddelet")}}',
            method:'POST',
            data:{
                rowId:rowId
            },

            dataType:'json',
            success:function(res){
               
                if(res.status==true){
                    
               
                window.location.href="{{route('card')}}"
                // $('.remove').text(res.message);

                }
            
            }


    })
    }
    


   }

</script>
    
@endpush