@extends('admin.layouts.layout')

@section('contant')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Shipping</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{ route('admin.show-all-shipping') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="container-fluid">

                <div class="card">
                    {{-- @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif --}}

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <form action="" method="post" class="fromdata" name="fromdata">
                                        <label for="Country_Name">Country name</label>

                                        <select class="form-select country_id" aria-label="Default select example" name="country_id">
                                             <option selected disabled >Select country</option>
                                        @forelse ($allCountris as  $allCountry)
                                            <option value="{{$allCountry->id}}">{{$allCountry->name}}</option>
                                        @empty
                                             <option  disabled>  country not found</option>
                                        @endforelse

                                           
                                        


                                        </select>
                                        <p class="country_name text-danger"> </p>


                                        
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Shipping_charge">Shipping Charge</label>
                                    <input type="number" name="Shipping_charge" id="Shipping_charge" class="form-control Shipping_charge"
                                        placeholder="Shipping Charge" max="10" min="0">
                                    <span class="text-danger slug"></span>
                                       <p class="Shipping_charge text-danger"></p>
                                </div>
                              
                            </div>







                        </div>
                    </div>




                </div>


                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('admin.allcategory') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
                </form>
            </div>

            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @push('ajex')
        <script>
            $(document).ready(function() {
                // Retrieve the CSRF token from the meta tag
                // let csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

                // AJAX request

                $('.fromdata').submit(function(event) {
                    event.preventDefault();
                    var formData = $(this);
                    $.ajax({
                        url: "{{ route('admin.add-shipping') }}",
                        type: 'POST',
                        data: formData.serializeArray(),

                        dataType: 'json',

                        success: function(response) {

                          if(response.status==false){

                              if(response.errors.country_id != null){
                                $('.country_id').addClass('is-invalid')
                                $('.country_name').html(response.errors.country_id)

                              } else{
                                $('.country_id').removeClass('is-invalid')
                                 $('.country_name').html('')

                              } 


                               if(response.errors.Shipping_charge != null){
                                $('.Shipping_charge').addClass('is-invalid')
                                $('.Shipping_charge').html(response.errors.Shipping_charge)

                              } else{
                                $('.Shipping_charge').removeClass('is-invalid')
                                 $('.Shipping_charge').html('')

                              }     
    

                            

                          







                          }else{

                          
                            

                            

                          }







                        },
                        error: function(xhr, status, error) {
                            // Handle error
                            console.error(xhr, status, error);
                        }
                    });


                })


            });
        </script>
    @endpush
@endsection
