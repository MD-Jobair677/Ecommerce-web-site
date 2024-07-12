@extends('acount.accountheader.accountheader')

@section('frontendcontant')
<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h2 class="h5 mb-0 pt-2 pb-2">My Wishlist</h2>
        </div>
        <div class="card-body p-4">
            @forelse ($wishLists as $key=> $wishList )




            <div class="d-sm-flex justify-content-between mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom">
                <div class="d-block d-sm-flex align-items-start text-center text-sm-start"><a class="d-block flex-shrink-0 mx-auto me-sm-4" href="#" style="width: 10rem;"><img src="{{asset('storage/productimage/'.$wishList->product->image)}}" alt="Product"></a>


                    <div class="pt-2">
                        <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">{{$wishList->product->title}}</a></h3>
                        <div class="fs-lg text-accent pt-2">${{ number_format($wishList->product->price,2) }}</div>
                    </div>
                </div>
                <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                    <button class="btn btn-outline-danger btn-sm remove-btn" type="button" data-id="{{$wishList->id}}">
                        <i class="fas fa-trash-alt me-2"></i>Remove
                    </button>

                </div>
            </div>

            @empty
            <h1>Wishlist Not found</h1>
            @endforelse

        </div>
    </div>
</div>
</div>
@endsection

@push('customjs')
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    
<script>
        $(document).ready(function(){

            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });



        $(".remove-btn").click(function(){
            
            var wishListId = $(this).data("id");

            $.ajax({
                url: "{{route('delete-wishlist')}}", 
                type: "delete",
                data: {
                    id: wishListId
                },
                success: function(response){

                    if(response.status==true){
                        Toast.fire({
                        icon: "error",
                        title: response.message


                        
                        });

                        

                    }

                 
                   
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    
                    console.log(textStatus, errorThrown);
                }
            });
        });
    });

</script>



@endpush
