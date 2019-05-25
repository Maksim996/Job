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
    		'title' => 'Головна',
    		'type' => 'type1',
    		'link' => 'http://job.sumdu.edu.ua/1.html',
        ]);
        DB::table('category')->insert([
            'title' => 'Новини',
            'type' => 'type2',
            'link' => 'http://job.sumdu.edu.ua/2.html',
        ]);
        DB::table('category')->insert([
            'title' => 'Працевлаштування та практика',
            'type' => 'type2',
            'link' => 'http://job.sumdu.edu.ua/2.html',
        ]);
        DB::table('category')->insert([
            'title' => 'Документи',
            'type' => 'type2',
            'link' => 'http://job.sumdu.edu.ua/2.html',
        ]);
        DB::table('category')->insert([
            'title' => 'Відомі випускники',
            'type' => 'type2',
            'link' => 'http://job.sumdu.edu.ua/2.html',
        ]);
    }
}
