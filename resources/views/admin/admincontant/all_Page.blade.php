@extends('admin.layouts.layout')

@section('contant')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Page</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('admin.create.contact_us_page')}}" class="btn btn-primary">New Product</a>
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
                    <form  method="get">
                <div class="card-header">
                <button type="button" onclick="window.location.href='{{route('admin.contact_us')}}' " class="btn btn-primary">Reset</button>
                    <div class="card-tools">
                        <div class="input-group input-group" style="width: 250px;">
                            <input type="text" value="{{ Request::get('keyword') }}"  name="keyword" class="form-control float-right" placeholder="Search">
        
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                    </div>
                </div>

                </form>
                <div class="card-body table-responsive p-0">								
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th >ID</th>
                                <th >Page name</th>
                                <th>Discriptoin</th>
                               
                        
                                <th width="">Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @forelse ($pages as $key=> $page )
                                
                            <tr>
                                <td>{{$pages->firstItem()+$key}}</td>


                              


                                <td><a href="#"> {{$page->page_name}} </a></td>
                                
                           
                              										
                                <td>

                                
                                  {{ strip_tags($page->discription) }}
                                </td>
                                <td>
                                    <a href="#">
                                        <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </a>
                                    <a href="#" class="text-danger w-4 h-4 mr-1">
                                        <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path	ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                          </svg>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>No Product Found</td>
                            </tr>
                                
                            @endforelse











                           
                        </tbody>



                    </table>										
                </div>
                <div class="card-footer clearfix">
                   {{$pages->links()}}
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>


<!-- /.content-wrapper -->
    
@endsection