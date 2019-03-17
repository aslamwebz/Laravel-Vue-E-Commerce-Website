<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $primaryKey = 'pid';

    protected $fillable = [
        'product_name',
        'product_cost',
        'product_price',
        'product_quantity',
        'product_image',
        'product_description', 
    ];
}
