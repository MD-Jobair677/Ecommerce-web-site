<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    function Categorie(){
        return $this->belongsTo(Categorie::class);
    }
    
    function product(){
        return $this->hasMany(Product::class);
    }




}
