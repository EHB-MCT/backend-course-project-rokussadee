<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SessionSeeder::class);
        $this->call(FormSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(FormResultSeeder::class);
    }
}
