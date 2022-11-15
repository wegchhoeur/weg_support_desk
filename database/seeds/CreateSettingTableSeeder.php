<?php

use App\Setting;
use Illuminate\Database\Seeder;

class CreateSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        $setting = Setting::create([

            'title'=>'Help Desk',
            'description'=>'Help Desk - is a customer support system, Where a visitor can find various knowledge base articles, video tutorials & FAQs. Its developed for build dynamic customer support manager. This kind of application will help your customers even when you are in offline.',
            'keywords'=>'article, article manager, knowledge, knowledge base, faq, help desk, helpdesk, knowledgebase, support, customer support,  q & a, Q/A, question and answer, customer help, video tutorial',
            'logo_path'=>'logo.png',
            'favicon_path'=>'favicon.png',
            'phone_one'=>'+880123456789',
            'email_one'=>'example@mail.com',
            'contact_address'=>'Mirpur, Dhaka',
            'contact_mail'=>'example@mail.com',
            'footer_text'=>'2021 - Help Desk | Created By_ <a href="https://hitechparks.com/" target="_blank">Hi-Tech Parks</a>',
            'custom_css'=>' /** theme customize css **/ ',
            'status'=>'1'
            
        ]);
    }
}
