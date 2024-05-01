@extends('admin.layouts.layout')







@section('contant')
<!-- Content Wrapper. Contains page content -->
<d  iv class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Product</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="products.html" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="row">

               
                <div class="col-md-8">

                <form action=" {{route('admin.storeproduct')}}" method="post" class="productform" enctype="multipart/form-data"> 
                    @csrf
                    <div class="card mb-3">
                        <div class="card-body">								
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Title">
                                        @error('title')
                                        <div class="alert alert-danger">{{$message}}</div>
                                            
                                        @enderror	
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        {{-- <div id="editor"> --}}

                                            {{-- <label for="discription"> --}}
                                           <textarea name="discrption" id="editor" cols="" rows=""></textarea>

                                        {{-- </label> --}}
                                           
                                           
                                        {{-- </div> --}}
                                    </div>

                                    @error('discrption')
                                    <div class="alert alert-danger">{{$message}}</div>
                                        
                                    @enderror
                                </div>   
                                
                                
                               
                            </div>
                        </div>	                                                                      
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Media</h2>								
                            <div id="image" class="dropzone dz-clickable">
                                <div class="dz-message needsclick">    
                                    <input name="image" type="file" >                                          
                                </div>
                            </div>
                            @error('image')
                                    <div class="alert alert-danger">{{$message}}</div>
                                        
                                    @enderror
                        </div>	                                                                      
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Pricing</h2>								
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="price">Price</label>
                                        <input type="text" name="price" id="price" class="form-control" placeholder="Price">	
                                    </div>
                                    @error('price')
                                    <div class="alert alert-danger">{{$message}}</div>
                                        
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="compare_price">Compare at Price</label>
                                        <input type="text" name="compare_price" id="compare_price" class="form-control" placeholder="Compare Price">
                                        <p class="text-muted mt-3">
                                            To show a reduced price, move the product’s original price into Compare at price. Enter a lower value into Price.
                                        </p>	
                                    </div>

                                    
                                  


                                </div>                                            
                            </div>
                        </div>	                                                                      
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Inventory</h2>								
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="sku">SKU (Stock Keeping Unit)</label>
                                        <input type="text" name="sku" id="sku" class="form-control" placeholder="sku">	
                                    </div>
                                </div>

                                @error('sku')
                                <div class="alert alert-danger">{{$message}}</div>
                                    
                                @enderror


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="barcode">Barcode</label>
                                        <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode">	
                                    </div>

                                    @error('barcode')
                                    <div class="alert alert-danger">{{$message}}</div>
                                        
                                    @enderror
    
                                </div>   
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input class="d-none" type="text" value="no" name="track_qty" >
                                            <input class="custom-control-input" value="yes" type="checkbox" id="track_qty" name="track_qty" checked>
                                            <label for="track_qty" class="custom-control-label">Track Quantity</label>
                                            
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <input type="number" min="0" name="qty" id="qty" class="form-control" placeholder="Qty">	
                                    </div>
                                </div>                                         
                            </div>
                        </div>	                                                                      
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">	
                            <h2 class="h4 mb-3">Product status</h2>
                            <div class="mb-3">
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Block</option>
                                </select>
                            </div>
                            
                        </div>
                    </div> 
                    <div class="card">
                         <div class="card-body">	
                            <h2 class="h4  mb-3">Product category</h2>
                            <div class="mb-3">
                                <label for="category">Category</label>
                                <select name="categorie_id" id="category" class="form-control select">

                                    @forelse ($categoris as $category )
                                    <option value="{{$category->id}} ">{{$category->name}}</option>
                                        
                                    @empty
                                    <option disabled >No Category Found</option>
                                        
                                    @endforelse

                                    
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="category">Sub category</label>
                                <select name="sub_category_id" id="sub_category" class="form-control subcategory">
                                    {{-- <option value="">Mobile</option>
                                    <option value="">Home Theater</option>
                                    <option value="">Headphones</option> --}}
                                </select>
                            </div>
                        </div> 
                    </div> 
                    <div class="card mb-3">
                        <div class="card-body">	
                            <h2 class="h4 mb-3">Product brand</h2>
                            <div class="mb-3">
                                <select name="brand_id" id="status" class="form-control">
                                  
                                @forelse ($categoris as $category )

                                @foreach ($category->Brand as $brands  )
                                <option value="{{ $brands->id}}"> {{$brands->brandname}} </option>
                                    
                                @endforeach
                            
                                    
                                @empty
                                    
                                @endforelse




                                   
                                    {{-- <option value="">Vivo</option>
                                    <option value="">HP</option>
                                    <option value="">Samsung</option>
                                    <option value="">DELL</option> --}}
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="card mb-3">
                        <div class="card-body">	
                            <h2 class="h4 mb-3">Featured product</h2>
                            <div class="mb-3">
                                <select name="is_featured" id="status" class="form-control">
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>                                                
                                </select>
                            </div>
                        </div>


                        <div class="card-body">	
                            <h2 class="h4 mb-3">Realated product</h2>
                            <div class="mb-3">
                                <select class="js-example-basic-multiple form-control" name="related_product[]" multiple="multiple" >


                                    {{-- <option value="">sa</option>
                                    <option value="">sa</option>
                                    <option value="">c</option>
                                     --}}
                                  </select>
                            </div>
                        </div>
                        
                        

                       


                          

                    


                    </div>                                 
                </div>
            </div>
       
            
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="products.html" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
       
        </div>
    </form>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


{{-- CDK editor --}}

@push('ajex')

<script>
    $('.js-example-basic-multiple').select2({
      ajax: {
          url: '{{ route("relatedproduct") }}',
          dataType: 'json',
        //   methode:'GET',
          tags: true,
          multiple: true,
          minimumInputLength: 3,
          processResults: function (data) {
              return {
                  results: data.tags
              };
          }
      }
  });
  </script>





<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

{{-- <script>
  $('.productform').submit(function(event){
    event.preventDefault();

    let formdata = $(this).serializeArray();

    $.ajax({
        url:"{{route('admin.storeproduct')}} ",
        type:'POST',
        data:formdata,

        dataType:'json',

        success:function(res){
            console.log(res);

        }
    })

  })
</script> --}}



@push('ajex')

{{-- <script>
      
    // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
    $('.js-example-basic-multiple').select2({
        
    });
      });
  </script> --}}










<script>
    $(document).ready(function(){



        $('.select').change(function(){


            $.ajax({
                url:`{{route('admin.subcategoryproduct')}}`,
                type:'GET',
                data:{
                    category_id:$(this).val(),
                },
                success:function(res){

                    // console.log(res)
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



    
@endpush
    
@endsection