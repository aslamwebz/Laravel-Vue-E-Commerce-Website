<?php

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'customer_name' => 'ABF Company',
            'customer_email' => 'abf@abf.com',
            'customer_address' => 'ABF Company, 24, southern',
            'customer_contact' => '123114455',
        ]);
    }
}
