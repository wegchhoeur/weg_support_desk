<?php

use App\Language;
use Illuminate\Database\Seeder;

class CreateLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->delete();
        
        $languages = Language::create([
            
            'name'=>'English',
            'code'=>'en',
            'direction'=>'0',
            'default'=>'1',
            'status'=>'1',
            
        ]);
    }
}
