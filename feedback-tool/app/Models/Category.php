<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable =[
        'title'
    ];

    public function questions() {
        return $this->belongsToMany(Question::class, 'questions_categories', 'category_id', 'question_id');
    }

}
