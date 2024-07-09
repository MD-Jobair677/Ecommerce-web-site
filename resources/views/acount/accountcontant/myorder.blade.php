@extends('acount.accountheader.accountheader')

@section('frontendcontant')

                   <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="h5 mb-0 pt-2 pb-2">My Orders</h2>
                        </div>
                        <div class="card-body p-4">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead> 
                                        <tr>
                                            <th>Orders id</th>
                                            <th>Date Purchased</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($myOrders as $key => $myOrder )
                                         <tr>
                                            <td>
                                                <a href="order-detail.php">{{$myOrder->id}}</a>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($myOrder->created_at)->format('d M Y')}}</td>


                                             <td> 

                                         @if ($myOrder->status =='pending')
                                             <span class="badge bg-danger">Pending</span>
                                         @elseif($myOrder->status =='shipped')
                                             <span class="badge bg-success">shipped</span>

                                            @elseif($myOrder->status =='delivered')
                                             <span class="badge bg-success">delivered</span> 

                                         @endif

                                    

                                                 
                                                
                                                
                                               
                                         

                                               
                                                

                                               
                                                   
                                                
                                                
                                             
                                              </td>  
                                            

                                            <td>{{$myOrder->garnd_total}}</td>
                                        </tr>
                                            
                                        @empty
                                        
                                            
                                        @endforelse

                                       
                                        
                                                                              
                                    </tbody>
                                </table>
                            </div>                            
                        </div>
                    </div>
                </div>

@endsection