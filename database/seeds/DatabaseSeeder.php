<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
            $this->call(UsersTableSeeder::class);
            $this->call(CategoriesTableSeeder::class);
            $this->call(ProductsTableSeeder::class);
            $this->call(CustomersTableSeeder::class);
            $this->call(InvoicesTableSeeder::class);
            $this->call(InvoiceDetailsTableSeeder::class);
        }
    }
}
