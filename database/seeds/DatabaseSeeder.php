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
<<<<<<< HEAD
        for ($i=0; $i < 10; $i++) { 
            $this->call(UsersTableSeeder::class);
            $this->call(CategoriesTableSeeder::class);
            $this->call(ProductsTableSeeder::class);
            $this->call(CustomersTableSeeder::class);
            $this->call(InvoicesTableSeeder::class);
            $this->call(InvoiceDetailsTableSeeder::class);
        }
=======
        $this->call(UsersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(InvoicesTableSeeder::class);
        $this->call(InvoiceDetailsTableSeeder::class);
>>>>>>> 9b9736ab22da749ebcf07691db3dc32b3dcf1fd4
    }
}
