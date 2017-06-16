<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Your Name',
            'email' => 'alinux@gmail.com',
            'password' => bcrypt('123456x'),
            'dateofbirth' => '01/01/1994',
            'gender' => 'Male',
            'job' => 'Freelancer',
            'profile_picture' => 'user.png',
            'picture_name' => 'user.png',
            'about' => 'Im developer',
            'user_type' => 'admin'
        ]);
    }
}
