<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;
    protected $filable = [
                    'fname',
                    'lname',
                    'email',
                    'phone',
                    'adress1',
                    'adress2',
                    'city',
                    'state',
                    'country',
                    'pincode',
                    'state',
                    'message',
                    'tracking_no'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
