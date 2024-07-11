<?php

namespace App\Http\Controllers\frontendcontroller;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\Subcategorie;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index(){
        // $max = 100;
        // $min = 10;


        $navlinks = Categorie::where('status',1)->with('Subcategorie')->latest()->take(7)->get();
        // dd($navlinks->Subcategorie);

        $showhome = Categorie::where('is_featured','yes')-> with('Product')->get();
        // dd( $showhome);
        $featureproducts = Product::where('is_featured','yes')->get();
        // dd( $featureproducts);
        $latestproducts = Product:: where('is_active',1)->latest()->take(8)->get();
        return view('frontendcontant.index',compact('navlinks','showhome','featureproducts','latestproducts'));

    }

    // SHOP
    function shop(Request $request){
        $categoryselected =' '; 
        $subcategoryselected =' ';
        // $max=' ';
        // $min=' ';
        $max = $request->get('price_max');
        $min = $request->get('price_min');
        $barndarray =[];
        $navlinks = Categorie::where('status',1)->with('Subcategorie')->latest()->take(7)->get();
        
        $allproducts = Product::get();
        if(!empty($request->get('brands'))){

            $barndarray = explode(',',$request->get('brands'));

           $allproducts=Product::whereIn('brand_id',$barndarray)->get();

        //    dd($allproducts);

        }

        if(!empty($request->get('search'))){
            $allproducts=Product::where('title', "like", "%" .$request->get('search')."%" )
                               -> orWhere('description', "like", "%" .$request->get('search')."%")
                               -> get();
        }

        // dd( $allproducts);

        $brands = Brand::get();
        return view('frontendcontant.shop',compact('navlinks','allproducts','brands','categoryselected','subcategoryselected','barndarray','max','min'));
    }


    // PRODUCT FILTER BY CATEGORY
    function categoryfilter( Request $request,$categoryslug=null,$subcategoryslug=null ,$price_min=null,$price_max=null ){
        // return ($request->get('latest'));
        $navlinks = Categorie::where('status',1)->with('Subcategorie')->latest()->take(7)->get();
        $brands = Brand::get();
        $allproducts = Product::get();

        $categoryselected =' ';
        $subcategoryselected =' ';

        $barndarray =[];
        $max = $request->get('price_max');
        $min = $request->get('price_min');
       

        // dd($max );


       

       
        if(!empty($categoryslug)){
            $category = Categorie::where('slug',$categoryslug)->first();

            $allproducts = Product::where('categorie_id',$category->id)->get();
            $categoryselected =$category->id;
            // return view('frontendcontant.shop',compact('navlinks','allproducts','brands'));

            // dd($categoryproduct);

        }

        if($request->get('price_min') != '' && $request->get('price_max') != ''  ){

            $allproducts = Product::whereBetween('price', [$min, $max ])->get();

            // dd($allproducts);
        }


     



        if(!empty($subcategoryslug)){
             $subcategory = Subcategorie::where('slug',$subcategoryslug)->first();

            $allproducts = Product::where('subcategorie_id',$subcategory->id)->get();
            $subcategoryselected =$subcategory->id;

            

        }

        if(!empty($request->get('brands'))){

            $barndarray = explode(',',$request->get('brands'));

           $allproducts=Product::whereIn('brand_id',$barndarray)->get();

        //    dd($allproducts);

        }


        if($request->get('latest')){
            // return "hello";
            $selected = $request->get('latest');
            $allproducts=Product::latest()->get();
            // dd($allproducts);

            
            
        }else if($request->get('Pricehigh')){
            $selected = $request->get('Pricehigh');
            $allproducts=Product::orderBy('price', 'ASC')
            ->get();

        }else{
            $selected = $request->get('Pricelow');
            $allproducts=Product::orderBy('price', 'DESC')
            ->get();

        }
        
        $selected ='hekko';

        return view('frontendcontant.shop',compact('navlinks','allproducts','brands','categoryselected','subcategoryselected','barndarray','max','min','selected'));

    }


    // LOWPRICE

    // function lowprice(){
    //     $priceRange = Product::selectRaw('MIN(price) as low_price, MAX(price) as high_price')->first();

    //     // dd($priceRange);

    //     return view('frontendcontant.shop',compact('navlinks','allproducts','brands','categoryselected','subcategoryselected','barndarray','max','min'));


    // }

    // singleproduct

    function singleproduct($slug){
        $navlinks = Categorie::where('status',1)->with('Subcategorie')->latest()->take(7)->get();

        $singleproducts = Product::where('slug',$slug)->first();

        $relatedproducts = [];
        if( $singleproducts->related_product != ''){
            $productid = explode(',',$singleproducts->related_product);
            $relatedproducts =Product::whereIn('id',$productid)->get();

            // dd($relatedproduct);

        }



        return view('frontendcontant.product',compact('navlinks','singleproducts','relatedproducts'));

    }


    function relatedproduct(Request $request){
        $tempproduct = [];
       if($request->term !=" "){
        $products = Product::where('title','like','%'.$request->term.'%')->get();

        if($products !=null){

            foreach($products as $product){

                $tempproduct[] = array("id"=>$product->id, 'text'=>$product->title);


            }


        }


       }

       return response()->json([
        'tags'=>$tempproduct,
        'status'=>200,

       ]);

    }



}
