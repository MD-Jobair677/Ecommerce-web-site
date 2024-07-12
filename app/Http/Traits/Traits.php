<?php
namespace App\Http\Traits;

use App\Models\Page;


trait Traits
{
   public function slug($model,$slug){

        $slugCount = $model::where('slug','Like','%'.$slug.'%')->count();


        if($slugCount > 0){
            $slugCount++;
           return  $slug."-".$slugCount;


        }else{
            return  $slug;

        }







    }
}
