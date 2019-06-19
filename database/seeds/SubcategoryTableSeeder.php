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
    		'title_ua' => 'Нормативні ua',
    		'title_ru' => 'Нормативні ru',
    		'title_us' => 'Нормативні us',
    		'type' => 'type1',
    		'link' => 'http://job.sumdu.edu.ua/1.html',
        ]);
        DB::table('subcategory')->insert([
    		'category_id' => 4,
            'title_ua' => 'Рада роботодавців ua',
            'title_ru' => 'Рада роботодавців ru',
            'title_us' => 'Рада роботодавців us',
    		'type' => 'type2',
    		'link' => 'http://job.sumdu.edu.ua/2.html',
        ]);
        DB::table('subcategory')->insert([
            'category_id' => 4,
            'title_ua' => 'Інші ua',
            'title_ru' => 'Інші ru',
            'title_us' => 'Інші us',
            'type' => 'type2',
            'link' => 'http://job.sumdu.edu.ua/2.html',
        ]);
    }
}
