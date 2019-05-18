<?php

use Illuminate\Database\Seeder;

class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('partners')->insert([
    		'img_path' => 'partners/porta_one.png',
    		'link' => 'http://portaone.com/',
        ]);
        DB::table('partners')->insert([
    		'img_path' => 'partners/cisco.png',
    		'link' => 'http://cisco.com/',
        ]);
    }
}
