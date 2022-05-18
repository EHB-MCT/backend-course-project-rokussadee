<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{
    use HasFactory;

    protected $fillable =[
        'type',
//        'content'
    ];

    public function question() {
        return $this->belongsToOne(Question::class);
    }
}
