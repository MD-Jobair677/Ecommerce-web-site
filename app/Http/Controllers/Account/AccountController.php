<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Myorder;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    function order(){

        $myOrders = Myorder::where('user_id',auth()->user()->id)-> latest()->get();
        

        return view('acount.accountcontant.myorder',compact('myOrders'));
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
