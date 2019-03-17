<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sales')->insert([
            'product_id' => '10',
            'sale_date' => date('Y:m:d'),
            'sold_to'=> 'Mr. Unknown',
            'payment_method'=> 'Visa',
            'quantity'=> '12',
            'description'=> 'Tech Hand Bag',
            'unit_price'=> '10',
            'discount'=> '2',
            'sold_by'=> 'Admin',
            'total'=> '120',
            
        ]);

        DB::table('sales')->insert([
            'product_id' => '10',
            'sale_date' => date('Y:m:d'),
            'sold_to'=> 'Mr. Unknown',
            'payment_method'=> 'Visa',
            'quantity'=> '12',
            'description'=> 'Tech Shoe',
            'unit_price'=> '10',
            'discount'=> '2',
            'sold_by'=> 'Admin',
            'total'=> '120',

        ]);

        DB::table('sales')->insert([
            'product_id' => '10',
            'sale_date' => date('Y:m:d'),
            'sold_to'=> 'Mr. Unknown',
            'payment_method'=> 'Visa',
            'quantity'=> '12',
            'description'=> 'Keybaord',
            'unit_price'=> '10',
            'discount'=> '2',
            'sold_by'=> 'Admin',
            'total'=> '120',

        ]);

        DB::table('sales')->insert([
            'product_id' => '10',
            'sale_date' => date('Y:m:d'),
            'sold_to'=> 'Mr. Unknown',
            'payment_method'=> 'Visa',
            'quantity'=> '12',
            'description'=> 'Mouse',
            'unit_price'=> '10',
            'discount'=> '2',
            'sold_by'=> 'Admin',
            'total'=> '120',

        ]);

    }
}
