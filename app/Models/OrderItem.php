<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Order;

class OrderItem extends Model
{
        use HasFactory;
        protected $fillable = [
            'order_id',
            'prod_id',
            'qty',
            'price'
        ];
        public function product(){
            return $this->belongsTo(Product::class,'prod_id','id');
        }

}
