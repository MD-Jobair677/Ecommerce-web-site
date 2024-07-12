<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AllUserController extends Controller
{
    function allUser(){

        
        $rolesToExclude = ['admin', 'writer', 'manager'];

        
        $allUsers = User::whereDoesntHave('roles', function ($query) use ($rolesToExclude) {
            $query->whereIn('name', $rolesToExclude);
        })->paginate(6);

     


        return view('admin.admincontant.alluser',compact('allUsers'));
    }

    // IS BAN

    function is_Ban(Request $request){

        $user = User::find($request->id);

     
        if(!empty($user)){
           
            if($user->status==true){
            
              $user->status = false;
                 $user->save();
                 $this-> allUser();
                 return response()->json([
                    'status'=>true,
                    'message'=>'User Ban successfully'
                ]);
                

            } else{
                $user->status = true;
                 $user->save();
                 $this-> allUser();
                 return response()->json([
                    'status'=>false,
                    'message'=>'User active successfully'
                ]);

            }



           
        }else{




            return response()->json([
                'status'=>false,
                'message'=>'User user not found'
            ]);
    
            
        }



       
      

    }
}
