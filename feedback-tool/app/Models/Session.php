<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'started_at',
        'ended_at'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function forms() {
        return $this->hasMany(FeedbackForm::class);
    }
}
