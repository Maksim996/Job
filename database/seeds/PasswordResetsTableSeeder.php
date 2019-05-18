<?php

use Illuminate\Database\Seeder;

class PasswordResetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('password_resets')->insert([
    		'email' => 'admin1@email.com',
    		'token' => 'admin1_token',
        ]);
        DB::table('password_resets')->insert([
    		'email' => 'admin2@email.com',
    		'token' => 'admin2_token',
        ]);
    }
}
