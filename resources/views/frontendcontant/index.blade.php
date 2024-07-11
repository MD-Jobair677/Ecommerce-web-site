@extends('frontendlayout.header')

@section('frontendcontant')


<main>
    <section class="section-1">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <!-- <img src="images/carousel-1.jpg" class="d-block w-100" alt=""> -->

                    <picture>
                        <source media="(max-width: 799px)" srcset="{{asset('frontendlayout/images/carousel-1-m.jpg')}}  " />
                        <source media="(min-width: 800px)" srcset="{{asset('frontendlayout/images/carousel-1.jpg')}}   " />
                        <img src="{{asset('frontendlayout/images/carousel-1.jpg')}}" alt="" />
                    </picture>

                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3">
                            <h1 class="display-4 text-white mb-3">Kids Fashion</h1>
                            <p class="mx-md-5 px-5">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                            <a class="btn btn-outline-light py-2 px-4 mt-3" href="#">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">

                    <picture>
                        <source media="(max-width: 799px)" srcset="{{asset('frontendlayout/images/carousel-2-m.jpg')}}" />
                        <source media="(min-width: 800px)" srcset="{{asset('frontendlayout/images/carousel-2.jpg')}}" />
                        <img src="{{asset('frontendlayout/images/carousel-2.jpg')}}" alt="" />
                    </picture>

                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3">
                            <h1 class="display-4 text-white mb-3">Womens Fashion</h1>
                            <p class="mx-md-5 px-5">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                            <a class="btn btn-outline-light py-2 px-4 mt-3" href="#">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <!-- <img src="images/carousel-3.jpg" class="d-block w-100" alt=""> -->

                    <picture>
                        <source media="(max-width: 799px)" srcset="{{asset('frontendlayout/images/carousel-3-m.jpg') }}" />
                        <source media="(min-width: 800px)" srcset="{{asset('frontendlayout/images/carousel-3.jpg') }}" />
                        <img src="{{asset('frontendlayout/images/carousel-2.jpg')}}" alt="" />
                    </picture>

                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3">
                            <h1 class="display-4 text-white mb-3">Shop Online at Flat 70% off on Branded Clothes</h1>
                            <p class="mx-md-5 px-5">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                            <a class="btn btn-outline-light py-2 px-4 mt-3" href="#">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <section class="section-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="box shadow-lg">
                        <div class="fa icon fa-check text-primary m-0 mr-3"></div>
                        <h2 class="font-weight-semi-bold m-0">Quality Product</h5>
                    </div>
                </div>
                <div class="col-lg-3 ">
                    <div class="box shadow-lg">
                        <div class="fa icon fa-shipping-fast text-primary m-0 mr-3"></div>
                        <h2 class="font-weight-semi-bold m-0">Free Shipping</h2>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="box shadow-lg">
                        <div class="fa icon fa-exchange-alt text-primary m-0 mr-3"></div>
                        <h2 class="font-weight-semi-bold m-0">14-Day Return</h2>
                    </div>
                </div>
                <div class="col-lg-3 ">
                    <div class="box shadow-lg">
                        <div class="fa icon fa-phone-volume text-primary m-0 mr-3"></div>
                        <h2 class="font-weight-semi-bold m-0">24/7 Support</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Categoris --}}



    <section class="section-3">
        <div class="container ">
            <div class="section-title">
                <h2>Categories</h2>
            </div>
            <div class="row pb-3">

                @forelse ($showhome as $homecontant )
                <div class="col-lg-3">
                    <div class="cat-card">

                        @forelse ($homecontant->Product as $productimage )


                        <div class="left">
                            <img src="{{asset('storage/productimage/'.$productimage->image)}}" alt="saassda" class="img-fluid">
                        </div>

                        @empty



                        @endforelse




                        <div class="right">
                            <div class="cat-data">
                                <h2>{{$homecontant->name}}</h2>
                                <p>100 Products</p>
                            </div>
                        </div>
                    </div>
                </div>

                @empty

                @endforelse



            </div>
    </section>

    {{-- Categoris end --}}

    <section class="section-4 pt-5">
        <div class="container">
            <div class="section-title">
                <h2>Latest Produsts</h2>
            </div>
            <div class="row pb-3">

                @forelse ($latestproducts as $latestproduct )




                <div class="col-md-3">
                    <div class="card product-card">
                        <div class="product-image position-relative">
                            <a href="" class="product-img"><img class="card-img-top" src="{{asset('storage/productimage/'.$latestproduct->image)}}" alt=""></a>

                            <a class="whishlist" href="javascript: void(0)" onclick="addwishlist({{$latestproduct->id}})"><i class="far fa-heart"></i></a>


                            @if($latestproduct->qty > 0)
                            <div class="product-action">
                                <a class="btn btn-dark" href="#">
                                    <i class="fa fa-shopping-cart"></i> Add To Cart
                                </a>
                            </div>

                            @else
                            <div class="product-action">
                                <a class="btn btn-dark" href="#">
                                    <i class="fa fa-shopping-cart"></i> Out of Stack
                                </a>
                            </div>

                            @endif




                        </div>
                        <div class="card-body text-center mt-3">
                            <a class="h6 link" href="product.php">{{$latestproduct->title}}</a>
                            <div class="price mt-2">
                                <span class="h5"><strong>{{$latestproduct->price}}</strong></span>
                                <span class="h6 text-underline"><del>{{$latestproduct->compareprice}}</del></span>
                            </div>
                        </div>
                    </div>
                </div>

                @empty

                @endforelse






            </div>
        </div>
    </section>


    <section class="section-4 pt-5">
        <div class="container">
            <div class="section-title">
                <h2>Featured Products</h2>
            </div>
            <div class="row pb-3">

                @forelse ($featureproducts as $featureproduct )
                <div class="col-md-3">
                    <div class="card product-card">



                        <div class="product-image position-relative">
                            <a href="{{route('singleproduct',$featureproduct->slug)}}" class="product-img"><img class="card-img-top" src="{{asset('storage/productimage/'. $featureproduct->image)}}" alt=""></a>
                            <a class="whishlist" href="javascript: void(0)" onclick="addwishlist({{$latestproduct->id}})"><i class="far fa-heart"></i></a>



                            @if($featureproduct->qty > 0)
                            <div class="product-action">
                                <a class="btn btn-dark" href="#">
                                    <i class="fa fa-shopping-cart"></i> Add To Cart
                                </a>
                            </div>

                            @else
                            <div class="product-action">
                                <a class="btn btn-dark" href="#">
                                    <i class="fa fa-shopping-cart"></i> Out of Stack
                                </a>
                            </div>

                            @endif





                        </div>



                        <div class="card-body text-center mt-3">
                            <a class="h6 link" href="product.php">{{$featureproduct->title}}</a>
                            <div class="price mt-2">
                                <span class="h5"><strong>{{$featureproduct->price}}</strong></span>
                                <span class="h6 text-underline"><del>{{$featureproduct->compareprice}}</del></span>
                            </div>
                        </div>
                    </div>
                </div>


                @empty

                <h1>np featureproduct found</h1>

                @endforelse





            </div>
        </div>
    </section>


</main>


@endsection

@push('customjs')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<script>
    const Toast = Swal.mixin({
        toast: true
        , position: "top-end"
        , showConfirmButton: false
        , timer: 3000
        , timerProgressBar: true
        , didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });






    function addtocard(id) {
        $.ajax({
            url: '{{route("addtocard")}}'
            , type: 'post'
            , data: {
                id: id
            },

            dataType: 'json',

            success: function(res) {

                if (res.status == true) {
                    alert(res.message);



                } else {

                    alert(res.message);

                }

            }
        })
    }

    function addwishlist(id) {



        $.ajax({
            url: "{{route('add-wishlist')}}"
            , type: 'post'
            , data: {
                id: id
            , }
            , dataType: 'json'
            , success: function(response) {



                if (response.status == true) {
                    Toast.fire({
                        icon: "success"
                        , title: response.message
                    });

                } else {

                    Toast.fire({
                        icon: "error"
                        , title: response.message
                    });

                }

            }







        })


    }

</script>




@endpush
