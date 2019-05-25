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
    		'img_path' => '\images\main\news\NoPath-8.svg',
    		'short_location' => 'СумДУ',
    		'short_description' => 'Lorem ipsum dolor sit amet',
        ]);
        DB::table('preview')->insert([
    		'inner_news_id' => 2,
    		'img_path' => '\images\main\news\NoPath-9.svg',
    		'short_location' => 'СумДУ',
    		'short_description' => 'Lorem ipsum dolor sit amet',
        ]);
        DB::table('preview')->insert([
    		'inner_news_id' => 3,
    		'img_path' => '\images\main\news\NoPath-10.svg',
    		'short_location' => 'СумДУ',
    		'short_description' => 'Lorem ipsum dolor sit amet',
        ]);
        DB::table('preview')->insert([
    		'inner_news_id' => 4,
    		'img_path' => '\images\main\news\NoPath-11.svg',
    		'short_location' => 'СумДУ',
    		'short_description' => 'Lorem ipsum dolor sit amet',
        ]);
        DB::table('preview')->insert([
    		'inner_news_id' => 5,
    		'img_path' => '\images\main\news\NoPath-12.svg',
    		'short_location' => 'СумДУ',
    		'short_description' => 'Lorem ipsum dolor sit amet',
        ]);
        DB::table('preview')->insert([
    		'inner_news_id' => 6,
    		'img_path' => '/images/main/brands/cisco.png',
    		'short_location' => 'СумДУ',
    		'short_description' => 'Lorem ipsum dolor sit amet',
        ]);
        DB::table('preview')->insert([
            'inner_news_id' => 11,
            'img_path' => '/images/main/brands/portaone.png',
            'short_location' => 'СумДУ',
            'short_description' => 'Lorem ipsum dolor sit amet',
        ]);
        DB::table('preview')->insert([
            'inner_news_id' => 7,
            'img_path' => '/images/main/brands/cisco.png',
            'short_location' => 'СумДУ',
            'short_description' => 'Lorem ipsum dolor sit amet',
        ]);
        DB::table('preview')->insert([
            'inner_news_id' => 8,
            'img_path' => '/images/main/brands/cisco.png',
            'short_location' => 'СумДУ',
            'short_description' => 'Lorem ipsum dolor sit amet',
        ]);
        DB::table('preview')->insert([
            'inner_news_id' => 9,
            'img_path' => '/images/main/announcement/fourth.svg',
            'short_location' => 'СумДУ',
            'short_description' => 'Lorem ipsum dolor sit amet',
        ]);
        DB::table('preview')->insert([
            'inner_news_id' => 10,
            'img_path' => '/images/main/announcement/second.svg',
            'short_location' => 'СумДУ',
            'short_description' => 'Lorem ipsum dolor sit amet',
        ]);
        DB::table('preview')->insert([
            'inner_news_id' => 12,
            'img_path' => '/images/main/announcement/third.svg',
            'short_location' => 'СумДУ',
            'short_description' => 'Lorem ipsum dolor sit amet',
        ]);
    }
}
