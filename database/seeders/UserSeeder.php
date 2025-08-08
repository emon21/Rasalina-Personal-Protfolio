<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        # User Create
        // $user = User::create([
        //     'name' => 'User',
        //     'email' => 'user@mail.com',
        //     'password' => Hash::make('password'),
        //    // 'password' => bcrypt('password123'),
        // ]);

        $user = new User();

        #user
        $user->name = 'User';
        $user->email = 'user@mail.com';
        $user->password = Hash::make('password');


        #admin 
        $user->name = 'Admin';
        $user->email = 'admin@mail.com';
        $user->password = Hash::make('password');

        $user->save();


        # Admin Create
        // $admin = User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@mail.com',
        //     'password' => Hash::make('password'),
        // ]);
       
        // User::factory()->count(10)->create();

    }
}
