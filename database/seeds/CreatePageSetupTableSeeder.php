<?php

use Illuminate\Database\Seeder;

class CreatePageSetupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('page_setups')->delete();

        $page_setups = [
            ['title' => 'Home', 'slug' => 'home', 'meta_title' => 'Home'],
            ['title' => 'Knowledge Base', 'slug' => 'article', 'meta_title' => 'Knowledge Base'],
            ['title' => 'FAQs', 'slug' => 'faq', 'meta_title' => 'FAQs'],
            ['title' => 'Videos', 'slug' => 'video', 'meta_title' => 'Videos'],
            ['title' => 'Contact Us', 'slug' => 'contact', 'meta_title' => 'Contact Us'],
        ];

        DB::table('page_setups')->insert($page_setups);
    }
}
