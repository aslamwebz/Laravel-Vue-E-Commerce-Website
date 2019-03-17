<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = [
        'product_id',
        'sale_date',
        'customer_name',
        'customer_address',
        'customer_contact',
        'payment_type',
        'quantity',
        'description',
        'unit_price',
        'grand_total',
        'discount',
        'tax',
        'sold_by',
    ];
}
