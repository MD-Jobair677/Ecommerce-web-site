<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Support\Str;
use App\Models\Subcategorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    function allproduct(){
        $products =  Product::latest()->paginate(50);
        return view('admin.admincontant.allproduct',compact('products'));
    }

    function createproduct(){
        $categoris = Categorie::select('id', 'name')->with('Brand')->latest()->get();
        // dd($categoris);


        return view('admin.admincontant.createproduct',compact('categoris'));
    }

    function storeproduct(Request $request){

        // dd($request->related_product);
    //    $request->validate([
    //     'title' => 'required|string|max:255',
    //     'discrption' => 'required|max:255',
    //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
    //     'price' => 'required|numeric|min:0',
    //     // 'compare_price' => 'required|numeric|min:0',
    //     'sku' => 'required|string|max:255',
    //     'barcode' => 'required|string|max:255',
    //     // 'track_qty' => 'required|numeric|min:0',
    //     'qty' => 'required|numeric|min:0',
    //     'status' => 'required',
    //     'category_id   ' => 'required',
    //     'sub_category_id' => 'required',
    //     'brand_id' => 'required',
    //     'is_featured' => 'required',
    //    ]);

        $slugname = $request->title;
        
        $slug = Str::slug($slugname);
        $product = new Product();
        if($request->hasFile('image')){
            $imagename = str::uuid()->toString().'-'.$request->title.'.'.$request->image->extension();
            $request->image->storeAs('productimage',$imagename,'public');
            
            $product->categorie_id=$request->categorie_id;
            $product->subcategorie_id=$request->sub_category_id;
            $product->brand_id=$request->brand_id;
            $product->title=$request->title;
            $product->description=$request->discrption;
            $product->image=$imagename;
            $product->price=$request->price;
            $product->compareprice=$request->compare_price;
            $product->sku=$request->sku;
            $product->track_qty=$request->track_qty;

            $product->barcode=$request->barcode;
            $product->qty=$request->qty;
            $product->is_active=$request->status;
            $product->is_featured=$request->is_featured;

            $product->related_product=(!empty($request->related_product) ? implode(',',$request->related_product):' ' ) ;

            $product->slug=$slug;
            
             $product->save();
             $products =  Product::latest()->paginate(50);
              return back()->with('success','successfully addded');
            
        }

        
 
        
    }

    function productsubcategory(Request $request){

        $subcategory  = Subcategorie::where('categorie_id',$request->category_id
        )->get();
        return $subcategory;

    }



// EDITE PRODUCT
function edite(Request $request ,$id){

    $categoris = Categorie::select('id', 'name')->with('Brand')->latest()->get();
    $editeProduct = Product::where('id',$id)-> with('Categorie')-> with('brand')->first();
    // dd($editeProduct);
    return view('admin.admincontant.Edite_Product',compact('categoris','editeProduct'));
}



}
