<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        /*
        factory(app\User::class, 10)->create()->each(function ($user) {
        $user->posts()->save(factory(App\Post::class)->make());
        });*/
    }
}
