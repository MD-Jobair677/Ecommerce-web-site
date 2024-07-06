@extends('admin.layouts.layout')


@section('contant')
    <!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>All Shippimg</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('admin.create-shipping')}}" class="btn btn-primary">New Category</a>
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
							
							<form action="" method="get">
							<table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Country Name</th>
                                    <th scope="col">Charge</th>
                                    <th scope="col">status</th>
                                    <th scope="col">Edite</th>
                                    
                                 
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                 
                                    </tr>
                                    
                                </tbody>
                                </table>

							</form>
							
							

									
										
					<!-- /.card -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->


			@push('ajex')
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




			<script>
				$(document).ready(function(){

					

					$('.status').click(function(){

						
						// var inputValue = $(this).prev("input").val();

					
					// console.log(inputValue);

						$.ajax({
						url:"{{route('admin.status')}}",
						type:'GET',
						data:{
							id:$(this).prev("input").val(),
						},
						dataType:'json',

						success:function(response){
							// alert(response);
							
							if(response==true){
								// alert('hello');
								window.location.href="{{route('admin.allcategory')}}";

							}

							if(response==false){
								window.location.href="{{route('admin.allcategory')}}";

							}

							// console.log(response);

						}

					})
					
						
					})




					
					$('.delete').click(function(e){
						e.preventDefault();
						// "Confirm"-button

							// Try me!
							Swal.fire({
							title: "Are you sure?",
							text: "You won't be able to revert this!",
							icon: "warning",
							showCancelButton: true,
							confirmButtonColor: "#3085d6",
							cancelButtonColor: "#d33",
							confirmButtonText: "Yes, delete it!"
							}).then((result) => {
							if (result.isConfirmed) {
								let nextForm = $(this).next("form");
        						nextForm.submit().prev;




								Swal.fire({
								title: "Deleted!",
								text: "Your file has been deleted.",
								icon: "success"
								});
							}
							});
					})
						
					
				});
				</script>
				
			@endpush
			
@endsection