
@extends('frontendlayout.header')



<main>
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="white-text" href="#">Shop</a></li>
                    <li class="breadcrumb-item">Checkout</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="section-9 pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="sub-title">
                        <h2>Shipping Address</h2>
                    </div>
                    <div class="card shadow-lg border-0">
                        <div class="card-body checkout-form">



                            <div class="row">
                                <form action="{{route('process')}}" method="POST">
                                    @csrf
                                    @method('post')
                                
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" name="first_name" id="first_name" value="{{!empty($customaraddress) ? $customaraddress->first_name : '' }}" class="form-control" placeholder="First Name">
                                    </div>            
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" value="{{!empty($customaraddress) ? $customaraddress->last_name : '' }}" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                                    </div>            
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" value="{{!empty($customaraddress) ? $customaraddress->email : '' }}" name="email" id="email" class="form-control" placeholder="Email">
                                    </div>            
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <select name="country" id="country" class="form-control">
                                            <option disabled selected>select contry</option>
                                            @forelse ($contryName as  $country)
                                            <option  {{!empty($customaraddress) && $customaraddress->contrie_id== $country->id  ? 'selected' : '' }}    value="{{$country->id}}">{{$country->name}}   </option>
                        
                                                
                                            @empty
                                                
                                            @endforelse
                                        </select>
                                    </div>            
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <textarea name="address" id="address" cols="30" rows="3" placeholder="Address" class="form-control"></textarea>
                                    </div>            
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" name="appartment" id="appartment" class="form-control" placeholder="Apartment, suite, unit, etc. (optional)">
                                    </div>            
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <input type="text" name="city" id="city" class="form-control" placeholder="City">
                                    </div>            
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <input type="text" name="state" id="state" class="form-control" placeholder="State">
                                    </div>            
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <input type="text" name="zip" id="zip" class="form-control" placeholder="Zip">
                                    </div>            
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile No.">
                                    </div>            
                                </div>
                                

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <textarea name="order_notes" id="order_notes" cols="30" rows="2" placeholder="Order Notes (optional)" class="form-control"></textarea>
                                    </div>            
                                </div>

                         

                            </div>


                        </div>
                    </div>    
                </div>
                <div class="col-md-4">
                    <div class="sub-title">
                        <h2>Order Summery</h3>
                    </div>                    
                    <div class="card cart-summery">
                        <div class="card-body">

                            @foreach (Cart::content() as $item )
                                
                            

                            <div class="d-flex justify-content-between pb-2">
                                <div class="h6">{{$item->name}}</div>
                                <div class="h6">${{$item->price}}</div>
                            </div>

                            @endforeach

                            {{-- <div class="d-flex justify-content-between pb-2">
                                <div class="h6">Product Name Goes Here X 1</div>
                                <div class="h6">$100</div>
                            </div>
                            <div class="d-flex justify-content-between pb-2">
                                <div class="h6">Product Name Goes Here X 1</div>
                                <div class="h6">$100</div>
                            </div>
                            <div class="d-flex justify-content-between pb-2">
                                <div class="h6">Product Name Goes Here X 1</div>
                                <div class="h6">$100</div>
                            </div> --}}


                            <div class="d-flex justify-content-between summery-end">
                                <div class="h6"><strong>Subtotal</strong></div>
                                <div class="h6"><strong>${{Cart::subtotal()}}</strong></div>
                            </div>



                            <div class="d-flex justify-content-between mt-2">
                                <div class="h6"><strong>Shipping</strong></div>
                                <div class="h6"><strong>$0</strong></div>
                            </div>
                            <div class="d-flex justify-content-between mt-2 summery-end">
                                <div class="h5"><strong>Total</strong></div>
                                <div class="h5"><strong>${{Cart::subtotal()}}</strong></div>
                            </div>                            
                        </div>
                    </div>   
                    
                    <div class="card payment-form ">
                        <h3 class="card-title h5 mb-3">Payment Method</h3> 
                        <div>
                           
                            <input type="radio" checked name="payment_method_1" value="cod" id="payment_method_one">
                            <label for="payment_method_one">Cash on Delivery</label>

                        </div>

                        <div>
                           
                            <input type="radio"  name="payment_method_1" value="COD" id="payment_method_tow">
                            <label for="payment_method_tow">Strip</label>

                        </div>
                        
                        

                       
                        <div class="card-body p-0 d-none " id="form_method">
                            <div class="mb-3">
                                <label for="card_number" class="mb-2">Card Number</label>
                                <input type="text" name="card_number" id="card_number" placeholder="Valid Card Number" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="expiry_date" class="mb-2">Expiry Date</label>
                                    <input type="text" name="expiry_date" id="expiry_date" placeholder="MM/YYYY" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="expiry_date" class="mb-2">CVV Code</label>
                                    <input type="text" name="expiry_date" id="expiry_date" placeholder="123" class="form-control">
                                </div>
                            </div>
                           
                        </div> 
                        
                        <div class="pt-4">
                            <button class="btn-dark btn btn-block w-100" type="submit">Pay Now</button>
                            {{-- <a href="#" class="btn-dark btn btn-block w-100">Pay Now</a> --}}
                            {{-- <button type="submit">Register</button> --}}
                        </div>
                    </div>

                </form>

                          
                    <!-- CREDIT CARD FORM ENDS HERE -->
                    
                </div>
            </div>
        </div>
    </section>
</main>


@push('customjs')
<script>
    $('#payment_method_one').click(function(){
       if( $(this).is(':checked')==true){

            $('#form_method').addClass('d-none');

       }
    })



    $('#payment_method_tow').click(function(){
       if( $(this).is(':checked')==true){

            $('#form_method').removeClass('d-none');

       }
    })
</script>
    
@endpush
