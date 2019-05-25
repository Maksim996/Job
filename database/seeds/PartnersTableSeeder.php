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
    		'img_path' => '/images/main/brands/amc-bridge.png',
    		'link' => 'http://portaone.com/',
            'name_brand' => 'portaone',
        ]);
        DB::table('partners')->insert([
            'img_path' => '/images/main/brands/cisco.png',
            'link' => 'http://cisco.com/',
            'name_brand' => 'cisco',
        ]);
        DB::table('partners')->insert([
            'img_path' => '/images/main/brands/netcracker.png',
            'link' => 'http://cisco.com/',
            'name_brand' => 'cisco',
        ]);
        DB::table('partners')->insert([
            'img_path' => '/images/main/brands/armg.png',
            'link' => 'http://cisco.com/',
            'name_brand' => 'cisco',
        ]);
        DB::table('partners')->insert([
            'img_path' => '/images/main/brands/mindk.png',
            'link' => 'http://cisco.com/',
            'name_brand' => 'cisco',
        ]);
        DB::table('partners')->insert([
            'img_path' => '/images/main/brands/new-generation.png',
            'link' => 'http://cisco.com/',
            'name_brand' => 'cisco',
        ]);
        DB::table('partners')->insert([
            'img_path' => '/images/main/brands/portaone.png',
            'link' => 'http://portaone.com/',
            'name_brand' => 'portaone',
        ]);
        
    }
}
