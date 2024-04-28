<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status',
        
    ];


     function Subcategorie(){
        return $this->hasMany(Subcategorie::class);
     }


    //  BRAND
     function Brand(){
        return $this->hasMany(Brand::class);
     }


   //   PRODUCT
   function Product(){
      return $this->hasMany(Product::class);
   }

}
