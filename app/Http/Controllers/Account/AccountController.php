<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    function order(){
        return view('acount.accountcontant.myorder');
    }

    function profile(){
        return view('acount.accountcontant.myprofile');
    }

    function wishlist(){
        return view('acount.accountcontant.wishlist');
    }

    function changepassword(){
        return view('acount.accountcontant.changepassword');
    }
}
