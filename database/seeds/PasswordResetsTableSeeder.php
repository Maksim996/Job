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
    		'email' => 'admin@email.com',
    		'token' => 'admin_user_password_reset_token',
        ]);
    }
}
