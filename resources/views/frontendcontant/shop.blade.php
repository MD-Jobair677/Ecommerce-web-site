@extends('frontendlayout.header')

@section('frontendcontant')


<main>
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                    <li class="breadcrumb-item active">Shop</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="section-6 pt-5">
        <div class="container">
            <div class="row">            
                <div class="col-md-3 sidebar">
                    <div class="sub-title">
                        <h2>Categories</h3>
                    </div>



                    
                    <div class="card">
                        <div class="card-body">



                            @forelse ($navlinks as $key=> $navlink)
                            <div class="accordion accordion-flush" id="accordionExample">
                                <div class="accordion-item">

                                @if (count($navlink->Subcategorie)>0)
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-{{$key}}" aria-expanded="false" aria-controls="collapseOne">
                                        {{$navlink->name}}
                                    </button>
                                    
                                </h2>
                                    
                                @else
                                <a href="{{route('categoryfilter',[$navlink->slug])}}" class="nav-item nav-link {{$categoryselected==$navlink->id? 'text-primary' : ''}}">{{$navlink->name}}</a>
                                    
                                @endif

                                    <div id="collapseOne-{{$key}}" class="accordion-collapse collapse {{$categoryselected==$navlink->id? 'show' : ''}} " aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                        <div class="accordion-body">

                                            <div class="navbar-nav">

                                                @forelse ($navlink->Subcategorie as $subcategory )
                                                <a href="{{route('categoryfilter',[$navlink->slug,$subcategory->slug])}}" class="nav-item nav-link {{$subcategoryselected==$subcategory->id ? 'text-primary': ' '}}">{{$subcategory->name}}</a>
                                                    
                                                @empty
                                                    
                                                @endforelse
                                                
                                               
                                                {{-- <a href="" class="nav-item nav-link">Tablets</a>
                                                <a href="" class="nav-item nav-link">Laptops</a>
                                                <a href="" class="nav-item nav-link">Speakers</a>
                                                <a href="" class="nav-item nav-link">Watches</a>                                             --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>  

                                {{-- <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Men's Fashion
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                        <div class="accordion-body">
                                            <div class="navbar-nav">
                                                <a href="" class="nav-item nav-link">Shirts</a>
                                                <a href="" class="nav-item nav-link">Jeans</a>
                                                <a href="" class="nav-item nav-link">Shoes</a>
                                                <a href="" class="nav-item nav-link">Watches</a>
                                                <a href="" class="nav-item nav-link">Perfumes</a>                                            
                                            </div>
                                        </div>
                                    </div>                                                              
                                </div> 
                                
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Women's Fashion
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                        <div class="accordion-body">
                                            <div class="navbar-nav">
                                                <a href="" class="nav-item nav-link">T-Shirts</a>
                                                <a href="" class="nav-item nav-link">Tops</a>
                                                <a href="" class="nav-item nav-link">Jeans</a>
                                                <a href="" class="nav-item nav-link">Shoes</a>
                                                <a href="" class="nav-item nav-link">Watches</a>
                                                <a href="" class="nav-item nav-link">Perfumes</a>                                            
                                            </div>
                                        </div>
                                    </div>                                                              
                                </div> 

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            Applicances
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                        <div class="accordion-body">
                                            <div class="navbar-nav">
                                                <a href="" class="nav-item nav-link">TV</a>
                                                <a href="" class="nav-item nav-link">Washing Machines</a>
                                                <a href="" class="nav-item nav-link">Air Conditioners</a>
                                                <a href="" class="nav-item nav-link">Vacuum Cleaner</a>
                                                <a href="" class="nav-item nav-link">Fans</a>
                                                <a href="" class="nav-item nav-link">Air Coolers</a>                                            
                                            </div>
                                        </div>
                                    </div>                                                              
                                </div>                  --}}
                                                    
                            </div>
                                
                            @empty
                                
                            @endforelse

                           



                        </div>
                    </div>












                    <div class="sub-title mt-5">
                        <h2>Brand</h3>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">

                            @forelse ($brands as $brand )
                        
                            <div class="form-check mb-2">
                                <input {{ (in_array($brand->id, $barndarray)) ? 'checked':' '  }} class="form-check-input brandvalu" type="checkbox" name="brand[]" value="{{$brand->id}}" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{$brand->brandname}}
                                </label>
                            </div>

                                
                            @empty
                                
                            @endforelse
                          

                            
                            
                            


                        </div>
                    </div>

                    <div class="sub-title mt-5">
                        <h2>Price</h3>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">

                            <input type="text" class="js-range-slider brandvalu " name="my_range" value="" />



                            {{-- <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    $0-$100
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    $100-$200
                                </label>
                            </div>                 
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    $200-$500
                                </label>
                            </div> 
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    $500+
                                </label>
                            </div>                  --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row pb-3">
                        <div class="col-12 pb-1">
                            <div class="d-flex align-items-center justify-content-end mb-4">
                                <div class="ml-2">
                                    {{-- <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-bs-toggle="dropdown">Sorting</button>

                                      


                                        { <div class="dropdown-menu dropdown-menu-right"> --}}

                                           
                                            {{-- <a class="dropdown-item" href="#">Latest</a>
                                            <a class="dropdown-item" href="{{route('lowprice')}}">Price High</a>
                                            <a class="dropdown-item" href="#">Price Low</a> --}}
                                         {{-- </div>  --}}


                                    {{-- </div>       
                                        
                                        --}}

                                        <select name="short" id="short" class="form-control brandvalu">
                                            <option selected >Shorting</option>
                                            {{-- <option {{$selected=='latest' ? 'selected' : ' '}} value="latest" >Latest</option>
                                            <option  {{$selected=='Pricehigh' ? 'selected' : ' '}} value="Pricehigh">Price High</option>
                                            <option {{$selected=='Pricelow' ? 'selected' : ' '}} value="Pricelow">Price Low</option> --}}
                                        </select>



                                </div>
                            </div>
                        </div>



                            @forelse ($allproducts as $allproduct )
                            <div class="col-md-4">
                                <div class="card product-card">
                                    <div class="product-image position-relative">
                                        <a href="" class="product-img"><img class="card-img-top" src="{{asset('storage/productimage/'.$allproduct->image)}}" alt=""></a>
                                        <a class="whishlist" href="222"><i class="far fa-heart"></i></a>                            
    
                                        <div class="product-action">
                                            <a class="btn btn-dark" href="#">
                                                <i class="fa fa-shopping-cart"></i> Add To Cart
                                            </a>                            
                                        </div>
                                    </div>                        
                                    <div class="card-body text-center mt-3">
                                        <a class="h6 link" href="product.php">{{ $allproduct->title}}</a>
                                        <div class="price mt-2">
                                            <span class="h5"><strong>{{$allproduct->price}}</strong></span>
                                            <span class="h6 text-underline"><del>{{$allproduct->compareprice}}</del></span>
                                        </div>
                                    </div>                        
                                </div>                                               
                            </div>  
    
                                
                            @empty
                                
                            @endforelse

                       
                         
                        
   



                    </div>
                </div>
            </div>
        </div>
    </section>

    

    


    
</main>

@push('customjs')
<script>

            

$(".js-range-slider").ionRangeSlider({
        type: "double",
        min: 0,
        max: 1000,
        from:{{!empty($min)? $min :100     }},
        to:{{!empty($min) ? $max :1000     }},
        grid: true
    });

    
        let my_range = $(".js-range-slider").data("ionRangeSlider");





    $('.brandvalu').change(function(){

        let array =[];

       $('.brandvalu').each(function(){
        
        if ($(this).is(":checked")==true) {

            array.push($(this).val());

      
         }


        //  console.log(array);

        
       })

    //    let a = my_range.result.from;
    //    console.log(a);

       let url = "{{url()->current()}}?";

       url+= `&price_min=${my_range.result.from}&price_max=${my_range.result.to}`;
       



      let search_value = $('#search_value').val();
   
    
    
    if(search_value.lelength > 0){
        url+="&search="+search_value;
        {{-- window.location.href = url; --}}
    }   





       if(array.length > 0 ){
       url+='&brands='+array.toString();
        
         window.location.href=url;

        
       }


    //    priceshorting
   let price=  $('#short').val();




   if(price=='latest'){

        url+=`&latest=${price}`;
        window.location.href=url;



    

    } else if(price=='Pricehigh'){
        url+=`&Pricehigh=${price}`;
        window.location.href=url;

    }else if(price=='Pricelow'){
        url+=`&Pricelow=${price}`;
        window.location.href=url;

    }



   
    console.log(search_value);
    // console.log(url);


      window.location.href = url;
       

      



    
    //    window.location.href=`${url}+&price_min=${my_range.result.from}&price_max=${my_range.result.to}`;
    
    //    window.location.href = url+'&brands='+array.toString();
    //    console.log(my_range.result.from+'cc'+my_range.result.to);


    });

   
   





</script>


<script>





    // $('.range').change(function(){
    //     let url = "{{url()->current()}}?";
    //     // console.log(url);
    //     $('.range').each(function(){

            
    //         url+=`&price_min=${my_range.result.from}&price_max=${my_range.result.to}`;

    //         // window.location.href = url;


         

    //         // console.log(my_range.result.from+'&&'+my_range.result.to);

    //     })

    //     console.log(url);
    // })








  
</script>
    
@endpush
        
                    
    
@endsection