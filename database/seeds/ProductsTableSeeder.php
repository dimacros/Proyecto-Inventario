<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')-> insert([
        	'name' => str_random(20),
        	'category_id' => 1,
        	'price' => 1.99,
        ]);
    }
}
