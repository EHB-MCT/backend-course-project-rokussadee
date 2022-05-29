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

        $forms = [
            $form1 = FeedbackForm::create([
                'title' => 'Admin First FeedbackForm',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'slug' => 'admin-first-feedback-form',
                'user_id' => 1,
            ]),

            $form2 = FeedbackForm::create([
                'title' => 'Rokus First FeedbackForm',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'slug' => 'rokus-first-feedback-form',
                'user_id' => 2,
            ]),

            $form3 = FeedbackForm::create([
                'title' => 'Rokus Second FeedbackForm',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'slug' => 'rokus-second-feedback-form',
                'user_id' => 2,
            ]),

            $form3 = FeedbackForm::create([
                'title' => 'Rokus Third FeedbackForm',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'slug' => 'rokus-third-feedback-form',
                'user_id' => 2,
            ])
        ];

        foreach ($forms as $form) {
            $form->sessions()->attach(rand(1, 2));
        }

//        $form1->sessions()->attach(1);
//        $form2->sessions()->attach(2);
    }
}
