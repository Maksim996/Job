<?php

use Illuminate\Database\Seeder;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('documents')->insert([
    		'subcategory_id' => 1,
    		'title_ua' => 'Document1',
    		'title_ru' => 'Document1',
    		'title_us' => 'Document1',
    		'doc_date' => '2019-05-17 00:00:00',
    		'file_link' => 'http://job.sumdu.edu.ua/document1.pdf',
            'type' => 'file',
        ]);
        DB::table('documents')->insert([
            'subcategory_id' => 2,
            'title_ua' => 'Document12',
            'title_ru' => 'Document12',
            'title_us' => 'Document12',
            'doc_date' => '2019-05-17 00:00:00',
            'file_link' => 'http://job.sumdu.edu.ua/document1.pdf',
            'type' => 'file',

        ]);
        DB::table('documents')->insert([
            'subcategory_id' => 3,
            'title_ua' => 'Document21',
            'title_ru' => 'Document21',
            'title_us' => 'Document21',
            'doc_date' => '2019-05-17 00:00:00',
            'file_link' => 'http://job.sumdu.edu.ua/document1.pdf',
            'type' => 'file',

        ]);
        DB::table('documents')->insert([
            'subcategory_id' => 1,
            'title_ua' => 'Document12',
            'title_ru' => 'Document12',
            'title_us' => 'Document12',
            'doc_date' => '2019-05-17 00:00:00',
            'file_link' => 'http://job.sumdu.edu.ua/document1.pdf',
            'type' => 'link',

        ]);
        DB::table('documents')->insert([
            'subcategory_id' => 2,
            'title_ua' => 'Document21',
            'title_ru' => 'Document21',
            'title_us' => 'Document21',
            'doc_date' => '2019-05-17 00:00:00',
            'file_link' => 'http://job.sumdu.edu.ua/document1.pdf',
            'type' => 'link',

        ]);

    }
}
