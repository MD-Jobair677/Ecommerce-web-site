<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
// use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dicountcupon;
use Illuminate\Support\Facades\Validator;

class CuponController extends Controller
{

    function index(Request $request){

        // dd($request->keyword);
            $alldescounts = Dicountcupon::latest()->paginate(12);

           if(!empty($request->get('keyword'))){
            
            $keyword=$request->get('keyword');
            
            $alldescounts = Dicountcupon::where('code','like','%'.$keyword.'%')->paginate(1);
            // dd($alldescounts);
           }

        return view('admin.admincontant.show-all-cupon-code',compact('alldescounts'));

    }
    function addcupon(){

        return view('admin.admincontant.cuponcreate');

    }




    function store(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'code'=>'required',
            'name'=>'required',
            // 'discount_amount'=>'required'


        ]);

       

        if($validator->passes()){
            if(!empty($request->starts_at)){
                // WHENE START TIME IS LESS THENE CURRENT TIME
                $now  = Carbon::now(); 
                // date time user thaka mja formet a asba sai formate a deta hoba
                $start_time = Carbon::createFromFormat('Y/m/d H:i',$request->starts_at);

                if($start_time->lte($now)==true){
                    return response()->json([
                        'status' =>false,
                        'errors'=>['start_at'=>'start date time can not be less then current time'],
        
                    ]);

                }

            }

            // exipire time   not less then  start time 

            if(!empty($request->starts_at) && !empty($request->expires_at)){
                // compare korta hola aga object create korta hoba
                $start = Carbon::createFromFormat('Y/m/d H:i',$request->starts_at);
                $expires = Carbon::createFromFormat('Y/m/d H:i',$request->expires_at);

                if( $start->gte($expires)==true){
                    return response()->json([
                        'status' =>false,
                        'errors'=>['expire_at'=>'expires date time can not be less then start time'],
        
                    ]);

                }
              

            }

            $discountcupon = new Dicountcupon();

            $discountcupon->code = $request->code;
            $discountcupon->name = $request->name;
            $discountcupon->discriptoin = $request->discriptoin;
            $discountcupon->max_uses = $request->max_uses;
            $discountcupon->max_uses_user = $request->max_uses_user;
            $discountcupon->type = $request->type;
            $discountcupon->discount_amount = $request->discount_amount;
            $discountcupon->min_amount = $request->min_amount;
            $discountcupon->starts_at = $request->starts_at;
            $discountcupon->expires_at = $request->expires_at;
            $discountcupon->status = $request->status;

            $discountcupon->save();
            $message = 'successfully added cupon code';
            // session()->flash('success',$message);
            // return back()->with('success', $message);
            
            return response()->json([
                'status' => true,
                'message'=>$message,

            ]);
           
        }else{
            return response()->json([
                'status' => false,
                'errors'=>$validator->errors(),

            ]);
        }



    }

    


}
