@extends('admin.layouts.layout')







@section('contant')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create page</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('admin.contact_us')}}" class="btn btn-primary">Back</a>
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

                <form action=" {{route('admin.store.contact_us_page')}}" method="post" class="productform" enctype="multipart/form-data"> 
                    @csrf
                    <div class="card mb-3">
                        <div class="card-body">								
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title">Page Name</label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Page Name">
                                        @error('title')
                                        <div class="alert alert-danger">{{$message}}</div>
                                            
                                        @enderror	
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        {{-- <div id="editor"> --}}

                                           <label for="editor">Discription</label>
                                           <textarea name="description" id="editor" cols="" rows=""></textarea>

                                       
                                           
                                           
                                        {{-- </div> --}}
                                    </div>

                                    @error('discrption')
                                    <div class="alert alert-danger">{{$message}}</div>
                                        
                                    @enderror
                                </div>   
                                
                                
                               
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


  $(document).ready(function(){
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

  })
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