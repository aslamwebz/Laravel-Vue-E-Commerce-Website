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

        DB::table('customers')->insert([
            'customer_name' => 'DEB Company',
            'customer_email' => 'DEB@DEB.com',
            'customer_address' => 'DEB Company, 24, southern',
            'customer_contact' => '123114455',
        ]);


        DB::table('customers')->insert([
            'customer_name' => 'EAZ Company',
            'customer_email' => 'EAZ@EAZ.com',
            'customer_address' => 'EAZ Company, 24, southern',
            'customer_contact' => '123114455',
        ]);

        DB::table('customers')->insert([
            'customer_name' => 'Iac Company',
            'customer_email' => 'Iac@Iac.com',
            'customer_address' => 'Iac Company, 24, southern',
            'customer_contact' => '123114455',
        ]);
    }
}
