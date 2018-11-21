<?php

use Illuminate\Database\Seeder;
use Inventario\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Default'
        ]);

        Category::create([
            'name' => 'Bebidas'
        ]);

        Category::create([
            'name' => 'Golosinas'
        ]);
    }
}
