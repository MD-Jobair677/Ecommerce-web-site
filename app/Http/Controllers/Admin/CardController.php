<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contrie;
use App\Models\customeraddress;
use App\Models\Myorder;
use App\Models\Orderitem;
use App\Models\Product;
use App\Models\ShippingCharge;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class CardController extends Controller
{
    // CARD

    function card(){
        $navlinks = Categorie::where('status',1)->with('Subcategorie')->latest()->take(7)->get();
        $cardcontant = Cart::content();
        return view('frontendcontant.card', compact('navlinks','cardcontant'));
    }
    

    // ADD TO CARD

    function addtocard(Request $request){
        if(Auth::check()==false){
            return redirect()->route('login');

        }


        $product = Product::find($request->id);


        if($product==null){

            return response()->json([
                'status'=>false,
                'message'=>'Product notem found',
            ]);

        }



        //WHENE CARD NOT EMPTY

        if(Cart::count() >0){

            $allproduct = Cart::content();
            $productAlreadyExist = false;

            foreach($allproduct as $item){

                if($item->id == $request->id){
                    $productAlreadyExist = true;


                }
            }



            if($productAlreadyExist == false){

                Cart::add(['id' => $product->id, 'name' => $product->title, 'qty' =>1, 'price' => $product->price, 'options' => ['size' => 'large']]);
                return response()->json([
                  'status'=>true,
                  'message'=> $product->title.'Product added in card',
              ]);
  
                


            }else{
                return response()->json([
                    'status'=>false,
                    'message'=>'Product already in card ',
                ]);
    

            }

            



        }else{

            //whene card empty
              Cart::add(['id' => $product->id, 'name' => $product->title, 'qty' => 1, 'price' => $product->price, 'options' => ['size' => 'large']]);
              return response()->json([
                'status'=>true,
                'message'=> $product->title.'Product added in card',
            ]);


        }

        

        // return $request->id;
        
    }


    // CARD UPDATE

    function cardupdate(Request $request){
        $rowId = $request->rowId;
        $newqty = $request->newqty;
        Cart::update($rowId, $newqty);

        $message = 'card update successfully';
        session()->flash('success',$message );

        return response()->json([
            'status' =>true,
            'message' =>$message,

        ]
            
        );

       

    }

    // CARD DELETE
    function carddelet(Request $request){
        $cardproduct = Cart::get( $request->rowId);

        if($cardproduct != null){

            Cart::remove( $request->rowId);
            session()->flash('erorr','remove from card');
            return response()->json([
                'status'=>true,
                'message'=>'card remove!'

            ]);

        }else{
            return response()->json([
                'status'=>false,
                'message'=>'card not found!'

            ]);
        }

        

    }

    // CHACKOUT
    function chackout(){
        $navlinks = Categorie::where('status',1)->with('Subcategorie')->latest()->take(7)->get();
        $cardcontant = Cart::content();
       



         if(Cart::content()->count() ==0){
            // return redirect()->route('card');
            return view('frontendcontant.card',compact('navlinks','cardcontant'));

        }else{
            // return redirect()->route('chackout');
            $contryName = Contrie::orderBy("name",'ASC')->get();
            

            $customaraddress = customeraddress::where('user_id',auth()->user()->id)->first();
            // SHIPPING ADD WHEN USER ALREDY EXIST IN DATABASE AND MINIMUM BUY ONE PRODUCT
            $shippingCharge = ShippingCharge::where('contrie_id',$customaraddress->contrie_id)->value('shipping_charge');

            $subtotal = Cart::subtotal(2,'.','');
            $grandtotal = 0;
            $Cartqty = 0;
            foreach(Cart::content() as $item ){
                $Cartqty+=$item->qty;
                
            }
            $totalShippingCharge =number_format($shippingCharge,2)  * number_format($Cartqty,2) ;
            $grandtotal  =number_format( $totalShippingCharge, 2 ) +  $subtotal ;
            

            // dd($grandtotal);
            $navlinks = Categorie::where('status',1)->with('Subcategorie')->latest()->take(7)->get();
            return view('frontendcontant.chackout',compact('navlinks','cardcontant','contryName','customaraddress','totalShippingCharge','grandtotal','Cartqty','shippingCharge'));

        }


       
    }

    //PROCESS TO CHACHOUT
    function process(Request $request){

        // dd($request->all()); 
        
        // validatiuon

        // STORE DATA IN CCUSTOMER ADDRESS
        

        $address = new customeraddress();
        $address->user_id=auth()->user()->id;
        $address->first_name=$request->first_name;
        $address->last_name=$request->last_name;
        $address->email=$request->email;
        $address->contrie_id=$request->country_id;
        $address->address=$request->address;
        $address->apertment=$request->appartment;
        $address->cty=$request->city;
        $address->state=$request->state;
        $address->zip=$request->zip;
        $address->mobail_number=$request->mobile;
        $address->nots=$request->order_notes;

        $address->save();

        //insert data myorder id

        $myorder = new Myorder();
        $shipping = 0;
        $discount = $request->discoun_amount?$request->discoun_amount:0 ;
        $subtotal = Cart::subtotal(2,'.','');
        $grandtotal = ($subtotal +  $shipping)-$discount ;
    // dd($grandtotal);

        if($request->payment_method_1 =='cod'){

            // dd('hello');
            $myorder->user_id=auth()->user()->id;
            $myorder->subtotal =$subtotal ;
            // $request->shipping ? $request->shipping:null
            $myorder->shipping =$request->shipping;  
            $myorder->cupon =$request->cuppon_code ? $request->cuppon_code:null;
            $myorder->discount =$request->discoun_amount ? $request->discoun_amount:null;

            $myorder->garnd_total =$request->garnd_total_inputt ;

         

             //USER ADDRESS
         $myorder->first_name=$request->first_name ;
        $myorder->last_name=$request->last_name;
        $myorder->email=$request->email;
        $myorder->contrie_id=$request->country_id;
        $myorder->address=$request->address;
        $myorder->apertment=$request->appartment;
        $myorder->cty=$request->city;
        $myorder->state=$request->state;
        $myorder->zip=$request->zip;
        $myorder->mobail_number=$request->mobile;
        $myorder->nots=$request->order_notes;
           
        $myorder->save();
           
        }

      

        $myorder_id = $myorder->id;
        
        

        

        // ORDERITEMS table 


      
       foreach(Cart::content() as $item){
        $orderitem=new Orderitem();
        $orderitem->myorder_id =  $myorder_id ;
        $orderitem->product_id = $item->id;
        $orderitem->name = $item->name;
        $orderitem->qty = $item->qty;
        $orderitem->price = $item->price;
        $orderitem->total = $item->price*$item->qty;
        $orderitem->save();


       }

       Cart::destroy();
       
    return view('frontendcontant.thanks',compact('myorder_id'));


    }


 


}
