<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('category')->insert([
    		'title' => 'Title1',
    		'type' => 'type1',
    		'link' => 'http://job.sumdu.edu.ua/1.html',
        ]);
        DB::table('category')->insert([
    		'title' => 'Title2',
    		'type' => 'type2',
    		'link' => 'http://job.sumdu.edu.ua/2.html',
        ]);
    }
}
