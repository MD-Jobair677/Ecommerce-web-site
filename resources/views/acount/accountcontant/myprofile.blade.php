@extends('acount.accountheader.accountheader')



@section('frontendcontant')
<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h2 class="h5 mb-0 pt-2 pb-2">Personal Information</h2>
        </div>
        <div class="card-body p-4">
            <div class="row">
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{$user->name}}" placeholder="Enter Your Name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="{{$user->email}}" placeholder="Enter Your Email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" value="" id="phone" placeholder="Enter Your Phone" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="phone">Address</label>
                    <textarea name="address" id="address" class="form-control" cols="30" rows="5" placeholder="Enter Your Address"></textarea>
                </div>
                <p></p>

                <div class="d-flex">
                    <button class="btn btn-dark">Update</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-5">
    <div class="card-header">
        <h1>User Address</h1>
    </div>

   
    <div class="card-body">
        <form   method="post" class="useraddress" name="fromdata" >
            

            <div class="col-md-12">
                <div class="mb-3">
                    <input type="text" name="first_name" id="first_name" value=""  class="form-control" placeholder="First Name">
                    <p></p>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <input type="text" value="{{!empty($customaraddress) ? $customaraddress->last_name : '' }}" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                     <p></p>
                </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3">
                    <input type="text" id="addressemail" value="{{!empty($customaraddress) ? $customaraddress->email : '' }}" name="email" class="form-control" placeholder="Email">

                     <p></p>
                    
                </div>

                
            </div>

            <div class="col-md-12">

                <div class="mb-3">
                                        <select name="country_id" id="country" class="form-control country">
                                            <option disabled selected>select contry</option>
                                            @forelse ($contryName as  $country)
                                            <option  {{!empty($customaraddress) && $customaraddress->contrie_id== $country->id  ? 'selected' : '' }} value="{{$country->id}}">{{$country->name}} </option>


                @empty

                @endforelse
                </select>
                 <p></p>
            </div>

    </div>

    <div class="col-md-12">
        <div class="mb-3">
            <textarea name="address" id="useraddress" cols="30" rows="3" placeholder="Address" class="form-control"></textarea>
             <p></p
        </div>
        
    </div>

    <div class="col-md-12">
        <div class="mb-3">
            <input type="text" name="apertment" id="appartment" class="form-control" placeholder="Apartment, suite, unit, etc. (optional)">
             <p></p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="mb-3">
            <input type="text" name="city" id="city" class="form-control" placeholder="City">
             <p></p>
        </div>
       
    </div>
     

    <div class="col-md-4">
        <div class="mb-3">
            <input type="text" name="state" id="state" class="form-control" placeholder="State">
            <p></p>
        </div>
         
    </div>

    <div class="col-md-4">
        <div class="mb-3">
            <input type="text" name="zip" id="zip" class="form-control" placeholder="Zip">
            <p></p>
        </div>
         
    </div>

    <div class="col-md-12">
        <div class="mb-3">
            <input type="number" name="mobail_number" id="mobile" class="form-control" placeholder="Mobile No." id="mobail_number">
            <p></p>
        </div>
        
    </div>


    <div class="col-md-12">
        <div class="mb-3">
            <textarea name="order_notes" id="order_notes" cols="30" rows="2" placeholder="Order Notes (optional)" class="form-control"></textarea>
             <p></p>
        </div>
        
    </div>

    <button type="submit" class="btn btn-primary"> Update</button>


    </form>
    </div>
</div>
</div>
</div>





@endsection

@push('customjs')

<script>

$(document).ready(function(){

    $('.useraddress').submit(function(event){

        event.preventDefault();

     var formData = $(this);
        $.ajax ({

            url:"{{route('user.add-useraddressss')}}",
            type:"post",
            data:formData.serializeArray(),
        
             dataType:'json',
            success:function(response){
                var errors = response.message;
                
                if(response.status==false){
                {{-- FOR FAST NAME --}}
                    if(errors.first_name !=null){

                       
                        $('#first_name').addClass('is-invalid').siblings(p).addClass('invalid-feedback').html(errors.first_name);

                    }else{
                         $('#first_name').removeClass('is-invalid').addClass('is-valid').siblings(p). removeClass('invalid-feedback'). addClass('valid-feedback').html('Looks good!');

                    }
                         {{-- FOR FAST NAME  END--}}




                         {{-- FOR FAST LAST NAME --}}
                    if(errors.last_name !=null){

                       
                        $('#last_name').addClass('is-invalid').siblings(p).addClass('invalid-feedback').html(errors.last_name);

                    }else{
                         $('#last_name').removeClass('is-invalid').addClass('is-valid').siblings(p). removeClass('invalid-feedback'). addClass('valid-feedback').html('Looks good!');

                    }
                         {{-- FOR FAST LAST NAME END--}}



                         {{-- FOR  EMAIL--}}
                    if(errors.email !=null){

                       
                        $('#addressemail').addClass('is-invalid').siblings(p).addClass('invalid-feedback').html(errors.email);

                    }else{
                         $('#addressemail').removeClass('is-invalid').addClass('is-valid').siblings(p). removeClass('invalid-feedback'). addClass('valid-feedback').html('Looks good!');

                    }
                         {{-- FOR EMAIL END-}}




                         {{-- FOR ADDRESS STRAT--}}

                    if(errors.address !=null){

                       
                        $('#useraddress').addClass('is-invalid').siblings(p).addClass('invalid-feedback').html(errors.address);

                    }else{
                         $('#useraddress').removeClass('is-invalid').addClass('is-valid').siblings(p). removeClass('invalid-feedback'). addClass('valid-feedback').html('Looks good!');

                    }
                         {{-- FORADDRESS END-}}


                         {{-- FOR APERTMENT STRAT--}}

                    if(errors.apertment !=null){

                       
                        $('#appartment').addClass('is-invalid').siblings(p).addClass('invalid-feedback').html(errors.apertment);

                    }else{
                         $('#appartment').removeClass('is-invalid').addClass('is-valid').siblings(p). removeClass('invalid-feedback'). addClass('valid-feedback').html('Looks good!');

                    }
                         {{-- APERTMENT END-}}




                          {{-- FOR COUNTRY STRAT--}}

                    if(errors.country_id !=null){

                       
                        $('#country').addClass('is-invalid').siblings(p).addClass('invalid-feedback').html(errors.country_id);

                    }else{
                         $('#country').removeClass('is-invalid').addClass('is-valid').siblings(p). removeClass('invalid-feedback'). addClass('valid-feedback').html('Looks good!');

                    }
                         {{-- COUNTRY END-}}



                            {{-- FOR CITY STRAT--}}

                    if(errors.city !=null){

                       
                        $('#city').addClass('is-invalid').siblings(p).addClass('invalid-feedback').html(errors.city);

                    }else{
                         $('#city').removeClass('is-invalid').addClass('is-valid').siblings(p).removeClass('invalid-feedback'). addClass('valid-feedback').html('Looks good!');

                    }
                         {{-- STATE START--}}


                           if(errors.state !=null){

                       
                        $('#state').addClass('is-invalid').siblings(p).addClass('invalid-feedback').html(errors.state);

                    }else{
                         $('#state').removeClass('is-invalid').addClass('is-valid').siblings(p). removeClass('invalid-feedback'). addClass('valid-feedback').html('Looks good!');

                    }
                         {{-- STATE END--}}



                          {{-- zip START--}}


                           if(errors.zip !=null){

                       
                        $('#zip').addClass('is-invalid').siblings(p).addClass('invalid-feedback').html(errors.zip);

                    }else{
                         $('#zip').removeClass('is-invalid').addClass('is-valid').siblings(p).removeClass('invalid-feedback'). addClass('valid-feedback').html('Looks good!');

                    }
                         {{-- zip END--}}




                     {{-- mobail_number START--}}


                           if(errors.mobail_number !=null){

                       
                        $('#mobile').addClass('is-invalid').siblings(p).addClass('invalid-feedback').html(errors.mobail_number);

                    }else{
                         $('#mobile').removeClass('is-invalid').addClass('is-valid').siblings(p). removeClass('invalid-feedback'). addClass('valid-feedback').html('Looks good!');

                    }
                         {{-- STATE END--}}











                }else{

                  
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
                    Toast.fire({
                    icon: "success",
                    title: `${response.message}`
                    });



                }






            }




        })

    })

})


</script>
    
@endpush
