<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'options'
    ];

    protected $casts =[
        'options' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function forms() {
        return $this->belongsToMany(FeedbackForm::class, 'questions_feedback_forms', 'question_id', 'feedback_form_id');
    }

    public function categories() {
        return $this->belongsToMany(Category::class, 'questions_categories', 'question_id','category_id' );
    }
}
