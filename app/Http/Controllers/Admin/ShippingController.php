<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contrie;
use Illuminate\Http\Request;

use App\Models\ShippingCharge;
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
       
        $shippingCharge = ShippingCharge::where('contrie_id',$request->country_id)->value('shipping_charge');

        $subtotal = Cart::subtotal(2,'.','');
        $grandtotal = 0;
        $Cartqty = 0;   
        foreach(Cart::content() as $item ){
            $Cartqty+=$item->qty;
            
        }
        $totalShippingCharge = $shippingCharge * $Cartqty ;
        $grandtotal  =  $totalShippingCharge +  $subtotal;

        return response()->json([
            'status'=> true,
            'totalShippingCharge'=>number_format($totalShippingCharge)   ,
            'subtotal ' =>$subtotal  ,
            'grandtotal' => number_format($grandtotal) ,
            'Cartqty' => number_format($Cartqty) ,
            'shippingCharge' => number_format($shippingCharge) ,
        ]);


        
    }




}
