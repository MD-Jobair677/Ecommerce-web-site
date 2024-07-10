<?php

namespace App\Http\Controllers\frontendcontroller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    function WishList(Request $request){

        $product = Product::where('id',$request->id)->first();

        if($product ==null ){
            return response()->json([
                'status'=>false,
                "message"=>'product not  found',
        
            ]);


        }
       

        Wishlist::updateOrCreate(


            [

                'user_id'=> auth()->user()->id,
                'product_id'=>$request->id ,
            ],

            [
                'user_id'=> auth()->user()->id,
                'product_id'=>$request->id ,
            ]
             );

            return response()->json([
                'status'=>true,
                "message"=>  $product->title . 'added Your wishlist',

            ]);




    }
}
