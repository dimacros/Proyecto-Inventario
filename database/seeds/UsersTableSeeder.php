<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'email' => str_random(10).'@hotmail.com',
        	'first_name' => str_random(15),
        	'last_name' => str_random(15),
        	'password' => bcrypt('secret'),
        ]);
    }
}
