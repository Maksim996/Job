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
    		'title_ua' => 'Головна',
    		'title_ru' => 'Головна ru',
    		'title_us' => 'Головна us',
    		'type' => 'type1',
    		'link' => 'http://job.sumdu.edu.ua/1.html',
        ]);
        DB::table('category')->insert([
            'title_ua' => 'Новини',
            'title_ru' => 'Новини ru',
            'title_us' => 'Новини us',
            'type' => 'type2',
            'link' => 'http://job.sumdu.edu.ua/2.html',
        ]);
        DB::table('category')->insert([
            'title_ua' => 'Працевлаштування та практика',
            'title_ru' => 'Працевлаштування та практика ru',
            'title_us' => 'Працевлаштування та практика us',
            'type' => 'type2',
            'link' => 'http://job.sumdu.edu.ua/2.html',
        ]);
        DB::table('category')->insert([
            'title_ua' => 'Документи',
            'title_ru' => 'Документи ru',
            'title_us' => 'Документи us',
            'type' => 'type2',
            'link' => 'http://job.sumdu.edu.ua/2.html',
        ]);
        DB::table('category')->insert([
            'title_ua' => 'Відомі випускники',
            'title_ru' => 'Відомі випускники ru',
            'title_us' => 'Відомі випускники us',
            'type' => 'type2',
            'link' => 'http://job.sumdu.edu.ua/2.html',
        ]);

    }
}
