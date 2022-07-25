<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'respondent',
        'slug'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function form()
    {
        return $this->belongsTo(FeedbackForm::class);
    }

    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
