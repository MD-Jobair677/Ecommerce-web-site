<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contrie;
use App\Models\Dicountcupon;

use Illuminate\Http\Request;
use App\Models\ShippingCharge;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Validator;

class ShippingController extends Controller
{
    function allShipping(){
        $allShippings = ShippingCharge::with('Contrie')->get();
        // dd($allShippings);

        return view('admin.admincontant.show-all-shipping',compact('allShippings'));
    }

    function createShipping(){
        $allCountris = Contrie::paginate(3);

        return view('admin.admincontant.create-shipping',compact('allCountris'));
    }

    function AddShiping(Request $request ){
        $validate = Validator::make($request->all(),[
            'country_id'=>'required',
            'Shipping_charge'=>'required|numeric'

        ]);



        if($validate->passes()){


            $shippingAlreadyExist = ShippingCharge::where('contrie_id',$request->country_id)->count();
            if($shippingAlreadyExist >0){
                return response()->json([
                    'status'=>true,
                    'message' => ' shippingAlreadyExist',
        
                ]);

            }
                $ShippingCharge = new ShippingCharge();

            
            $ShippingCharge->contrie_id = $request->country_id;
            $ShippingCharge->shipping_charge = $request->Shipping_charge;
            $ShippingCharge->save();

            $message = 'Shipping Create successfully';
        
            return response()->json([
                'status'=>true,
                'message' => $message,
    
            ]);

            
            
            



        }else{
            return response()->json([
                'status'=>false,
                'errors'=>$validate->errors(),
    
            ]);

        }

       
    }

    // SHIPPING ADD IN FRONTEND

    function shippingCharge(Request $request){
       
        $subtotal = Cart::subtotal(2,'.','');
        // cuppon applay
        $discount = 0; 
        if(session()->has('code')){
            $code = session()->get('code');
            // $discount_code = Dicountcupon::where('code',$code->code)->first();

            if($code->type =='percent'){
                $discount  = ($code->discount_amount/100)*$subtotal;  

            }else{
                $discount  = $code->discount_amount; 
            }

        }


        $shippingCharge = ShippingCharge::where('contrie_id',$request->country_id)->value('shipping_charge');

        
        $grandtotal = 0;
        $Cartqty = 0;   
        foreach(Cart::content() as $item ){
            $Cartqty+=$item->qty;
            
        }
        $totalShippingCharge = $shippingCharge * $Cartqty ;
        $grandtotal  =  $totalShippingCharge +  ($subtotal-$discount);

        return response()->json([
            'status'=> true,
            'totalShippingCharge'=>number_format($totalShippingCharge)   ,
            'subtotal' =>number_format($subtotal)  ,
            'discount' => $discount,
            'grandtotal' => number_format($grandtotal) ,
            'Cartqty' => number_format($Cartqty) ,
            'shippingCharge' => number_format($shippingCharge) ,
        ]);


        
    }





    // CUPPON APPALY
    function CupponApplay(Request $request){
        $message = 'Cupon code not found';
        $code = Dicountcupon::where('code',$request->cuppon_id)->first();
        if($code ==null){
            return response()->json([
                'status' => false,
                'message'=>$message,
            ]);

        }


        if($code->starts_at != null){
            $cupon_can_not_use_at_time = 'cupon_can_not_use_at_time';
            $nowtime = Carbon::now();

            $start_date =  Carbon::createFromFormat('Y-m-d H:i:s', $code->starts_at);

           if(  $nowtime ->lt($start_date) ){
            return response()->json([
                'status' => false,
                'message'=>$cupon_can_not_use_at_time,
            ]);

           }

        }



        if($code->expires_at != null){
           
            $nowtime = Carbon::now();

            $expires_at =  Carbon::createFromFormat('Y-m-d H:i:s', $code->expires_at);
            $cupon_can_not_use_at_time = 'Code time  Expire '." ".$expires_at;
           if(  $nowtime ->gt($expires_at) ){
            return response()->json([
                'status' => false,
                'message'=>$cupon_can_not_use_at_time,
            ]);

           }

        }
        

        session()->put('code',$code);


        return $this->shippingCharge($request);






            

        
    }




}
