<?php

namespace App\Http\Controllers\Admin;


use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Subcategorie;
use App\Models\Subcategory;

class SubCategoryController extends Controller
{

// ALL SUBCATEFORY

        function allsubcategory(){

            $subcategory = Subcategorie::with('Categorie')->latest()->paginate(10);
            // dd($subcategory);

            return view('admin.admincontant.allsubcategory',compact('subcategory'));
            
        }


    function addsubcategory(){
        $categoris = Categorie::latest()->get();
        return view('admin.admincontant.subcategory',compact('categoris'));


       ;
      }

    //   STORE SUBCATEGORY

    function subcategorystore(Request $request){
        $request->validate([

            'name'=>'required|max:30|string',
            'subcategoryimage'=>'mimes:png,jpg',
            'status'=>'required',

        ]);
        // str($title)->slug()
        $name = $request->name;

        $slugfind = Subcategorie::where('slug','Like','%'.str($name)->slug().'%')->count();
        // dd($slugfind);
        $createslaug = Str::slug($request->name);
        $subcategorystore  = new Subcategorie();

        if($request->hasFile('subcategoryimage')){
            $imagename =Str::uuid()->toString().'.'.$request->subcategoryimage->getClientOriginalExtension();

             $request->subcategoryimage->storeAs('subcategoryimage',$imagename,'public');

           

            $subcategorystore->categorie_id = $request->category_id;
            $subcategorystore->name = $request->name;
            if($slugfind>0){
                $count = $slugfind++;
                $subcategorystore->slug =$createslaug.'_'.$slugfind+$count;
    
            }else{
                $subcategorystore->slug =$createslaug;
            }
                 $subcategorystore->status = $request->status;
                 $subcategorystore->image = $imagename;

                 $subcategorystore->save();

                 return back()->with('success','successfully added subcategory');

        }else{
            $subcategorystore->categorie_id = $request->category_id;
            $subcategorystore->name = $request->name;
            if($slugfind>0){
                $count = $slugfind++;
                $subcategorystore->slug =$createslaug.'_'.$slugfind+$count;
    
            }else{
                $subcategorystore->slug =$createslaug;
            }
                 $subcategorystore->status = $request->status;
                //  $subcategorystore->image = $imagename;

                 $subcategorystore->save();

                 return back()->with('success','successfully added subcategory');
        }




    }
      
}
