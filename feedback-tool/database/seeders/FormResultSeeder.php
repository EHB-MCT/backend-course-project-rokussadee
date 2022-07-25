<?php

namespace Database\Seeders;

use App\Models\FormResult;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $result1 = FormResult::create([
            'respondent' => 'Wannes',
            'slug' => 'wannes-rokus-first-feedback-form',
            'user_id' => 2,
            'feedback_form_id' => 2,
            'session_id' => 2
        ]);
    }
}
