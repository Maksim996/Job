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
    		'title' => 'Отже, що таке практика та стажування',
    		'content' => 'Практика - складова навчального процесу, а стажування передбачає отримання практичного досвіду',
        ]);
    }
}
