<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
        $question1 = Question::create([
            'title' => 'Question with id 1 in the ADMINS feedbackform',
            'options' => json_encode([1, 2, 3, 4, 5, 6, 7, 8, 10]),
            'slug' => 'question-with-id-1',
            'user_id' => 1
        ]),

        $question2 = Question::create([
            'title' => 'Question with id 2 in the ADMINS feedbackform',
            'options' => json_encode([1, 2, 3, 4, 5, 6, 7, 8, 10]),
            'slug' => 'question-with-id-2',
            'user_id' => 1
        ]),

        $question3 = Question::create([
            'title' => 'Question with id 3 in the ADMINS feedbackform',
            'options' => json_encode([1, 2, 3, 4, 5, 6, 7, 8, 10]),
            'slug' => 'question-with-id-3',
            'user_id' => 1
        ]),

        $question4 = Question::create([
            'title' => 'Question with id 4 in the USERS feedbackform',
            'options' => json_encode([1, 2, 3, 4, 5, 6, 7, 8, 10]),
            'slug' => 'question-with-id-4',
            'user_id' => 2
        ]),

        $question5 = Question::create([
            'title' => 'Question with id 5 in the USERS feedbackform',
            'options' => json_encode([1, 2, 3, 4, 5, 6, 7, 8, 10]),
            'slug' => 'question-with-id-5',
            'user_id' => 2
        ]),

        $question6 = Question::create([
            'title' => 'Question with id 6 in the USERS feedbackform',
            'options' => json_encode([1, 2, 3, 4, 5, 6, 7, 8, 10]),
            'slug' => 'question-with-id-6',
            'user_id' => 2
        ]),
    ];

        foreach ($questions as $question) {
            $question->forms()->attach(rand(1,2));
            $question->categories()->attach(rand(1,7));
        }

    }
}
