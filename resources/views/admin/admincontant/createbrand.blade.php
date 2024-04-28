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
                    <a href="{{route('admin.brand')}}" class="btn btn-primary">Back</a>
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
                <div class="card-body">								
                    <div class="row">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                     @endif
                        
                        <div class="col-md-6">
                            



                            <form action="{{route('admin.subcategoristore')}}" method="post">
                                @csrf
                            <div class="mb-3">
                                <label for="name">Category</label>
                                <select  name="Category" id="" class="form-select select" aria-label="Default select example">
                                    @forelse ($categoris as $categori )
                                    <option  value="{{$categori->id}}">{{$categori->name}}</option>
                                    
                                        
                                    @empty
                                  
                                    <option disabled>Category not found</option>
                                        
                                    @endforelse



                                   
                                </select>
                                
                               
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">subcategory</label>
                                <select name="subcategory" id="" class="form-select subcategory" aria-label="Default select example">
                                    <option >select SubCategory</option>
                                </select>	
                                @error('subcategory')
                                <div class="alert alert-danger">{{$message}}</div>
                                    
                                @enderror


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name"> Brand name</label>
                                <input type="text" name="brandname" id="slug" class="form-control" placeholder="Brand Name">
                                
                                @error('brandname')
                                <div class="alert alert-danger"> {{$message}}</div>
                                    
                                @enderror
                            </div>
                        </div>	

                        <div class="col-md-6">
                            <select name="status" class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">Active</option>
                                <option value="0">Block</option>
                                
                              </select>

                        </div>
                        
                        



                    </div>
                </div>							
            </div>
            <div class="pb-5 pt-3">
                <button class="btn btn-primary">Create</button>
                <a href="brands.html" class="btn btn-outline-dark ml-3">Cancel</a>
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
    $(document).ready(function(){



        $('.select').change(function(){


            $.ajax({
                url:`{{route('admin.subcategoryselect')}}`,
                type:'GET',
                data:{
                    category_id:$(this).val(),
                },
                success:function(res){
                    let array=[];

                //    console.log(res.length);
                    if(res.length==0){
                        let option = `<option disabled selected>no Category found</option>`

                        $('.subcategory').html(option);
                        return false;

                    }
                        res.forEach(element => {
                            let option = `<option value="${element.id}">${element.name}</option>`
                            array.push(option);
                          
                            
                     });
                    
                    $('.subcategory').html(array);

                }
            })
    
         })

    })





 
</script>
    
@endpush


    
@endsection