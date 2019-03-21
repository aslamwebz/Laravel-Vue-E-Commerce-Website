<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_to',
        'order_date',
        'due_date',
        'order_details',
        'order_status',
    ];
}