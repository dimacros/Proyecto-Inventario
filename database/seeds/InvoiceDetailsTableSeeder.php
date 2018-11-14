<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoice_details')-> insert([
        	'product_id' => 1,
        	'quantity' => 2,
        	'price' => 1.99,
        	'invoice_id' => 1,
        ]);
    }
}
