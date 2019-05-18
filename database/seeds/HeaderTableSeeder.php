<?php

use Illuminate\Database\Seeder;

class HeaderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('header')->insert([
    		'img_path' => 'http://job.sumdu.edu.ua/header.html',
    		'title' => 'Header_title',
    		'link' => 'http://job.sumdu.edu.ua/',
    		'content' => 'Відділ практики та інтеграційних зв\'язків із замовниками кадрів',
    		'keywords' => 'СумДУ, практика, замовники кадрів',
    		'description' => 'На нашому сайті ви можете дізнатися більше про види практики',
        ]);
    }
}
