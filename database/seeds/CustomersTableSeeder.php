<?php

use Illuminate\Database\Seeder;
use Inventario\Customer;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Customer::class, 20)->create();
        factory(Customer::class, 20)->states('company')->create(); 
    }
}
