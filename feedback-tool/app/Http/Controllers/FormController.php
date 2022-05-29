<?php

namespace App\Http\Controllers;

use App\Models\FeedbackForm;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function getIndex() {
        if(Auth::user()->hasRole('User')) {
            $forms = FeedbackForm::class::where('user_id', '=', Auth::id())->get();
        }
        if(Auth::user()->hasRole('Super Admin')) {
            $forms = FeedbackForm::class::all();
        }

        return view('content.forms.index', ['forms'=>$forms]);
    }

    public function getForm($slug)
    {
        $form = FeedbackForm::class::where('slug', '=', $slug)->first();
        if (Auth::user()->hasRole('User') && $form->user->id != Auth::id()) {
            abort(403);
        } else {
            $questions = $form->questions;
//            dd($form);
            return view('content.forms.form', ['form'=>$form, 'questions' => $questions]);
        }
    }

    public function editForm($slug)
    {
        $form = FeedbackForm::class::where('slug', '=', $slug)->first();
//        dd($form);
        if ($form->user->id != Auth::id()) {
            abort(403);
        } else {
            $questions = $form->questions;
            return view('content.forms.edit', ['form'=>$form, 'questions' => $questions]);
        }
    }

    public function adminDashboard() {
        $forms = FeedbackForm::class::all();
    }
}
