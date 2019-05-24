<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        	'name' => 'admin',
        	'email' => 'admin@email.com',
        	'password' => Hash::make('admin_password'),
        ]);
        DB::table('users')->insert([
            'name' => 'admin2',
            'email' => 'admin2@email.com',
            'password' => Hash::make('admin2_password'),
        ]);
        DB::table('users')->insert([
            'name' => 'admin3',
            'email' => 'admin3@email.com',
            'password' => Hash::make('admin3_password'),
        ]);
    }
}
