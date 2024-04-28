<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Categorie;
use Illuminate\Support\Str;
use App\Models\Subcategorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{


    // SHOW ALL BRAND
     function brand(){

        $allbrands = Brand::latest()->paginate(6);
        // dd($allbrands);
        return view('admin.admincontant.allbrand',compact('allbrands'));

     }

    //  CREATE BRAND

    function createbrand(){
        $categoris = Categorie::latest()->get();
        return view('admin.admincontant.createbrand',compact('categoris'));
    }

    // CATEGORY AJAX

    function subcategoryselect(Request $request){

        $subcategory = Subcategorie::where('categorie_id',$request->category_id)->get();

        return $subcategory;
    }

    // STORE SUBCATEGORY
    function brandstore(Request $request){
        $request->validate([
            'Category'=>'required',
              'subcategory'=>'required',
              'brandname'=>'required|max:30',
              
      
          ]);
          $name = $request->brandname;

          $subcategoryslug = Brand::where('slug','Like','%'.str($name)->slug().'%')->count();
          

                // dd($subcategoryslug);



          $brand = new Brand();
          $brand->categorie_id=$request->Category;
          $brand->subcategorie_id=$request->subcategory;
          $brand->brandname=$request->brandname;
          $count = 0;
          if($subcategoryslug>0){
            $count =$subcategoryslug+$count++;
            $brand->slug=Str::slug($name)."-".$count;

          }else{
            $brand->slug=Str::slug($name);
           
          }

           

          
          


          $brand->status=$request->status;
          $brand->save();

          return back()->with('success','successfully addeed');
      
    }






}
