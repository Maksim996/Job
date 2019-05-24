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
    		'category_id' => 4,
    		'title' => 'Нормативні',
    		'type' => 'type1',
    		'link' => 'http://job.sumdu.edu.ua/1.html',
        ]);
        DB::table('subcategory')->insert([
    		'category_id' => 4,
    		'title' => 'Рада роботодавців',
    		'type' => 'type2',
    		'link' => 'http://job.sumdu.edu.ua/2.html',
        ]);
        DB::table('subcategory')->insert([
            'category_id' => 4,
            'title' => 'Інші',
            'type' => 'type2',
            'link' => 'http://job.sumdu.edu.ua/2.html',
        ]);
    }
}
