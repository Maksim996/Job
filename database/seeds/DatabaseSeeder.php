<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(SubcategoryTableSeeder::class);
        $this->call(HeaderTableSeeder::class);
        $this->call(HeaderTableSeeder::class);
        $this->call(PracticeIntershipContentTableSeeder::class);
        $this->call(PracticeIntershipCardTableSeeder::class);
        $this->call(PartnersTableSeeder::class);
        $this->call(InnerNewsTableSeeder::class);
        $this->call(PreviewTableSeeder::class);
        $this->call(SliderNewsTableSeeder::class);
        $this->call(FooterTableSeeder::class);
        $this->call(DocumentsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
    }
}
