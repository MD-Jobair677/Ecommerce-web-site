<?php

namespace App\Http\Controllers\Account;

use App\Models\Order;
use App\Models\Myorder;
use App\Models\Wishlist;
use App\Models\Orderitem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contrie;
use App\Models\customeraddress;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    function order(){

        $myOrders = Myorder::where('user_id',auth()->user()->id)-> latest()->get();
        

        return view('acount.accountcontant.myorder',compact('myOrders'));
    }

    // ORDER DETAILS
    function OrderDetails($id){

        $order = Myorder::where('user_id',auth()->user()->id)->where('id',$id)->first();
      
        $orederDetails = Orderitem::where('myorder_id',$id)->with('product')->get();

        // dd($orederDetails);


        return view('acount.accountcontant.order-details',compact('orederDetails','order'));
    }


    function profile(){

        $user = auth()->user();
        $contryName = Contrie::get();
        return view('acount.accountcontant.myprofile',compact('user','contryName'));
    }









    function wishlist(){
        $wishLists = Wishlist::where('user_id',auth()->user()->id)->with('product')->get();
        // dd($wishLists);

        return view ('acount.accountcontant.wishlist',compact('wishLists'));
    }

    function changepassword(){
        return view('acount.accountcontant.changepassword');
    }

        // USERADDRESS

        function userAddress(Request $request){

            // return $request->all();

            // $valodate  = validator::make($request->all(),[
            //     'first_name'=>'required|max:30|string',
            //     // 'slug'=>'required|max:30|string',
            //     // 'status'=>'required',
            //     // 'is_featured'=>'required',
        
            // ]);

            $validate = Validator::make($request->all(),[

                
                'first_name'=>'required',
                'last_name'=>'required',

                "email"=>'required|email|unique:users,email',

                "address"=>'required|min:15|max:20',
                "apertment"=>'required|min:15',
                "country_id"=>'required',
                "city"=>'required|min:15',
                "state"=>'required|min:15',
                "zip"=>'required',
                "mobail_number"=> 'required|numeric|digits_between:1,11',
            
            ]);


            if($validate->passes()){

                // $customeraddress  = new customeraddress();
                // $customeraddress->user_id = auth()->user()->id;
                // $customeraddress->first_name = $request->first_name;

                // $customeraddress->first_name = $request->first_name;

                // $customeraddress->last_name = $request->last_name;

                // $customeraddress->email = $request->email;

                // $customeraddress->contrie_id = $request->country_id;

                // $customeraddress->address = $request->address;

                // $customeraddress->apertment = $request->apertment;

                // $customeraddress->cty = $request->city;
                // $customeraddress->state = $request->state;
                // $customeraddress->zip = $request->zip;
                // $customeraddress->mobail_number = $request->mobail_number;
                // $customeraddress->nots = $request->nots;
                // $customeraddress->save();

                customeraddress::updateOrCreate(

                
                [
                    'user_id' => auth()->user()->id,
                    
                    
                ],

              [ 
                    'user_id' => auth()->user()->id,
                    'first_name' =>'gg',
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'contrie_id' => $request->country_id,
                    'apertment' => $request->apertment,
                    'cty' => $request->city,
                    'state' => $request->state,
                    'zip' => $request->zip,
                    'mobail_number' => $request->mobail_number,
                    'nots' => $request->nots
                ]);
                
                

                return response()->json([

                    "status"=>true,
                    'message'=>"successfully update your address",
                ]);


                

            }else{

                return response()->json([

                    "status"=>false,
                    'message'=>$validate->errors(),
                ]);

            }



           
            
        }






}
