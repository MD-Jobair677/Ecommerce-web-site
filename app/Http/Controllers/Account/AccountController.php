<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Myorder;
use App\Models\Order;
use App\Models\Orderitem;
use Illuminate\Http\Request;

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
        // dd($user);
        return view('acount.accountcontant.myprofile',compact('user'));
    }









    function wishlist(){
        return view('acount.accountcontant.wishlist');
    }

    function changepassword(){
        return view('acount.accountcontant.changepassword');
    }
}
