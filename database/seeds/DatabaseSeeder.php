<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call(CreateLanguageSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(CreateSocialTableSeeder::class);
        $this->call(CreateSettingTableSeeder::class);
        $this->call(CreateLiveChatTableSeeder::class);
        $this->call(CreatePageSetupTableSeeder::class);
    }
}
