<?php

namespace Database\Seeders;

use App\Models\Session;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $session1 = Session::create([

            'title' => 'Admins First Session',
            'started_at' => now(),
            'ended_at' => now(),
            'user_id' => 1,
            'respondent' => 'bokus.badee@gmail.com',
            'slug' => 'admin-first-session'
        ]);

        $session2 = Session::create([

            'title' => 'Rokus First Session',
            'started_at' => now(),
            'ended_at' => now(),
            'user_id' => 2,
            'respondent' => 'bokus.badee@gmail.com',
            'slug' => 'rokus-first-session'
        ]);


    }
}
