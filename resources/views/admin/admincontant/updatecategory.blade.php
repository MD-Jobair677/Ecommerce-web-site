@extends('admin.layouts.layout')

@section('contant')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Brand</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('admin.allcategory')}}" class="btn btn-primary">Back</a>
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
                {{-- @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif --}}

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
             @endif

                <div class="card-body">								
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <form action="{{route('admin.update',$edite->id)}}" method="post" class="fromdata"  name="fromdata">
                                    @csrf
                                    @method('PUT')
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{$edite->name}}"  id="name" class="form-control" placeholder="Name">
                                <span class="text-danger name"></span>
                                
                                @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                                    
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="slug">Slug</label>
                                <input  value="{{$edite->name}}" type="text" name="slug" id="slug" class="form-control" placeholder="Slug">
                                <span class="text-danger slug"></span>	

                                @error('slug')
                                <div class="alert alert-danger">{{$message}}</div>
                                    
                                @enderror
                            </div>
                        </div>		
                        
                        <div class="col-md-6">
                            <select name="status" class="form-select" aria-label="Default select example">
                                <option selected disabled >Open this select menu</option>
                                <option  value="1">Active</option>
                                <option value="0">Block</option>
                                
                              </select>

                        </div>
                           
                           
                       
                    </div>
                </div>
            
                


            </div>

        
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{route('admin.allcategory')}}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
        </div>
   
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

{{-- @push('ajex')
{{-- <script>
    $(document).ready(function() {
        // Retrieve the CSRF token from the meta tag
        // let csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
    
        // AJAX request

        $('.fromdata').submit(function(event){
            event.preventDefault();
            var formData = $(this);
            $.ajax({
            url: "{{route('admin.store')}}",
            type: 'POST',
            data:formData.serializeArray(),
            
            dataType:'json',
           
            success: function(response) {

                if(response['status']){
                  window.location.href="{{route('admin.allcategory')}}";

               }
               
                let erorrs = response['erorrs'];

                if(erorrs['name']){
                    $('.name').html(erorrs['name']);

                }else{
                    $('.name').html('');
                }

                if(erorrs['slug']){
                    $('.slug').html(erorrs['slug']);

                }else{
                    $('.slug').html('');
                }

               

              
              
               
               
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(xhr, status, error);
            }
        });
        
        
        })

     
    });
    </script> --}}
   

    
@endsection