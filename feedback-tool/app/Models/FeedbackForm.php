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
        'q_count'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function sessions() {
        return $this->belongsToMany(Session::class);
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }

}
