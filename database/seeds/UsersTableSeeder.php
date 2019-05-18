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
        	'name' => 'admin1',
        	'email' => 'admin1@email.com',
        	'password' => 'admin1_password',
        ]);
        DB::table('users')->insert([
        	'name' => 'admin2',
        	'email' => 'admin2@email.com',
        	'password' => 'admin2_password',
        ]);
    }
}
