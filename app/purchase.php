<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class purchase extends Model
{
    protected $fillable = [
        'sale_date',
        'supplier_name',
        'supplier_address',
        'supplier_contact',
        'supplier_email',
        'payment_type',
        'discount',
        'tax',
        'total',
        'grand_total',
        'sold_by',
        'items',
    ];
}
