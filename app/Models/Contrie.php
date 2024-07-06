<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contrie extends Model
{
    use HasFactory;

    function ShippingCharge(){
        return $this->hasMany(ShippingCharge::class);
    }
}
