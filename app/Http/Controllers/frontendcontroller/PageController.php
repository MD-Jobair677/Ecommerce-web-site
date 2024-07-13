<?php

namespace App\Http\Controllers\frontendcontroller;

use App\Models\Page;
use App\Http\Traits\Traits;
use Illuminate\Support\Str;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{

    use Traits;
    function contactUs(Request $request){

        if($request->keyword){
            
        $pages = Page:: where('page_name','Like','%'.$request->keyword.'%')-> select(['page_name','discription']) ->paginate();

        
        }else{
            $pages = Page::select(['page_name','discription'])->paginate();

        }

      

        return view('admin.admincontant.all_Page',compact('pages'));
    }


    // CREATE CONTACT USE PAGE

    function createContactPage(){

        return view('admin.admincontant.create_page');
    }

    // STORE PAGE
    
    function storePage(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:1000',
        ]);


        $slug = Str::slug($request->title);


            $slugCount = Page::where('slug','Like','%'.$slug.'%')->count();

            // dd($slugCount);

            
        if($slugCount > 0){
            $slugCount++;
            $page = new Page();
            $page->page_name = $validatedData['title'];
            $page->discription = $validatedData['description'];
            $page->slug = $this->slug(Page::class,$slug);
            $page->save();


        }else{
            $page = new Page();
            $page->page_name = $validatedData['title'];
            $page->discription = $validatedData['description'];
            $page->slug = $this->slug(Page::class,$slug);
            $page->save();

        }




     

        return back()->with('success','successfully add page');
        
    }

}
