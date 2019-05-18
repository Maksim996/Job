<?php

use Illuminate\Database\Seeder;

class SliderNewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slider_news')->insert([
    		'inner_news_id' => 1,
    		'img_path' => 'news/new1_1.png',
        ]);
        DB::table('slider_news')->insert([
    		'inner_news_id' => 1,
    		'img_path' => 'news/new1_2.png',
        ]);
        DB::table('slider_news')->insert([
    		'inner_news_id' => 1,
    		'img_path' => 'news/new1_3.png',
        ]);
        DB::table('slider_news')->insert([
    		'inner_news_id' => 2,
    		'img_path' => 'news/new1_1.png',
        ]);
        DB::table('slider_news')->insert([
    		'inner_news_id' => 2,
    		'img_path' => 'news/new1_2.png',
        ]);
        DB::table('slider_news')->insert([
    		'inner_news_id' => 3,
    		'img_path' => 'news/new1_3.png',
        ]);
        DB::table('slider_news')->insert([
    		'inner_news_id' => 4,
    		'img_path' => 'news/new1_1.png',
        ]);
        DB::table('slider_news')->insert([
    		'inner_news_id' => 5,
    		'img_path' => 'news/new1_1.png',
        ]);
        DB::table('slider_news')->insert([
    		'inner_news_id' => 6,
    		'img_path' => 'news/new1_1.png',
        ]);
        DB::table('slider_news')->insert([
    		'inner_news_id' => 7,
    		'img_path' => 'news/new1_1.png',
        ]);
        DB::table('slider_news')->insert([
    		'inner_news_id' => 8,
    		'img_path' => 'news/new1_1.png',
        ]);
        DB::table('slider_news')->insert([
    		'inner_news_id' => 9,
    		'img_path' => 'news/new1_1.png',
        ]);
        DB::table('slider_news')->insert([
    		'inner_news_id' => 10,
    		'img_path' => 'news/new1_1.png',
        ]);
    }
}
