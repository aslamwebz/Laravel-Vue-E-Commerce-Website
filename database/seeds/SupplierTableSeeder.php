<?php

use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
            'supplier_name' => 'ABF Company',
            'supplier_email' => 'abf@abf.com',
            'supplier_address' => 'ABF Company, 24, southern',
            'supplier_contact' => '123114455',
        ]);

        DB::table('suppliers')->insert([
            'supplier_name' => 'DEB Company',
            'supplier_email' => 'DEB@DEB.com',
            'supplier_address' => 'DEB Company, 24, southern',
            'supplier_contact' => '123114455',
        ]);


        DB::table('suppliers')->insert([
            'supplier_name' => 'EAZ Company',
            'supplier_email' => 'EAZ@EAZ.com',
            'supplier_address' => 'EAZ Company, 24, southern',
            'supplier_contact' => '123114455',
        ]);

        DB::table('suppliers')->insert([
            'supplier_name' => 'Iac Company',
            'supplier_email' => 'Iac@Iac.com',
            'supplier_address' => 'Iac Company, 24, southern',
            'supplier_contact' => '123114455',
        ]);
    }
}
