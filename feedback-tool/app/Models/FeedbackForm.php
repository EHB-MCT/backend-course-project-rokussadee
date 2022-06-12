<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'q_count',
        'slug',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function sessions() {
        return $this->belongsToMany(Session::class, 'feedback_forms_sessions', 'feedback_form_id', 'session_id');
    }

    public function questions() {
        return $this->belongsToMany(Question::class,'questions_feedback_forms', 'feedback_form_id', 'question_id' );
    }

}
