<?php

use Illuminate\Database\Seeder;
use Inventario\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $this->createAdmin();
    }

    private function createAdmin() {

        User::create([ 
            'first_name' => 'Admin',
            'last_name' => '',
            'email' => 'admin@localhost.com',
            'password' => bcrypt('123456'), 
            'remember_token' => str_random(10)
        ]);
    
    }
}
