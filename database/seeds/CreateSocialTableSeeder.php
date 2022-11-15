<?php

use App\Social;
use Illuminate\Database\Seeder;

class CreateSocialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('socials')->delete();
        
        $social = Social::create([

            'facebook'=>'https://www.facebook.com/HiTechParks/',
            'twitter'=>'https://twitter.com/hitechparks',
            'linkedin'=>'https://www.linkedin.com/company/hi-techparks/',
            'pinterest'=>'https://www.pinterest.com/hitechparks/',
            'whatsapp'=>'+8801740473189',
            
        ]);
    }
}
