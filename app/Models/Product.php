<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // CATEGORY
    function Categorie(){
        return $this->belongsTo(Categorie::class);
    }
   
    function orderitem(){
        return $this->hasMany(Orderitem::class);
    }
   
    function wishlist (){

        return  $this->hasMany(Wishlist::class);
  
      }


      function brand(){
        return $this->belongsTo(Brand::class);
    }




}
