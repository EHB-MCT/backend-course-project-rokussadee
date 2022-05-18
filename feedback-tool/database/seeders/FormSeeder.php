<?php

namespace Database\Seeders;

use App\Models\FeedbackForm;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FeedbackForm::truncate();

        FeedbackForm::create([
            'title' => 'Admin First FeedbackForm',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'slug' => 'admin-first-feedback-form',
            'q_count' => 5,
            'user_id' => 1,
            'session_id' => 1
        ]);

        FeedbackForm::create([
            'title' => 'Rokus First FeedbackForm',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'slug' => 'rokus-first-feedback-form',
            'q_count' => 5,
            'user_id' => 2,
            'session_id' => 2
        ]);


    }
}
