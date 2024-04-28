@extends('admin.layouts.layout')


@section('contant')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Sub Category</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('admin.allsubcategory')}}" class="btn btn-primary">Back</a>
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
                    
                @if (session('success'))
                <div  class="alert alert-success">{{session('success')
                    
               }}</div>
                    
                @endif
                        
                 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <form action="{{route('admin.subcategorystore')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <label for="name">Category</label>
                                <select name="category_id" id="category" class="form-control">
                                    @forelse ($categoris as $category )
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                            
                                        
                                    @empty
                                    <option disabled>No Category Found</option>
                                        
                                    @endforelse

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name">	
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">image</label>
                                <input type="file" name="subcategoryimage" id="slug" class="form-control" placeholder="Slug">	
                            </div>
                        </div>	
                        
                        <div class="col-md-6">
                            <select name="status" class="form-select" aria-label="Default select example">
                                <option disabled>Open this select menu</option>
                                <option value="1">Active</option>
                                <option value="0">Block</option>
                                
                              </select>

                        </div>
                    </div>
                </div>	
                
                
                
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="subcategory.html" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
    
@endsection