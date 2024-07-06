<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contrie;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\ShippingCharge;
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
}
