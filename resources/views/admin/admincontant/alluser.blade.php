@extends('admin.layouts.layout')

@section('contant')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

            <div class="card  my-2  ">
                <div class="card-header"> All User</div>
                <div class="card-body">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">Email</th>
                                <th scope="col">status</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>

                        @forelse($allUsers as $key => $allUser)
                            
                        

                            <tr>
                                <th scope="row">{{$allUsers->firstItem()+$key }}</th>
                                <td>{{$allUser->name}}</td>
                                <td>
                               {{$allUser->email}}
                                
                                
                                </td>
                                     
                                <td>

												  @if ($allUser->status==1)
												 <a href="#" class="">
													<input class=" d-none statusvalu" type="number" value="{{$allUser->id}}">
											
												
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill status" viewBox="0 0 16 16">
														<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
													  </svg>

													 
												 </a>
													  
												  @else
												<a href="#">
													<input class=" d-none statusvalu" type="number" value="{{$allUser->id}}">
													<svg class="text-danger h-6 w-6 status" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
														<path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
													</svg>
												</a>

												

													  
												  @endif

											</td>



                                <td>
                                    <a href="#">
                                        <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </a>
                                    <a href="#" class="text-danger w-4 h-4 mr-1">
                                        <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <h1>User Not Fount</h1>
                        @endforelse
                        </tbody>

                        
                    </table>
                    {{$allUsers->links()}}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
