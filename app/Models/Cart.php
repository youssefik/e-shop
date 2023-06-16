<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $filable = [
                    'user_id',
                    'prod_id',
                    'prod_qty'
                ];

    public function products(){
        return $this->belongsTo(Product::class,'prod_id','id');
    }
}
