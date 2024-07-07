@extends('admin.layouts.layout')

@section('contant')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   
    <!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Cupon code</h1>
                </div>
                <div class="col-sm-6 text-right">
                    {{-- <a href="{{route('admin.allcategory')}}" class="btn btn-primary">Back</a> --}}
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
               

            {{-- @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
             @endif --}}

             
              <h1 class="success alert alert-success d-none"></h1>
           



                <div class="card-body">								
                    <div class="row">
               
                    <div class="col-md-6">
                        <div class="mb-3">
                            <form action="" method="POST" id="discountfrom" name="discountfrom">
                                @csrf
                                @method('post')
                            <label for="name">Code</label>
                            <input type="text" name="code"  id="code" class="form-control" placeholder="Code">
                            <span class="text-danger name"></span>
                            
                        </div>
                    </div>

                    
                       
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">name</label>
                                <input type="text" name="name"  class="form-control"   id="name" placeholder="name">
                                <span class="text-danger slug"></span>	
                            </div>
                        </div>	
                        
                        <div class="col-md-6">
                            <label for="discription"> Discription</label>
                            <textarea name="discriptoin" id="discription" cols="100" rows="5"></textarea>
                        </div>


                        
                        <div class="col-md-6">
                            <label for="max_uses">max_uses</label>
                           <input name="max_uses" type="number" id="max_uses" class="form-select">

                        </div>

                        <div class="col-md-6">
                            <label for="max_uses_user">max_uses_user</label>
                           <input name="max_uses_user" type="number" id="max_uses_user" class="form-select">

                        </div>

                        <div class="col-md-6">
                            <label for="type">type</label>
                            <select name="type" id=""  class="form-control">
                                <option value="fixed" class="form-select"> fixed</option>
                                <option value="percent" class="form-select"> percent</option>

                            </select>
                       

                        </div>

                        <div class="col-md-6">
                            <label for="discount_amount">discount_amount</label>
                           <input name="discount_amount" type="number" id="discount_amount" class="form-select">

                        </div>

                        <div class="col-md-6">
                            <label for="min_amount">min_amount</label>
                           <input name="min_amount" type="number" id="min_amount" class="form-select">

                        </div>

                        <div class="col-md-6">
                            <label for="starts_at">starts_at</label>
                           <input name="starts_at" type="text" id="starts_at" class="form-select" id="start_at">
                           <span class="text-danger slug"></span>

                        </div>

                        <div class="col-md-6">
                            <label for="expires_at">expires_at</label>
                           <input name="expires_at" type="text" id="expires_at" class="form-select" id="expires_at">
                           <span class="text-danger slug"></span>

                        </div>

                        <div class="col-md-6">
                            <label for="">status</label>
                            <select name="status" class="form-select" aria-label="Default select example">
                                {{-- <option selected> </option> --}}
                                <option value="1">Active</option>
                                <option value="0">Block</option>
                                
                              </select>

                        </div>

                         <div class="pb-5 pt-3">
                            <button type="submit" class="btn btn-primary">Create</button>
                           <a href="{{route('admin.allcategory')}}" class="btn btn-outline-dark ml-3">Cancel</a>
                        </div> 

                
                      
                    </form>
                       
                    </div>
            
                    
                </div>
            
          
                


            </div>

        
            
      
        </div>
    
   
        <!-- /.card -->
  
    <!-- /.content -->
      </section>
</div>
@endsection
<!-- /.content-wrapper -->

@push('ajex')
<script>
    $(document).ready(function() {
        // Retrieve the CSRF token from the meta tag
        // let csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
    
        // AJAX request

        $('#starts_at').datetimepicker({
            format:'Y/m/d H:i',
           

        });

        $('#expires_at').datetimepicker({
            format:'Y/m/d H:i',
           

        });
        
       
      


        $('#discountfrom').submit(function(event){
            event.preventDefault();
            var formdata = $(this);

          $.ajax({
            url:`{{route("admin.store.cupon")}}`,
            type:'POST',
            data:formdata.serializeArray(),
            dataType:'json',
            success:function(res){
                if(res.status ==true){

                    $('.success').removeClass('d-none').html(res['message']);
                    window.location.href="{{route('admin.add.cupon')}}"
                  

                }else{

                    var errors = res['errors'];
                    // whene class code is empty

                    if(errors['code']){
                        $('#code').addClass('is-invalid').
                        siblings('span').
                        addClass('invalid-feedback').html(errors['code'])
                        


                    }else{
                        $('#code').removeClass('is-invalid').
                        siblings('span').
                        removeClass('invalid-feedback').html('')

                    }

                    // end whene class code is empty

                    // whene class name is empty

                    if(errors['name']){
                        $('#name').addClass('is-invalid').
                        siblings('span').
                        addClass('invalid-feedback').html(errors['name'])
                        


                    }else{
                        $('#name').removeClass('is-invalid').
                        siblings('span').
                        removeClass('invalid-feedback').html('')

                    }

                    // end whene class name is empty



                    // whene current time less then start time
                    if(errors['start_at']){

                       
                        $('#starts_at').addClass('is-invalid').
                        siblings('span').
                        addClass('invalid-feedback').html(errors['start_at'])
                        


                    }else{
                        $('#starts_at').removeClass('is-invalid').
                        siblings('span').
                        removeClass('invalid-feedback').html('')

                    }


                    // exipire time   not less then  start time
                    if(errors['expire_at']){

                       
                        $('#expires_at').addClass('is-invalid').
                        siblings('span').
                        addClass('invalid-feedback').html(errors['expire_at'])



                        }else{
                        $('#expires_at').removeClass('is-invalid').
                        siblings('span').
                        removeClass('invalid-feedback').html('')

                        }






                

                }





            }
            
          })

        })




       

     
    });


  



    </script>



   
@endpush
    
