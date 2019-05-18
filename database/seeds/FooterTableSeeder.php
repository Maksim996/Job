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
    		'content' => 'footer1_content',
        ]);
    }
}
