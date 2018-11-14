<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoices')-> insert([
        	'customer_id' => 1,
        	'discount' => 0.99,
        	'sub_total' => 5.99,
        	'status' => str_random(15),
        	'note' => str_random(90),
        	'user_id' => 1,
        ]);
    }
}
