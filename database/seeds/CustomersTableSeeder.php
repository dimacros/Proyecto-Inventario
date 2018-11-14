<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
        	'document' => str_random(25),
        	'document_number' => str_random(15),
        	'full_name' => str_random(25),
        	'phone' => '000999888777',
        ]);
    }
}
