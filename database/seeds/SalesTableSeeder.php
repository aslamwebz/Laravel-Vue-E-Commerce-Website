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
            'sale_date' => date('Y:m:d'),
            'customer_name' => 'ABF Company',
            'customer_email' => 'abf@abf.com',
            'customer_address' => 'ABF Company, 24, southern',
            'customer_contact' => '123114455',
            'payment_type'=> 'Visa',
            'discount'=> 2,
            'tax'=> 3,
            'total'=> 5000,
            'grand_total'=> 5500,
            'sold_by' => 'Admin',
            'items' => 'a:3:{i:0;a:5:{s:2:"id";i:1;s:12:"product_name";s:52:"Dell Inspiron 15 3000 series-3576 (8th Gen. Core i3)";s:8:"quantity";s:1:"5";s:5:"price";s:1:"5";s:4:"cost";s:1:"5";}i:1;a:5:{s:2:"id";i:2;s:12:"product_name";s:40:"Black Copper thermal Pos reciept printer";s:8:"quantity";s:1:"5";s:5:"price";s:1:"5";s:4:"cost";s:1:"5";}i:2;a:5:{s:2:"id";i:6;s:12:"product_name";s:34:"WD Portable USB 3.0 Hard Disk Case";s:8:"quantity";s:1:"5";s:5:"price";s:1:"5";s:4:"cost";s:1:"5";}}',
        ]);

        DB::table('sales')->insert([
            'sale_date' => date('Y:m:d'),
            'customer_name' => 'Iac Company',
            'customer_email' => 'Iac@Iac.com',
            'customer_address' => 'Iac Company, 24, southern',
            'customer_contact' => '123114455',
            'payment_type'=> 'Visa',
            'discount'=> 2,
            'tax'=> 3,
            'total'=> 5000,
            'grand_total'=> 5500,
            'sold_by' => 'Admin',
            'items' => 'a:3:{i:0;a:5:{s:2:"id";i:1;s:12:"product_name";s:52:"Dell Inspiron 15 3000 series-3576 (8th Gen. Core i3)";s:8:"quantity";s:1:"5";s:5:"price";s:1:"5";s:4:"cost";s:1:"5";}i:1;a:5:{s:2:"id";i:2;s:12:"product_name";s:40:"Black Copper thermal Pos reciept printer";s:8:"quantity";s:1:"5";s:5:"price";s:1:"5";s:4:"cost";s:1:"5";}i:2;a:5:{s:2:"id";i:6;s:12:"product_name";s:34:"WD Portable USB 3.0 Hard Disk Case";s:8:"quantity";s:1:"5";s:5:"price";s:1:"5";s:4:"cost";s:1:"5";}}',
        ]);

        DB::table('sales')->insert([
            'sale_date' => date('Y:m:d'),
            'customer_name' => 'DEB Company',
            'customer_email' => 'DEB@DEB.com',
            'customer_address' => 'DEB Company, 24, southern',
            'customer_contact' => '123114455',
            'payment_type'=> 'Visa',
            'discount'=> 2,
            'tax'=> 3,
            'total'=> 3000,
            'grand_total'=> 2500,
            'sold_by' => 'Admin',
            'items' => 'a:3:{i:0;a:5:{s:2:"id";i:1;s:12:"product_name";s:52:"Dell Inspiron 15 3000 series-3576 (8th Gen. Core i3)";s:8:"quantity";s:1:"5";s:5:"price";s:1:"5";s:4:"cost";s:1:"5";}i:1;a:5:{s:2:"id";i:2;s:12:"product_name";s:40:"Black Copper thermal Pos reciept printer";s:8:"quantity";s:1:"5";s:5:"price";s:1:"5";s:4:"cost";s:1:"5";}i:2;a:5:{s:2:"id";i:6;s:12:"product_name";s:34:"WD Portable USB 3.0 Hard Disk Case";s:8:"quantity";s:1:"5";s:5:"price";s:1:"5";s:4:"cost";s:1:"5";}}',
        ]);

        DB::table('sales')->insert([
            'sale_date' => date('Y:m:d'),
            'customer_name' => 'EAZ Company',
            'customer_email' => 'EAZ@EAZ.com',
            'customer_address' => 'EAZ Company, 24, southern',
            'customer_contact' => '123114455',
            'payment_type'=> 'Visa',
            'discount'=> 2,
            'tax'=> 3,
            'total'=> 4000,
            'grand_total'=> 4500,
            'sold_by' => 'Admin',
            'items' => 'a:3:{i:0;a:5:{s:2:"id";i:1;s:12:"product_name";s:52:"Dell Inspiron 15 3000 series-3576 (8th Gen. Core i3)";s:8:"quantity";s:1:"5";s:5:"price";s:1:"5";s:4:"cost";s:1:"5";}i:1;a:5:{s:2:"id";i:2;s:12:"product_name";s:40:"Black Copper thermal Pos reciept printer";s:8:"quantity";s:1:"5";s:5:"price";s:1:"5";s:4:"cost";s:1:"5";}i:2;a:5:{s:2:"id";i:6;s:12:"product_name";s:34:"WD Portable USB 3.0 Hard Disk Case";s:8:"quantity";s:1:"5";s:5:"price";s:1:"5";s:4:"cost";s:1:"5";}}',
        ]);

    }
}
