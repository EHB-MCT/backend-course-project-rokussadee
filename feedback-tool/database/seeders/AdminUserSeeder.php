<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('admin')->truncate();
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('admin')
        ]);

        $admin -> assignRole('Super Admin');
    }
}
