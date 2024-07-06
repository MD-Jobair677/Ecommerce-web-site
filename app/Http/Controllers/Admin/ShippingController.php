<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contrie;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Validator;

class ShippingController extends Controller
{
    function allShipping(){

        return view('admin.admincontant.show-all-shipping');
    }

    function createShipping(){
        $allCountris = Contrie::all();

        return view('admin.admincontant.create-shipping',compact('allCountris'));
    }

    function AddShiping(Request $request ){
        $validate = Validator::make($request->all(),[
            'country_id'=>'required',
            'Shipping_charge'=>'required|numeric'

        ]);

        if($validate->passes()){
            
            return response()->json([
                'status'=>true,
                'errors'=>'hwello',
    
            ]);



        }else{
            return response()->json([
                'status'=>false,
                'errors'=>$validate->errors(),
    
            ]);

        }




        return response()->json([
            'status'=>$validate->errors(),

        ]);
    }
}
