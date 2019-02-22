<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $user = new User();
         $user->email='sivayuges@gmail.com';
         $user->firstName='Yugeswaram';
         $user->lastName='Sivanathan';
         $user->role='Developer';
         $user->password=Hash::make('password');
         $user->save();
    }
}
