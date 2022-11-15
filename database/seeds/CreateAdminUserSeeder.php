<?php

use App\User;
use Illuminate\Database\Seeder;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $user = User::create([

        	'email'=>'admin@mail.com',
            'password'=>'$2y$10$i91qeN0EOuQeJzV/SskEqeP73qcSuNES14OyEF79WofsGBIFsYuUW', //admin1234
            'name'=>'Super Admin',
            'remember_token'=>'NlPo4Mr4KXcEw2Ltc2ujMwNh15VO405hLCeplSO1kDh7Gzr8r1J7ZnS3jixL'
            
        ]);
    }
}
