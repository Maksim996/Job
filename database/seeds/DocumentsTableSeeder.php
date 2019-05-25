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
    		'title' => 'Document1',
    		'doc_date' => '2019-05-17 00:00:00',
    		'file_link' => 'http://job.sumdu.edu.ua/document1.pdf',
        ]);
        DB::table('documents')->insert([
            'subcategory_id' => 1,
            'title' => 'Document12',
            'doc_date' => '2019-05-17 00:00:00',
            'file_link' => 'http://job.sumdu.edu.ua/document1.pdf',
        ]);
        DB::table('documents')->insert([
            'subcategory_id' => 2,
            'title' => 'Document21',
            'doc_date' => '2019-05-17 00:00:00',
            'file_link' => 'http://job.sumdu.edu.ua/document1.pdf',
        ]);
        DB::table('documents')->insert([
            'subcategory_id' => 2,
            'title' => 'Document22',
            'doc_date' => '2019-05-17 00:00:00',
            'file_link' => 'http://job.sumdu.edu.ua/document1.pdf',
        ]);
        DB::table('documents')->insert([
            'subcategory_id' => 2,
            'title' => 'Document23',
            'doc_date' => '2019-05-17 00:00:00',
            'file_link' => 'http://job.sumdu.edu.ua/document1.pdf',
        ]);
        DB::table('documents')->insert([
            'subcategory_id' => 3,
            'title' => 'Document31',
            'doc_date' => '2019-05-17 00:00:00',
            'file_link' => 'http://job.sumdu.edu.ua/document1.pdf',
        ]);
        DB::table('documents')->insert([
            'subcategory_id' => 3,
            'title' => 'Document32',
            'doc_date' => '2019-05-17 00:00:00',
            'file_link' => 'http://job.sumdu.edu.ua/document1.pdf',
        ]);
    }
}
