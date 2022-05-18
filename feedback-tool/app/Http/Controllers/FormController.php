<?php

namespace App\Http\Controllers;

use App\Models\FeedbackForm;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function getIndex() {
        $forms = FeedbackForm::class::where('user_id', '=', Auth::id())->get();

        return view('content.index', ['forms'=>$forms]);
    }
}
