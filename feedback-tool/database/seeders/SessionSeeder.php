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
        Session::truncate();

        Session::create([

            'title' => 'Admins First Session',
            'started_at' => now(),
            'ended_at' => now(),
            'user_id' => 1,
            'slug' => 'admin-first-session'
        ]);

        Session::create([

            'title' => 'Rokus First Session',
            'started_at' => now(),
            'ended_at' => now(),
            'user_id' => 2,
            'slug' => 'rokus-first-session'
        ]);
    }
}
