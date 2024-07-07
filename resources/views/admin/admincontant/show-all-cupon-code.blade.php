

 @extends('admin.layouts.layout')


@section('contant')
    <!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Discount cupon</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('admin.add.cupon')}}" class="btn btn-primary">Add Cupon Code</a>
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
								<div class="card-header">
									<div class="card-title">
								<input type="button" class="btn btn-primary" onclick="window.location.href='{{route('admin.cupon.showas')}}'"   value="Reset">
							</div>
									<div class="card-tools">
										<div class="input-group input-group" style="width: 250px;">
											<input type="text" value="{{ Request::get('keyword') }}" name="keyword" class="form-control float-right" placeholder="Search">
						
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
											<th>#</th>
											<th width="60">CUPON ID</th>
											
											<th>Name</th>
											<th>DISCRIPTOIN</th>
											<th>MAX USES</th>
											<th>MAX USER USESS </th>
											<th>DISCOUNT AMOUNT</th>
											<th>MIN AMOUNT</th>
											<th>starts_at</th>
											<th>expires_at</th>
											<th>status</th>
											<th>Edite</th>
											
										</tr>
									</thead>
									<tbody>

									
										
										 @forelse ($alldescounts as  $key=>$alldescount)
										<tr>
											
											
											<td>{{$alldescounts->firstItem()+$key}}</td>
											<td>{{$alldescount->code}}</td>
											
											<td>{{$alldescount->name}}</td>
											<td>{{$alldescount->discriptoin}}</td>
											<td>{{$alldescount->max_uses}}</td>
											<td>{{$alldescount->max_uses_user}}</td>
											<td>{{$alldescount->discount_amount}}</td>
											<td>{{$alldescount->min_amount}}</td>
											<td>{{$alldescount->starts_at}}</td>
											<td>{{$alldescount->expires_at}}</td>
										
											<td>

												  @if ($alldescount->status==1)
												 <a href="#" class="">
													<input class=" d-none statusvalu" type="number" value="{{$alldescount->id}}">
											
												
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill status" viewBox="0 0 16 16">
														<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
													  </svg>

													 
												 </a>
													  
												  @else
												<a href="#">
													<input class=" d-none statusvalu" type="number" value="{{$alldescount->id}}">
													<svg class="text-danger h-6 w-6 status" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
														<path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
													</svg>
												</a>

												

													  
												  @endif

											</td>
											<td>
												<a href="{{route('admin.updatepage',$alldescount->id)}}">
													<svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
														<path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
													</svg>
												</a>

											
													
														<a href="#"  class="text-danger w-4 h-4 mr-1 delete">
														
															<svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
																<path	ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
															  </svg>
														
														</a>

														<form action=" {{route('admin.delete',$alldescount->id)}}" method="post">
															@csrf
															@method('DELETE')
														
														
														
														</form>
													
											



												
											</td>
										</tr>
											
										@empty
										<tr>
											<td>	<h1 class="text-center">data not found</h1></td>
										</tr>
										
											
									@endforelse
										

									
												






									
									</tbody>
									

								</table>	
								
								{{$alldescounts->links()}}									
							</div>
							{{-- <div class="card-footer clearfix">
								<ul class="pagination pagination m-0 float-right">
								  <li class="page-item"><a class="page-link" href="#">«</a></li>
								  <li class="page-item"><a class="page-link" href="#">1</a></li>
								  <li class="page-item"><a class="page-link" href="#">2</a></li>
								  <li class="page-item"><a class="page-link" href="#">3</a></li>
								  <li class="page-item"><a class="page-link" href="#">»</a></li>
								</ul>
							</div> --}}
						</div>
					</div>
					<!-- /.card -->
				
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