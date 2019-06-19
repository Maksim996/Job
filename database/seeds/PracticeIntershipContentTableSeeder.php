<?php

use Illuminate\Database\Seeder;

class PracticeIntershipContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('practice_intership_content')->insert([
    		'title_ua' => 'Отже, що таке практика та стажування ua',
    		'title_ru' => 'Отже, що таке практика та стажування ru',
    		'title_us' => 'Отже, що таке практика та стажування us',
    		'content_ua' => 'Практика - складова навчального процесу, а стажування передбачає отримання практичного досвіду ua',
    		'content_ru' => 'Практика - складова навчального процесу, а стажування передбачає отримання практичного досвіду ru',
    		'content_us' => 'Практика - складова навчального процесу, а стажування передбачає отримання практичного досвіду us',
        ]);
    }
}
