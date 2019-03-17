<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $fillable = [
        'customer_name','customer_email','customer_address','customer_contact'
    ];
}
