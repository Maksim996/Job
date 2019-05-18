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
    		'content_id' => 1,
    		'card_link' => 'http://job.sumdu.edu.ua/card_1.html',
    		'img_path' => 'card/card_1.png',
    		'card_title' => 'Місце для практики',
    		'card_description' => 'Практика - можливість набратись досвіду',
        ]);
        DB::table('practice_intership_card')->insert([
    		'content_id' => 1,
    		'card_link' => 'http://job.sumdu.edu.ua/card_2.html',
    		'img_path' => 'card/card_2.png',
    		'card_title' => 'Документи для практики',
    		'card_description' => 'Все, що потрібно для практики',
        ]);
        DB::table('practice_intership_card')->insert([
    		'content_id' => 1,
    		'card_link' => 'http://job.sumdu.edu.ua/card_3.html',
    		'img_path' => 'card/card_3.png',
    		'card_title' => 'Центр кар\'єри',
    		'card_description' => 'Практика - можливість набратись досвіду та знайти своє призначення',
        ]);
    }
}
