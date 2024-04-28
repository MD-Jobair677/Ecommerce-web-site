<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    
  public function addcategorypage(){
    return view('admin.admincontant.createctegory');
  }

// STORE CATEGORY
  function  store(Request $request){
    // return $request->name;
 $valodate  = validator::make($request->all(),[
        'name'=>'required|max:30|string',
        'slug'=>'required|max:30|string',
        'status'=>'required',
        'is_featured'=>'required',

    ]);

    if($valodate->passes()){

        $category= new Categorie();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->status = $request->status;
        $category->is_featured = $request->is_featured;
        $category->save();
        Session::flash('success', 'The data has been saved successfully.');


        return response()->json([
            'status'=>true,
            'message'=>'successfully added',
            
            
        ]);

    }else{
        return response()->json([
            'status'=>false,
            'erorrs'=>$valodate->errors(),
        ]);
    }

   
  }

  // ALL CATEGORY

  function allcategory( Request $request){
    $categoris = Categorie::latest()->paginate(20);

    if($request->keyword){
      $categoris = Categorie::where('name','like','%'.$request->keyword.'%')->paginate();
      // return view('admin.admincontant.allcategory',compact('categoris'));
      

    }
    // $categoris =  $categoris->paginate(10);
    // dd($categoris);
    return view('admin.admincontant.allcategory',compact('categoris'));
    
  }


  // STATUS UPDATE

  function status(Request $request){

    $categorystatus = Categorie::find($request->id);

    if($categorystatus->status==1){
      $categorystatus->status= 0;
      $categorystatus->save();
      return 'true';


    }else{
      $categorystatus->status=1;
      $categorystatus->save();
      return 'false';
    }
  }

  //UPDATEM PAGE

  function updatepage($id){
    $edite =  Categorie::find($id);


    return view('admin.admincontant.updatecategory',compact('edite'));
  }

  // UPDATE
  function update(Request $request,$id){

    $updatesinglecategory =  Categorie::find($id);
    // dd($updatesinglecategory);

    $request->validate([
      'name'=>'required|max:30|string',
        'slug'=>'required|max:30|string',
        'status'=>'required',

    ]);

    
        $updatesinglecategory->name = $request->name;
        $updatesinglecategory->slug = $request->slug;
        $updatesinglecategory->status = $request->status;
        $updatesinglecategory->save();

        return redirect()->route('admin.allcategory')->with('success','Update successfully');

  }

// DELETE
 function delete($id){

 $delete = Categorie::findOrFail($id);
 $delete->delete();
 return back();

 }



}
