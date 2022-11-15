<?php

use App\LiveChat;
use Illuminate\Database\Seeder;

class CreateLiveChatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('live_chats')->delete();
        
        $live_chats = LiveChat::create([

            'whatsapp_no'=>'+8801740473189',
            'whatsapp_title'=>'Chat with us on WhatsApp!',
            'whatsapp_greeting'=>'Hello, how can we help you?',
            'whatsapp_color'=>'#269cda',
            'whatsapp_position'=>'1',
            'whatsapp_status'=>'0',
            'facebook_id'=>'1808009959448230',
            'facebook_greeting_in'=>'Hello, how can we help you?',
            'facebook_greeting_out'=>'Hello, how can we help you?',
            'facebook_color'=>'#269cda',
            'facebook_position'=>'1',
            'facebook_status'=>'1',
            
        ]);
    }
}
