<?php

namespace Database\Factories;

use App\Models\FeedbackForm;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FeedbackForm>
 */

class FeedbackFormFactory extends Factory
{
    protected $model = FeedbackForm::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'description' => $this->faker->text(),
            'q_count' => 5,
            'user_id' => 1,
            'session_id' => 1
        ];
    }
}
