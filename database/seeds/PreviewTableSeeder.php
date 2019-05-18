<?php

use Illuminate\Database\Seeder;

class PreviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('preview')->insert([
    		'inner_news_id' => 1,
    		'img_path' => 'preview/prev1.png',
    		'short_location' => 'СумДУ',
    		'short_description' => 'Lorem ipsum dolor sit amet',
        ]);
        DB::table('preview')->insert([
    		'inner_news_id' => 2,
    		'img_path' => 'preview/prev1.png',
    		'short_location' => 'СумДУ',
    		'short_description' => 'Lorem ipsum dolor sit amet',
        ]);
        DB::table('preview')->insert([
    		'inner_news_id' => 3,
    		'img_path' => 'preview/prev1.png',
    		'short_location' => 'СумДУ',
    		'short_description' => 'Lorem ipsum dolor sit amet',
        ]);
        DB::table('preview')->insert([
    		'inner_news_id' => 4,
    		'img_path' => 'preview/prev1.png',
    		'short_location' => 'СумДУ',
    		'short_description' => 'Lorem ipsum dolor sit amet',
        ]);
        DB::table('preview')->insert([
    		'inner_news_id' => 5,
    		'img_path' => 'preview/prev1.png',
    		'short_location' => 'СумДУ',
    		'short_description' => 'Lorem ipsum dolor sit amet',
        ]);
        DB::table('preview')->insert([
    		'inner_news_id' => 6,
    		'img_path' => 'preview/prev1.png',
    		'short_location' => 'СумДУ',
    		'short_description' => 'Lorem ipsum dolor sit amet',
        ]);
    }
}
