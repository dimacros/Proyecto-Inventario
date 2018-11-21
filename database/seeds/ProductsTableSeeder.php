<?php

use Illuminate\Database\Seeder;
use Inventario\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Inca Kola 1L', 
            'category_id' => 2, 
            'price' => 3.00
        ]);

        Product::create([
            'name' => 'Coca Cola 2L', 
            'category_id' => 2, 
            'price' => 4.50
        ]);

        Product::create([
            'name' => 'Sprite 1L', 
            'category_id' => 2, 
            'price' => 2.50
        ]);
    }
}
