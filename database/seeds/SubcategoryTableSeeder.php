<?php

use Illuminate\Database\Seeder;

class SubcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategory')->insert([
    		'category_id' => 1,
    		'title' => 'Title1',
    		'type' => 'type1',
    		'link' => 'http://job.sumdu.edu.ua/1.html',
        ]);
        DB::table('subcategory')->insert([
    		'category_id' => 2,
    		'title' => 'Title2',
    		'type' => 'type2',
    		'link' => 'http://job.sumdu.edu.ua/2.html',
        ]);
    }
}
