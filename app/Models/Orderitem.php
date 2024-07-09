<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model
{
    use HasFactory;

    function myorder(){
        return $this->belongsTo(Myorder::class);
    }


    function product(){
        return $this->belongsTo(Product::class);
    }
}
