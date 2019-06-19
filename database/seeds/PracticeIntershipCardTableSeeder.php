<?php

use Illuminate\Database\Seeder;

class PracticeIntershipCardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('practice_intership_card')->insert([
    		'card_link' => 'http://job.sumdu.edu.ua/card_1.html',
    		'img_path' => '\images\main\practice\deal.svg',
    		'card_title_ua' => 'Місце для практики',
    		'card_title_ru' => 'Місце для практики ru',
    		'card_title_us' => 'Місце для практики us',
    		'card_description_ua' => 'Практика - можливість набратись досвіду',
    		'card_description_ru' => 'Практика - можливість набратись досвіду ru',
    		'card_description_us' => 'Практика - можливість набратись досвіду us',
        ]);
        DB::table('practice_intership_card')->insert([
    		'card_link' => 'http://job.sumdu.edu.ua/card_2.html',
    		'img_path' => '\images\main\practice\migrate.svg',
    		'card_title_ua' => 'Документи для практики',
    		'card_title_ru' => 'Документи для практики ru',
    		'card_title_us' => 'Документи для практики us',
    		'card_description_ua' => 'Все, що потрібно для практики',
    		'card_description_ru' => 'Все, що потрібно для практики ru',
    		'card_description_us' => 'Все, що потрібно для практики us',
        ]);
        DB::table('practice_intership_card')->insert([
    		'card_link' => 'http://job.sumdu.edu.ua/card_3.html',
    		'img_path' => '\images\main\practice\share.svg',
    		'card_title_ua' => 'Центр кар\'єри',
    		'card_title_ru' => 'Центр кар\'єри ru',
    		'card_title_us' => 'Центр кар\'єри us',
    		'card_description_ua' => 'Практика - можливість набратись досвіду та знайти своє призначення',
    		'card_description_ru' => 'Практика - можливість набратись досвіду та знайти своє призначення ru',
    		'card_description_us' => 'Практика - можливість набратись досвіду та знайти своє призначення us',
        ]);
    }
}
