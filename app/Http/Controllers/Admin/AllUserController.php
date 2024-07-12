<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AllUserController extends Controller
{
    function allUser(){

        $allUsers = User::select('id','name','email','status')->paginate(5);
        // dd($allUser);

        return view('admin.admincontant.alluser',compact('allUsers'));
    }
}
