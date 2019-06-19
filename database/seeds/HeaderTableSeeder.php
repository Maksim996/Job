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
    		'img_path' => '',
    		'title_ua' => 'Header_title',
    		'title_ru' => 'Header_title ru',
    		'title_us' => 'Header_title us',
    		'link' => 'http://job.sumdu.edu.ua/',
    		'content_ua' => 'Відділ практики та інтеграційних зв\'язків із замовниками кадрів',
    		'content_ru' => 'Відділ практики та інтеграційних зв\'язків із замовниками кадрів ru',
    		'content_us' => 'Відділ практики та інтеграційних зв\'язків із замовниками кадрів us',
    		'keywords' => 'СумДУ, практика, замовники кадрів',
    		'description' => 'На нашому сайті ви можете дізнатися більше про види практики',
        ]);
    }
}
