<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = [
        'sale_date',
        'customer_name',
        'customer_address',
        'customer_contact',
        'payment_type',
        'discount',
        'tax',
        'total',
        'grand_total',
        'sold_by',
        'items',
    ];

}
