<?php

use Illuminate\Database\Seeder;

class FooterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('footer')->insert([
    		'img_path' => 'footer.png',
    		'link' => 'footer1_link.com',
    		'content_ua' => 'footer1_content',
    		'content_ru' => 'footer1_content ru',
    		'content_us' => 'footer1_content us',
            'type' => 'left_column',
            'name' => 'footer_name',
            'color_bg' => 'footer_color',
        ]);

        DB::table('footer')->insert([
            'img_path' => 'footer.png',
            'link' => 'footer1_link.com',
            'content_ua' => 'footer1_content',
            'content_ru' => 'footer1_content ru',
            'content_us' => 'footer1_content us',
            'type' => 'about_as',
            'name' => 'footer_name',
            'color_bg' => 'footer_color',
        ]);

        DB::table('footer')->insert([
            'img_path' => 'footer.png',
            'link' => 'footer1_link.com',
            'content_ua' => 'footer1_content',
            'content_ru' => 'footer1_content ru',
            'content_us' => 'footer1_content us',
            'type' => 'social',
            'name' => 'footer_name',
            'color_bg' => 'footer_color',
        ]);
    }
}
