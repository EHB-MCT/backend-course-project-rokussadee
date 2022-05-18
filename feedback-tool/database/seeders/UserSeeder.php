<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => 'Rokus',
            'email' => 'rokus.sadee@student.ehb.be',
            'password' => Hash::make('rokus')
        ]);

        $user2 = User::create([
            'name' => 'Cornelis',
            'email' => 'rokus.sadee2k@gmail.com',
            'password' => Hash::make('corneliss')
        ]);

        $user1 -> assignRole('User');
        $user2 -> assignRole('User');
    }
}
