<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class purchase extends Model
{
    protected $fillable = [
        'purchase_date',
        'supplier_name',
        'supplier_address',
        'supplier_contact',
        'payment_type',
        'discount',
        'tax',
        'total',
        'grand_total',
        'purchased_by',
        'purchases',
    ];
}
